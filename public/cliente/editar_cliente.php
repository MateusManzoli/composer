<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

if ($_POST) {
    editarCliente($_POST);
    $_GET['cliente_id'] = $_POST['id'];
}

$cliente = buscarCliente($_GET['cliente_id']);

renderTemplate('editar_cliente', array(
    'cliente' => $cliente
));
