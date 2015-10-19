<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

if (isset($_POST['cadastrar'])) {
    cadastrarPedidoCliente($_POST);
}


$clientes = buscarClientes();
$status = BuscarStatus();
$produtos = buscarProdutos();
$estoque = BuscarEstoque();

renderTemplate('cadastro_pedido',array(
    'status_pedido' => $status,
    'clientes' => $clientes,
    'produtos' => $produtos
));
