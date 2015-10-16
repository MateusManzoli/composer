<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/pedido/gerenciador_pedido.php';

if (isset($_POST['cadastrar'])) {
    cadastrarCliente($_POST);
}
renderTemplate('cadastro_pedido');
