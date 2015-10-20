<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

$pedidosClientes = buscarPedidos();
renderTemplate('edicao_pedidoCliente',array(
    "$pedidosClientes" =>array(
        'id' => $pedidosClientes['id'],
        'cliente_id' => $pedidosClientes['cliente_id'],
        'cliente_nome' => $pedidosClientes['cliente_nome']
    ) 
)
);

