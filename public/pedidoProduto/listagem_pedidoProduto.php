<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedidoProduto/gerenciador_pedidoProduto.php';
$pedidoProdutos = buscarPedidosProdutos();

renderTemplate('listagem_pedidoProduto', array(
    'pedidos' => $pedidoProdutos
));
