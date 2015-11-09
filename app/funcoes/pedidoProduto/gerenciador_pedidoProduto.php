<?php

function buscarPedidoProduto($id) {
    $buscar = "SELECT * FROM composer.pedido_produto where id = $id";
    $pedidoProduto = pesquisar($buscar);
    return $pedidoProduto[0];
}

function finalizarPedido($id) {
    $finalizar = "UPDATE composer.pedido SET
    status = 2
    where id = $id ";
    return editar($finalizar);
}

function buscarPedidosProdutos() {
    $buscar = "SELECT * FROM composer.pedido_produto order by pedido_id";
    $pedidoProdutos = pesquisar($buscar);
    return $pedidoProdutos;
}

function buscarPedidoPorPesquisa($pesquisa) {
    $sql = "select * from composer.pedido_produto where codigo like '%{$pesquisa}%' or produto like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarPedidoProduto($dados) {
    //verifica a quantidade em estoque por produto
    $quantidadeEstoque = verificarEstoque($dados['produto_id']);
// retorna um erro se a quantidade em estoque for menor que a quantidade solicitada
    if ($quantidadeEstoque['quantidade_estoque'] < $dados['quantidade']) {
        throw new Exception("A quantidade solicitada {$dados['quantidade']} é maior que {$quantidadeEstoque['quantidade_estoque']} a quantidade disponivel em  estoque para o produto {$quantidadeEstoque['nome']}");
    }
    $cadastrar = "INSERT INTO  composer.pedido_produto SET 
            pedido_id = '" . addslashes($dados['pedido_id']) . "',
            produto_id = '" . addslashes($dados['produto_id']) . "',
            quantidade = '" . addslashes($dados['quantidade']) . "',
            preco = '" . addslashes($dados['preco']) . "'";
    return inserir($cadastrar);
}

function verificarEstoque($id) {
    $produto = "SELECT nome, quantidade_estoque FROM composer.produto where id = {$id}";
    return pesquisarUnico($produto);
}

function editarProduto($dados) {
    validarDadosPedidoProduto($dados);
    $editar = "UPDATE composer.pedido_produto SET 
            pedido_id = '" . addslashes($dados['pedido']) . "',
            produto_id = '" . addslashes($dados['produto']) . "',
            quantidade = '" . addslashes($dados['quantidade']) . "',
            preco = '" . addslashes($dados['preco']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

function validarDadosPedidoProduto($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['pedido_id'])) {
        throw new Exception('O campo Pedido precisa ser preenchido');
    }
    if (empty($dados['produto_id'])) {
        throw new Exception('O campo Produto precisa ser preenchido');
    }
    if (empty($dados['quantidade'])) {
        throw new Exception('O campo quantidade precisa ser preenchido');
    }
    if (empty($dados['preco'])) {
        throw new Exception('O campo preco precisa ser preenchido');
    }
}

function VenderProdutos($dados) {
    $editar = "UPDATE composer.produto SET
  quantidade_estoque = quantidade_estoque - {$dados['quantidade']}
  where id = {$dados['produto_id']} ";
    return editar($editar);
}
