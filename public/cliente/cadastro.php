<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

try {
    $pedidoCliente = array();
    $retorno = "";

    if (isset($_POST['cadastrar'])) {
        cadastrarCliente($_POST);
        $retorno = "Cliente cadastrado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

renderTemplate('cadastro_cliente',array(
    'mensagem' => $retorno
));
