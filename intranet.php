<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <title>Hello, world!</title>
</head>
<body>


  <div id="app">

    <div class="container">
      <div class="mt-5 mb-5 py-5">



        <div class="row">
          <div class="col-md-5">
            <form  id="app" action="php/insertar.php" method="post" novalidate="true" enctype="multipart/form-data">

              <h4>insertar post</h4>
              <ul>
                <li v-for="error in errors" class="text-danger">{{ error }}</li>
              </ul>
              <div class="form-group">
                <label for="titulo">Titulo</label>
                <input name="titulo" type="text" id="titulo" class="form-control" aria-describedby="titulo">
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" class="form-control" name="name" rows="8" cols="80"></textarea>
              </div>
              <div class="form-group">
                <label for="imagen">imagen</label>
                <input name="archivo" id="archivo" type="file">
              </div>
              <button type="submit" class="btn btn-primary">grabar</button>
            </form>
          </div>
          <div class="col-md-7">



            <div v-for="item in filterPosts">
              <button type="button" @click="EliminarPost(item.Id)" name="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
              <button type="button" name="button" class="btn btn-warning"><i class="fas fa-pen"></i></button>
              <div class="card mt-2 py-2 mb-2">
                <div class="card-body">
                  <img v-bind:src="'php /' + item.imagen">
                  <h3 class="">{{ item.titulo }}</h3>
                  <br>
                  <p class="">{{ item.descripcion }} </p>
                </div>
              </div>
            </div>


          </div>
        </div>


      </div>
    </div>

  </div><!--end app-->



  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="js/app.js"></script>
</body>
</html>
