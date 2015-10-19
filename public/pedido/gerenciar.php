<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';

$buscarPedidos = buscarPedidos();

renderTemplate('gerenciar_pedido',array(
    'buscarPedidos' => $buscarPedidos
));

