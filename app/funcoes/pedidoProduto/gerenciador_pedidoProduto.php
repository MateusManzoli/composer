<?php

include_once '../../config.php';

function PaginaTemplatePedidoProduto() {
    require_once '../vendor/autoload.php';

    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates/pedidoProduto/');

    $twig = new Twig_Environment($loader);

    $pagina = 'index';

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    }
}


function buscarPedidoProduto($id) {
    $buscar = "SELECT * FROM composer.pedido_produto where id = $id";
    $pedidoProduto = pesquisar($buscar);
    return $pedidoProduto[0];
}

function buscarPedidosProdutos() {
    $buscar = "SELECT * FROM composer.pedido_produto";
    $pedidoProdutos = pesquisar($buscar);
    return $pedidoProdutos;
}

function buscarPedidoPorPesquisa($pesquisa) {
    $sql = "select * from composer.pedido_produto where codigo like '%{$pesquisa}%' or produto like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarPedido($dados) {
    validarDadosCliente($dados);
    
    if(verificar($dados['codigo'])){
        throw new Exception ("Ja possuimos esse produto em nosso sistema");
    }
    $cadastrar = "
        INSERT INTO  composer.pedido_produto SET 
            pedido_id = '" . addslashes($dados['pedido']) . "',
            produto_id = '" . addslashes($dados['produto']) . "',
            quantidade = '" . addslashes($dados['quantidade']) . "',
            preco = '" . addslashes($dados['preco']) . "'";
    echo $cadastrar;
    return inserir($cadastrar);
}

function verificar($codigo) {
    $pedido = "select * from composer.pedido_produto where pedido = '{$codigo}'";
    $verificar = pesquisar($pedido);
    return $verificar;
}

function excluirProduto($id) {
    $excluir = "delete from `composer`.`pedido_produto` where id = $id";
    return excluir($excluir);
}

function editarProduto($dados) {
    validarDadosPedidoProduto($dados);
    $editar = "UPDATE composer.pedido_produto SET 
            pedido_id = '" . addslashes($dados['pedido']) . "',
            produto_id = '" . addslashes($dados['produto']) . "',
            quantidade = '" . addslashes($dados['quantidade']) . "',
            preco = '" . addslashes($dados['preco']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

function validarDadosPedidoProduto($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['codigo'])) {
        throw new Exception('O campo Codigo precisa ser preenchido');
    }
    if (empty($dados['nome'])) {
        throw new Exception('O campo Nome precisa ser preenchido');
    }
    if (empty($dados['preco'])) {
        throw new Exception('O campo Preco precisa ser preenchido');
    }
    
    if (empty($dados['quantidade_estoque'])) {
        throw new Exception('O campo quantidade precisa ser preenchido');
    }
    
}
