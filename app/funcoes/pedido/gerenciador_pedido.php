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
    $buscar = "SELECT pd.*, 
    cl.nome as 'cliente_nome'
    FROM composer.pedido pd
    LEFT JOIN composer.cliente cl ON (cl.id = pd.cliente_id)
";
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
            cliente_id = '" . addslashes($dados['cliente_id']) . "'";
    return inserir($cadastrar);
}

/* function verificar($codigo) {
  $pedido = "select * from composer.pedido where pedido = '{$codigo}'";
  $verificar = pesquisar($pedido);
  return $verificar;
  } */

function excluirPedido($id) {
    $excluir = "delete from `composer`.`pedido` where id = $id";
    return excluir($excluir);
}

function editarPedido($dados) {
    validarDadosProduto($dados);
    $editar = "UPDATE composer.pedido SET 
            cliente_id = '" . addslashes($dados['cliente_id']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

function validarDadosProduto($dados) {
    if (empty($dados['cliente_id'])) {
        throw new Exception('O campo cliente precisa ser preenchido');
    }
}
