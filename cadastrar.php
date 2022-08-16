<?php include "cabecalho.php" ?>

<?php
  require_once('./controller/inserirFilmes.php');
  $metodo =$_SERVER['REQUEST_METHOD'];
  if($metodo == 'POST'){
    $controller = new FilmesController();
    $controller->save($_REQUEST);
  }
?>

<body>
  <!-- navegaçao -->
  <nav class="nav-extended purple lighten-3">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="right ">
        <li><a href="galeria.php">Galeria</a></li>
        <li class="active"><a href="cadastrar.php">Cadastrar</a></li>
      </ul>
    </div>
    <div class="nav-header center">
      <h1>PlayHD</h1>
    </div>

    <!-- <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <div class="nav-content">
      <ul class="tabs tabs-transparent purple darken-1">
        <li class="tab"><a href="#test1">Todos</a></li>
        <li class="tab"><a class="active" href="#test2">Assistidos</a></li>
        <li class="tab"><a href="#test3">Favoritos</a></li>
      </ul>
    </div>
  </nav>

  <div class="row">
    <form method="POST" enctype="multipart/form-data">
      <div class="input-field col s6 offset-s3">
        <div class="card darken-1">
          <div class="card-content">
            <span class="card-title">Cadastrar Filme</span>
            <!-- Input Titulo -->
            <div class="row">
              <div class="input-field">
                <input id="titulo" name="titulo" type="text" class="validate">
                <label for="titulo">Titulo</label>
              </div>
            </div>
            <!-- Input sinopse -->
            <div class="row">
              <form class="">
                <div class="input-field ">
                  <textarea id="sinopse" name="sinopse" class="materialize-textarea"></textarea>
                  <label for="sinopse">Sinopse</label>
                </div>

              </form>
            </div>
            <!-- input nota -->
            <div class="row">
              <div class="input-field col s4">
                <input id="nota" name="nota" step=".1" type="number" min=0 max=10 class="validate">
                <label for="nota">Nota</label>
              </div>
            </div>
            <!-- input capa -->

            <div class="input-field">
              <div class="btn purple lighten-2 black-text">
                <span>Capa</span>
                <input type="file" name="poster_file">
              </div>
              <div class="file-path-wrapper">
                <input type="text" name="poster">
              </div>
            </div>

          </div>
          <div class="card-action">
            <a class="btn waves-effect waves-light green" href="galeria.php">Cancelar</a>
            <button type="submit" class="waves-effect waves-light btn purple">Enviar</button>
          </div>
        </div>
      </div>
    </form>
  </div>

</body>

</html>