<?php
$rota = $_SERVER['REQUEST_URI'];
switch ($rota) {
  case '/cinefilm':
    require "galeria.php";
    break;
  case 'cinefilm/novo':
    echo 'ola';
    break;
  default:
    require "galeria.php";
    break;
}