<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

$buscarClientes = ClientesPedidos();

renderTemplate('gerenciar_pedido',array(
    'buscarClientes' => $buscarClientes
));