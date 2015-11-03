<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

try {
$retorno = "";
if (isset($_POST['cadastrar'])) {
cadastrarPedidoCliente($_POST);
$retorno = "Pedido efetuado com êxito! ";
}
} catch (Exception $e) {
$retorno = $e->getMessage();
}

$clientes = buscarClientes();
$status = BuscarStatus();
renderTemplate('cadastro_pedido', array(
'status' => $status,
 'clientes' => $clientes,
  'mensagem' => $retorno
));
