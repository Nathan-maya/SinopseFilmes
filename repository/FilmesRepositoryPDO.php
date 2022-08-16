<?php
require_once($_SERVER['DOCUMENT_ROOT'].'\cinefilm\model\Conexao.php');

class FilmesRepositoryPDO extends Conexao
{
  protected string $tabela = 'filmes';

  public function listarTodos(): array
  {
    $sql = "SELECT * FROM filmes";
    $sql = Conexao::prepare($sql);
    $sql->execute();
    $filmesListas = $sql->fetchAll(); //pegar dados;

    return $filmesListas;
  }
  public function salvar(Filme $filme): bool
  {
    $sql = "INSERT INTO filmes VALUES (null,?,?,?,?)";
    $sql = Conexao::prepare($sql);
    return $sql->execute(array($filme->titulo, $filme->poster, $filme->sinopse,$filme->nota));
  }
}
?>