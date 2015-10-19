<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedidoProduto/gerenciador_pedidoProduto.php';

if (isset($_POST['cadastrar'])) {
    cadastrarPedidoProduto($_POST);
}
renderTemplate('cadastro_pedidoProduto');
