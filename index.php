<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

  <title>Blog</title>
</head>

<style media="screen">

.card-img-top{
  height: 450px;
  width: 100%;
}

.pagination li {
  display:inline-block;
  padding:5px;
}

a{
  color: #000;
}

a:hover{
  text-decoration: none;
  color: #000;
}


</style>

<body>

  <?php require('php/consultar.php') ?>


  <div class="container">
    <div class="mt-5 mb-5 py-5">

      <h1>blog</h1>
      <!--card-->
      <!-- buscador -->
      <!--<div class="mb-3 py-3">
      <input type="text"  placeholder="buscar..." v-model="buscadorPost" class="form-control">
    </div>-->


    <!-- end buscador -->
    <!-- contenedor -->


    <div id="test-list">
      <ul class="list">
        <?php foreach ($results as $item): ?>
          <div class="mt-5 mb-5 py-5 mx-5">
            <a href="detalle.php?id=<?php echo $item['Id']; ?>">
              <img class="name img-fluid card-img-top" src="<?php echo "php/imgs".$item['imagen'] ?>" alt="Card image cap">
              <h3 class="name"><?php echo $item['titulo']; ?></h3>
              <br>
              <p class="name"><?php echo $item['descripcion']; ?> </p>
            </a>
          </div>
        <?php endforeach; ?>
      </ul>
      <nav aria-label="Page navigation example">
        <ul class="pagination"></ul>
      </nav>
    </div>

    <script type="text/javascript">
    var monkeyList = new List('test-list', {
      valueNames: ['name'],
      page: 3,
      pagination: true
    });
    </script>


  </div>
  <!--contenedor-->

</div>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="js/blog.js"></script>


</body>
</html>
