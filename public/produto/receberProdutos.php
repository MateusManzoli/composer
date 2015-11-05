<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';

try {
    $retorno = "";
    
    $dadosProduto = buscarProduto($_REQUEST['produto_id']);

    if ($_POST) {
        ReceberNovosProdutos($_REQUEST);
        $retorno = "Produtos acrescentado em estoque com êxito";
    }
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

renderTemplate('recebimento_novosProdutos', array(
    'dadosProduto' => $dadosProduto,
    'mensagem' => $retorno
));
