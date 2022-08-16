<?php
function limpaPost($dados)
{
  $dados = trim($dados);
  $dados = stripslashes($dados); //tirar barras
  $dados = htmlspecialchars($dados);
  return $dados;
}