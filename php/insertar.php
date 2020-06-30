<?php
include('conexion.php');

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$archivo = $_FILES['archivo']['name'];

echo $archivo;
//Si el archivo contiene algo y es diferente de vacio
if (isset($archivo) && $archivo != "") {
  //Obtenemos algunos datos necesarios sobre el archivo
  $tipo = $_FILES['archivo']['type'];
  $tamano = $_FILES['archivo']['size'];
  $temp = $_FILES['archivo']['tmp_name'];
  //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
  if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
    echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
    - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
  }
  else {
    //Si la imagen es correcta en tamaño y tipo
    //Se intenta subir al servidor
    if (move_uploaded_file($temp, 'imgs'.$archivo)) {
      //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
    /*  chmod('imgs /'.$archivo, 755);
      //Mostramos el mensaje de que se ha subido co éxito
      echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
      //Mostramos la imagen subida
      echo '<p><img src="img/'.$archivo.'"></p>';
      */
    }
    else {
      //Si no se ha podido subir la imagen, mostramos un mensaje de error
      echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
    }
  }
}
/* Execute a prepared statement by passing an array of values */

$consulta = "INSERT INTO post (titulo, descripcion, imagen)
VALUES ('$titulo', '$descripcion', '$archivo')";
echo $consulta;
if($mysqli->query($consulta)){
  echo json_encode(true);
   header("Location: http://localhost/blog/intranet.php");
}else{
  echo json_encode(false);
}
