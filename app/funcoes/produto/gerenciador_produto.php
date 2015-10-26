<?php

function buscarProduto($id) {
    $buscar = "SELECT * FROM composer.produto where id = $id";
    $pedidoProduto = pesquisar($buscar);
    return $pedidoProduto[0];
}

function BuscarProdutoPreco($id) {
    $buscar = "SELECT preco FROM composer.produto where id = '{$id}";
    $preco = pesquisar($buscar);
    return $preco[0];
}

function buscarProdutos() {
    $buscar = "SELECT * FROM composer.produto";
    $pedidoProdutos = pesquisar($buscar);
    return $pedidoProdutos;
}

function BuscarEstoque() {
    $buscar = "SELECT quantidade_estoque FROM composer.produto ";
    $buscarEstoque = pesquisar($buscar);
    return $buscarEstoque;
}

function buscarProdutoPorPesquisa($pesquisa) {
    $sql = "select * from composer.produto where codigo like '%{$pesquisa}%' or produto like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarProduto($dados) {
    /* if (verificar($dados['codigo'])) {
      throw new Exception("Ja possuimos esse produto em nosso sistema");
      } */
    $cadastrar = "
        INSERT INTO composer.produto SET
            codigo = '" . addslashes($dados['codigo']) . "',
            nome = '" . addslashes($dados['nome']) . "',
            preco = '" . addslashes($dados['preco']) . "',
            quantidade_estoque = '" . addslashes($dados['quantidade_estoque']) . "',
            status = '" . addslashes($dados['status']) . "'
        ";
    return inserir($cadastrar);
}

/* function verificar($codigo) {
  $pedido = "select * from composer.produto where pedido = '{$codigo}'";
  $verificar = pesquisar($pedido);
  return $verificar;
  }
 * function editarProduto($dados) {
  validarDadosPedidoProduto($dados);
  $editar = "UPDATE composer.produto SET
  codigo = '" . addslashes($dados['codigo']) . "',
  nome = '" . addslashes($dados['nome']) . "',
  preco = '" . addslashes($dados['preco']) . "',
  quantidade_estoque = '" . addslashes($dados['quantidade']) . "'
  where id = {$dados['id']} ";
  return editar($editar);
  } */


function BuscarStatus() {
    $pedido = "select * from composer.status";
    $buscar = pesquisar($pedido);
    return $buscar;
}
