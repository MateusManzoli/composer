<?php

function buscarCliente($id) {
    $buscar = "SELECT * FROM composer.cliente where id = $id";
    $cliente = pesquisar($buscar);
    return $cliente[0];
}

function buscarClientes() {
    $buscar = "SELECT * FROM composer.cliente";
    $clientes = pesquisar($buscar);
    return $clientes;
}

function ClientesPedidos(){
    $buscar = "SELECT cl.*,
    pd.id AS 'pedido_id'
    FROM composer.cliente cl
    LEFT JOIN composer.pedido pd ON ( pd.cliente_id = cl.id)
    ";
    $pedido = pesquisar($buscar);
    return $pedido;
}

function buscarClientePorPesquisa($pesquisa) {
    $sql = "select * from composer.cliente where nome like '%{$pesquisa}%' or codigo like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarCliente($dados) {

    
    /*if(verificar($dados['nome'],$dados['cpf'])){
        throw new Exception ("Cliente encontrado em nosso sistema");
    }*/
    $cadastrar = "
        INSERT INTO composer.cliente SET
            nome = '" . addslashes($dados['nome']) . "',
            cpf = '" . addslashes($dados['cpf']) . "',
            email = '" . addslashes($dados['email']) . "'
        ";
    return inserir($cadastrar);
}

/*function verificar($nome,$cpf) {
    $atleta = "select * from composer.cliente where nome = '{$nome}' && cpf = '{$cpf}'";
    $verificar = pesquisar($atleta);
    return $verificar;
}*/

function excluirCliente($id) {
    $excluir = "delete from `composer`.`cliente` where id = $id";
    return excluir($excluir);
}

function editarCliente($dados) {
    validarDadosCliente($dados);
    $editar = "UPDATE composer.cliente SET 
            nome = '" . addslashes($dados['nome']) . "',
            cpf = '" . addslashes($dados['cpf']) . "',
            email = '" . addslashes($dados['email']) . "'
            where id = {$dados['id']} ";
    return editar($editar);
}

/*function validarDadosCliente($dados) {
    // empty 'vazio'
    if (empty($dados)) {
        throw new Exception('Os campos precisam ser preenchidos');
    }
    if (empty($dados['nome'])) {
        throw new Exception('O campo nome precisa ser preenchido');
    }
    if (empty($dados['cpf'])) {
        throw new Exception('O campo cpf precisa ser preenchido');
    }
    if (empty($dados['email'])) {
        throw new Exception('O campo email precisa ser preenchido');
    }
}
*/