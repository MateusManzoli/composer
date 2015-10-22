<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

if ($_POST) {
    editarPedido($_POST);
    }
    
$pedidoCliente = buscarPedido($_REQUEST['pedido_id']);
$buscarClientes = buscarClientes();

renderTemplate('edicao_pedidoCliente', array(
    'PedidoCliente' => $pedidoCliente,
    'clientes' => $buscarClientes
));
