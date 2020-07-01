<?php

$pdo=new PDO("mysql:dbname=blog;host=localhost","root","");

if ($_POST) {

  $id = $_POST['Id'];

  $statement=$pdo->prepare("SELECT * FROM post WHERE Id = $id");
  $statement->execute();

  if (!$statement){
    echo json_encode('Error al ejecutar la consulta');
  }else{
    $resultado_edit = $statement->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($results);
  }

}

?>
<?php foreach ($resultado_edit as $item): ?>

  <!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>blog</title>
  </head>
  <body>

    <div class="container">
      <div class="mt-4">
        <form action="insertar.php" method="post" novalidate="true" enctype="multipart/form-data">
          <h4>insertar post</h4>
          <div class="form-group">

            <input type="hidden" name="Id" value="<?php echo $item['Id']; ?>">
            <label for="titulo">Titulo</label>
            <input name="titulo" type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $item['titulo']; ?>" aria-describedby="titulo">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" class="form-control" name="descripcion" rows="8" cols="80"><?php echo $item['descripcion']; ?></textarea>
          </div>
          <div class="form-group">
            <label for="imagen">imagen</label>
            <input name="archivo" id="archivo" type="file">
          </div>
          <button type="submit" class="btn btn-warning">Editar</button>
        </form>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="js/app.js"></script>
  </body>
  </html>



<?php endforeach; ?>
