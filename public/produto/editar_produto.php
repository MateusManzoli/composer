<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

try {
    $retorno = "";

    if ($_POST) {
        editarProdutoTabela($_POST);
        $retorno = "Produto editado com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

$produto = buscarProduto($_REQUEST['produto_id']);

renderTemplate('editar_produto', array(
    'id_produto' => $_REQUEST['produto_id'],
    'produto' => $produto,
    "mensagem" => $retorno
));
