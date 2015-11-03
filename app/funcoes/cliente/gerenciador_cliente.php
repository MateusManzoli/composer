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

function buscarClientePorPesquisa($pesquisa) {
    $sql = "select * from composer.cliente where nome like '%{$pesquisa}%' or codigo like '%{$pesquisa}%'";
    return pesquisar($sql);
}

function cadastrarCliente($dados) {
validarDadosCliente($dados);
    if (verificar($dados['cpf'])) {
        throw new Exception("O cliente ja se encontra cadastrado em nosso sistema!");
    }
    $cadastrar = "
        INSERT INTO composer.cliente SET
            nome = '" . addslashes($dados['nome']) . "',
            cpf = '" . addslashes($dados['cpf']) . "',
            email = '" . addslashes($dados['email']) . "'
        ";
    return inserir($cadastrar);
}

function verificar($cpf) {
    $cliente = "select * from composer.cliente where cpf = '{$cpf}'";
    $verificar = pesquisar($cliente);
    return $verificar;
}

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

function validarDadosCliente($dados) {
    // empty 'vazio'
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
