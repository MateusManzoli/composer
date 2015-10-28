<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

$produtos = buscarProdutos();
renderTemplate('listar_produtos',array(
    'produtos' => $produtos
));