<?php
// Função para listar todas as requisições
function listarRequisicoes($conexao) {
    $sql = "SELECT * FROM requisicoes";
    $resultado = mysqli_query($conexao, $sql);
    $requisicoes = array();
    while ($requisicao = mysqli_fetch_assoc($resultado)) {
        $requisicoes[] = $requisicao;
    }
    return $requisicoes;
}

// Função para listar requisições por data
function listarRequisicoesPorData($conexao, $data_inicio, $data_fim) {
    $sql = "SELECT * FROM requisicoes WHERE data_requisicao BETWEEN '$data_inicio' AND '$data_fim'";
    $resultado = mysqli_query($conexao, $sql);
    $requisicoes = array();
    while ($requisicao = mysqli_fetch_assoc($resultado)) {
        $requisicoes[] = $requisicao;
    }
    return $requisicoes;
}
// Função para buscar um cliente pelo ID
function buscarClientePorId($conexao, $id_cliente) {
    $sql = "SELECT * FROM clientes WHERE id_cliente = $id_cliente";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}
// Função para listar requisições por data com informações do cliente
function listarRequisicoesPorData($conexao, $data_inicio, $data_fim) {
    $sql = "SELECT r.*, c.nome, c.data_nascimento, c.email, c.telefone 
            FROM requisicoes r
            INNER JOIN clientes c ON r.id_cliente = c.id_cliente
            WHERE r.data_requisicao BETWEEN '$data_inicio' AND '$data_fim'";
    $resultado = mysqli_query($conexao, $sql);
    $requisicoes = array();
    while ($requisicao = mysqli_fetch_assoc($resultado)) {
        $requisicoes[] = $requisicao;
    }
    return $requisicoes;
}
?>
