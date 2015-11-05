<?php

require __DIR__ . '/../../app/config.php';
include_once '../../app/funcoes/produto/gerenciador_produto.php';


try {
$retorno = "";
if (isset($_POST['cadastrar'])) {
    cadastrarProduto($_POST);
$retorno = "Pedido efetuado com êxito! ";
}
} catch (Exception $e) {
$retorno = $e->getMessage();
}

renderTemplate('cadastro_produto',array(
    "mensagem" => $retorno
));


