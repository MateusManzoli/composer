<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

try {
    $pedidoCliente = array();
    $retorno = "";
    
    if ($_POST) {
        editarCliente($_POST);
        $_GET['cliente_id'] = $_POST['id'];
        $retorno = "Cliente editado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$cliente = buscarCliente($_GET['cliente_id']);

renderTemplate('editar_cliente', array(
    'cliente' => $cliente,
    'mensagem' => $retorno
));
