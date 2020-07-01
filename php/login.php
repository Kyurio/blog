<?php

$pdo=new PDO("mysql:dbname=blog;host=localhost","root","");

$user = trim($_POST['correo']);
$pass = trim($_POST['contraseña']);

$statement=$pdo->prepare("SELECT * FROM user WHERE  Correo = '$user' AND Contraseña = '$pass' ");
$statement->execute();



if (!$statement){
  echo json_encode('Error al ejecutar la consulta');
}else{
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
}

if (empty($results)) {

  header("Location: http://localhost/blog/login.php");

}else {

  foreach ($results as $item) {

    session_start();
    $_SESSION['user'] = $item['Usuario'];
    header("Location: http://localhost/blog/intranet.php");

  }

}



/*
*/
