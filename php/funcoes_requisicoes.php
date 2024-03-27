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
?>
