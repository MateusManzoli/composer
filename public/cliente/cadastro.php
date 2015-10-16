<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/cliente/gerenciador_cliente.php';

if (isset($_POST['cadastrar'])) {
    cadastrarCliente($_POST);
}

renderTemplate('cadastro_cliente');
