<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';


print_r($_REQUEST);
$dadosProduto = buscarProduto($_REQUEST['produto_id']);
print_r($dadosProduto);
if($_POST){
    ReceberNovosProdutos($_REQUEST);
}

renderTemplate('recebimento_novosProdutos',array(
    'dadosProduto' => $dadosProduto
));