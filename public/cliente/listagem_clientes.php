<?php
require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

if (!empty($_POST['excluir'])) {
excluirCliente($_POST['id_cliente']);
}
$clientes = buscarClientes();

renderTemplate('listagem_clientes', array(
'clientes' => $clientes
));