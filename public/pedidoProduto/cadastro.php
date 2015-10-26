<?php

require __DIR__ . '/../../app/config.php';
require __DIR__ . '/../../app/funcoes/pedidoProduto/gerenciador_pedidoProduto.php';
require __DIR__ . '/../../app/funcoes/pedido/gerenciador_pedido.php';
require __DIR__ . '/../../app/funcoes/produto/gerenciador_produto.php';

try {
    $execute = [];
    $pedidoCliente = array();
    if (!empty($_GET['pedido_id'])) {
        $pedidoCliente = buscarPedido($_GET['pedido_id']);
    }
    $produtos = buscarProdutos();
    $status = BuscarStatus();
    renderTemplate('cadastro_pedidoProduto', array(
        'buscarPedidoCliente' => $pedidoCliente,
        'buscarProdutos' => $produtos,
        'status' => $status
    ));
    if ($_POST) {
        cadastrarPedidoProduto($_POST);
        $execute["mensagem"] = "Pedido efetuado com êxito";
    }
} catch (Exception $e) {
    $execute["mensagem"] = $e->getMessage();
}