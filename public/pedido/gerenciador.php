<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';

$pedidosCliente = PedidosCliente();

renderTemplate('gerenciar_pedido',array(
    'buscarPedidosCliente' => $pedidosCliente
));