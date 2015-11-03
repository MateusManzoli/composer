<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

try {
    $retorno = "";
    if (!empty($_POST['excluir'])) {
        excluirCliente($_POST['id_cliente']);
        $retorno = "Cliente excluido com êxito! ";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}
$clientes = buscarClientes();

renderTemplate('listagem_clientes', array(
    'clientes' => $clientes,
    'mensagem' => $retorno
)); 
