<?php

function PaginaTemplatePedido() {
    require_once '../vendor/autoload.php';

    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates/pedido/');

    $twig = new Twig_Environment($loader);

    $pagina = 'index';

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    }

    
$template = $twig->loadTemplate($pagina . '.html.twig');
echo $template->render([]);
    }


function buscarPedido($id) {
    $buscar = "SELECT * FROM composer.pedido where id = $id";
    $pedido = pesquisar($buscar);
    return $pedido[0];
}

function buscarPedidos() {
    $buscar = "SELECT * FROM composer.pedido";
    $pedidos = pesquisar($buscar);
    return $pedidos;
}

function buscarPedidoPorPesquisa($pesquisa) {
    $sql = "select * from composer.pedido where codigo like '%{$pesquisa}%' or produto like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarPedidoCliente($dados) {
    $cadastrar = "
        INSERT INTO composer.pedido SET
            cliente_id = '" . addslashes($dados['cliente_id']) . "',
            codigo = '" . addslashes($dados['codigo']) . "',
            status = '" . addslashes($dados['status']) . "'
        ";
    return inserir($cadastrar);
}

/*function verificar($codigo) {
    $pedido = "select * from composer.pedido where pedido = '{$codigo}'";
    $verificar = pesquisar($pedido);
    return $verificar;
}*/

function excluirPedido($id) {
    $excluir = "delete from `composer`.`pedido` where id = $id";
    return excluir($excluir);
}

function editarPedido($dados) {
    validarDadosProduto($dados);
    $editar = "UPDATE composer.pedido SET 
            cliente_id = '" . addslashes($dados['cliente_id']) . "',
            codigo = '" . addslashes($dados['codigo']) . "',
            status = '" . addslashes($dados['status']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

/*function validarDadosProduto($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['cliente_id'])) {
        throw new Exception('O campo cliente_id precisa ser preenchido');
    }
    if (empty($dados['codigo'])) {
        throw new Exception('O campo codigo precisa ser preenchido');
    }
    if (empty($dados['status'])) {
        throw new Exception('O campo status precisa ser preenchido');
    }
}*/
