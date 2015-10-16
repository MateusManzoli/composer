<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

if ($_POST) {
    cadastrarProduto($_POST);
}
renderTemplate('cadastro_produto');

