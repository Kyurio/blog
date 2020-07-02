<?php

$pdo=new PDO("mysql:dbname=blog;host=localhost","root","");

$id = $_GET['id'];

$statement=$pdo->prepare("SELECT * FROM post WHERE Id = $id");
$statement->execute();

if (!$statement){
  echo json_encode('Error al ejecutar la consulta');
}else{
  $resultado_edit = $statement->fetchAll(PDO::FETCH_ASSOC);
}


?>
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

    <div id="test-list">
      <ul class="list">
        <?php foreach ($resultado_edit as $item): ?>
          <div class="mt-5 mb-5 py-5 mx-5">
            <img class="name img-fluid card-img-top" src="<?php echo "php/imgs".$item['imagen'] ?>" alt="Card image cap">
            <h3 class="name"><?php echo $item['titulo']; ?></h3>
            <br>
            <p class="name"><?php echo $item['descripcion']; ?> </p>
          </div>
        <?php endforeach; ?>
      </ul>
      <ul class="pagination"></ul>
    </div>

    <script type="text/javascript">
    var monkeyList = new List('test-list', {
      valueNames: ['name'],
      page: 3,
      pagination: true
    });
    </script>

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
