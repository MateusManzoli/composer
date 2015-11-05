<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';

if ($_POST) {
    cancelarPedido($_REQUEST['id_pedido']);
}

$pedidosCliente = PedidosCliente();

renderTemplate('listagem_pedidos', array(
    'buscarPedidosCliente' => $pedidosCliente
));

