<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

try {
    $retorno = "";
    if ($_POST) {
        editarProdutoTabela($_POST);
        $retorno = "Edicao do produto efetuada com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$produto = buscarProduto($_GET['produto_id']);
renderTemplate('editar_produto', array(
    'produto' => $produto,
    "mensagem" => $retorno
));
