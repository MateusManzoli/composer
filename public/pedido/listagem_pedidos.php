<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';

if (!empty($_POST['cancelar'])) {
    alteraStatus($_POST['id_compra']);
    devolverProduto('produto_id');
}

$pedidosCliente = PedidosCliente();
renderTemplate('listagem_pedidos',array(
    'buscarPedidosCliente' => $pedidosCliente
));