<?php include "cabecalho.php" ?>

<?php
session_start();
require_once('../cinefilm/repository/FilmesRepositoryPDO.php');
require_once('./util/Mensagem.php');


$filmesRepository = new FilmesRepositoryPDO();
$filmes = $filmesRepository->listarTodos();
?>

<body>
  <!-- navegaçao -->
  <nav class="nav-extended purple lighten-3">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="right">
        <li class="active"><a href="galeria.php">Galeria</a></li>
        <li><a href="cadastrar.php">Cadastrar</a></li>
      </ul>
    </div>
    <div class="nav-header center">
      <h1>SinopseFilmes</h1>
    </div>

    <!-- <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <div class="nav-content">
      <ul class="tabs tabs-transparent purple darken-1">
        <li class="tab"><a class="active" href="#test1">Todos</a></li>
        <li class="tab"><a href=" #test2">Assistidos</a></li>
        <li class="tab"><a href="#test3">Favoritos</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <!-- Card com filme -->
      <?php foreach ($filmes as $key => $value) : ?>
      <div class="col s12 m6 l3">
        <div class="card hoverable">
          <div class="card-image">
            <img src="<?= $value['poster']; ?>">

            <a class="btn-fav btn-floating halfway-fab waves-effect waves-light red"><i
                class="material-icons">favorite_border</i></a>
          </div>
          <div class="card-content">
            <span class="card-title">
              <?= $value['titulo']; ?>
            </span>
            <p class="valign-wrapper"> <i class="material-icons amber-text">star</i>
              <?php
                echo $value['nota'];
                ?>
            </p>
            <p><?= $value['sinopse'] ?></p>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>

  <?= Mensagem::mostrar(); ?>

  <script>
  document.querySelectorAll('.btn-fav').forEach((btn) => {
    btn.addEventListener('click', (e) => {
      if (btn.querySelector('i').innerHTML === "favorite") {
        btn.querySelector('i').innerHTML = "favorite_border"
      } else {
        btn.querySelector('i').innerHTML = "favorite"
      }

    })
  });
  </script>
</body>


</html>