<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

if ($_POST) {
    editarProdutoTabela($_POST);
    }

$produto = buscarProduto($_GET['produto_id']);
renderTemplate('editar_produto', array(
    'produto' => $produto
));
