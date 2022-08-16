<?php
session_start();
require('./helpers/limpaPost.php');
require_once('./repository/FilmesRepositoryPDO.php');
require_once('./model/Filme.php');

class FilmesController
{
  public function save($request)
  {
    $filmeRepository = new FilmesRepositoryPDO();
    $filme = new Filme();
    
    $filme->titulo = limpaPost($request["titulo"]);
    $filme->sinopse = limpaPost($request["sinopse"]);
    $filme->nota = limpaPost($request["nota"]);
    $filme->poster = limpaPost($request["poster"]);

    $upload = $this->savePoster($_FILES);

    if(gettype($upload)=="string"){
      $filme->poster =$upload;
    }
    
    if ($filmeRepository->salvar($filme)) {

      $_SESSION['msg'] = "Filme Cadastrado com sucesso";
    } else {
      $_SESSION['msg'] = "Erro ao cadastrar filme";
    }
    header('location: ./galeria.php');
  }
  private function savePoster($file){
    $posterDir = './posters';
    $posterPath = $posterDir.basename($file["poster_file"]["name"]);
    $posterTmp = $file['poster_file']['tmp_name'];
    if(move_uploaded_file($posterTmp,$posterPath)){
      return $posterPath;
    }
    else{
      return false;
    }
  }
}