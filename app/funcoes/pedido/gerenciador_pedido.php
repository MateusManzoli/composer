<?php

function buscarPedido($id) {
    $buscar = "SELECT pd.*, 
    cl.nome as 'cliente_nome'
    FROM composer.pedido pd 
    LEFT JOIN composer.cliente cl ON (cl.id = pd.cliente_id) where pd.id = '{$id}'";
    $pedido = pesquisar($buscar);
    return $pedido;
}

function buscarPedidos() {
    $buscar = " SELECT * FROM composer.pedidos";
    $pedidos = pesquisar($buscar);
    return $pedidos;
}

function cadastrarPedidoCliente($dados) {
    $cadastrar = "
        INSERT INTO composer.pedido SET
        cliente_id = '" . addslashes($dados['cliente_id']) . "',
        status = '" . addslashes($dados['status']) . "'";
    return inserir($cadastrar);
}

function PedidosCliente() {
    $buscar = "SELECT pd.*, 
    cl.nome as 'cliente_nome'
    FROM composer.pedido pd 
    LEFT JOIN composer.cliente cl ON (cl.id = pd.cliente_id) order by pd.id
    ";
    $pedido = pesquisar($buscar);
    return $pedido;
}

function excluirPedido($id) {
    $excluir = "delete from `composer`.`pedido` where id = $id";
    return excluir($excluir);
}

function editarPedido($dados) {
    //validarDadosProduto($dados);
    $editar = "UPDATE `composer`.`pedido` SET 
            cliente_id = '" . addslashes($dados['cliente_id']) . "'
            where id = '{$dados['pedido']}' ";
    return editar($editar);
}

function validarDadosProduto($dados) {
    if (empty($dados['cliente_id'])) {
        throw new Exception('O campo cliente precisa ser preenchido');
    }
}

function alteraStatus($id) {
    $altera = "UPDATE composer.pedido SET
    status = 3
    where id = $id";
    echo $altera;
    return editar($altera);
}

function produtoPedido($pedido_id) {
    $buscar = "SELECT * FROM composer.pedido_produto where pedido_id = $pedido_id";
    $pedido = pesquisar($buscar);
    return $pedido;
}

function devolverProduto($dados) {
    $editar = "UPDATE composer.produto SET
    quantidade_estoque = quantidade_estoque + {$dados['quantidade']}
    where id = {$dados['produto_id']} ";
    return editar($editar);
}

function cancelarPedido($id) {
    $produtos = produtoPedido($id);
    foreach ($produtos as $produto) {
        $devolucao = devolverProduto($produto);
    }
    $statusPedidoCancelado = alteraStatus($id);
}
