<?php
require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedidoProduto/gerenciador_pedidoProduto.php';

if (!empty($_POST['cancelar'])) {
    cancelarPedido($_POST['id_compra']);
    devolverProduto('id_compra');
}

$pedidoProdutos = buscarPedidosProdutos();

renderTemplate('listagem_pedidoProduto', array(
'pedidos' => $pedidoProdutos
));
