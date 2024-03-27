<?php
// Função para listar todos os clientes do banco de dados
function listarClientes($conexao) {
    // Consulta SQL para selecionar todos os clientes
    $sql = "SELECT * FROM clientes";

    // Executar a consulta
    $resultado = mysqli_query($conexao, $sql);

    // Verificar se a consulta foi bem-sucedida
    if ($resultado) {
        // Inicializar um array para armazenar os clientes
        $clientes = array();

        // Loop através dos resultados da consulta e adicionar cada cliente ao array
        while ($cliente = mysqli_fetch_assoc($resultado)) {
            $clientes[] = $cliente;
        }

        // Retornar o array de clientes
        return $clientes;
    } else {
        // Se a consulta falhar, retornar um array vazio
        return array();
    }
}
?>
