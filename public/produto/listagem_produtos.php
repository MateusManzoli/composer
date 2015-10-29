<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

if (!empty($_POST['zerar'])) {
    zerarEstoque($_POST['id_produto']);
}
$produtos = buscarProdutos();
renderTemplate('listar_produtos',array(
    'produtos' => $produtos
));