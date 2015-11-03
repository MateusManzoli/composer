<?php

require __DIR__ . '/../../app/config.php';
require __DIR__ . '/../../app/funcoes/pedidoProduto/gerenciador_pedidoProduto.php';
require __DIR__ . '/../../app/funcoes/pedido/gerenciador_pedido.php';
require __DIR__ . '/../../app/funcoes/produto/gerenciador_produto.php';

try {
  
    $pedidoCliente = array();
    $retorno = "";
    
    if (!empty($_GET['pedido_id'])) {
        $pedidoCliente = buscarPedido($_GET['pedido_id']);
    }
    
    if ($_POST) {
        cadastrarPedidoProduto($_POST);
        VenderProdutos($_POST);
        $retorno = "Pedido efetuado com êxito";
    }
    
    if (!empty($_POST['pedido'])) {
    finalizarPedido($_POST['pedido_id']);
}

} catch (Exception $e) {
    $retorno = $e->getMessage();
}

    $produtos = buscarProdutos();
    renderTemplate('cadastro_pedidoProduto', array(
        'buscarPedidoCliente' => $pedidoCliente,
        'buscarProdutos' => $produtos,
        'mensagem' => $retorno
));
