<?php
// Conexão com o banco de dados
include_once('conexao.php');

// Consulta SQL para selecionar todas as requisições
$query = "SELECT * FROM requisicoes";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Erro ao executar a consulta: ' . mysqli_error($conn));
}

// Criação do documento XML
$xml = new DOMDocument('1.0', 'UTF-8');
$xml->formatOutput = true;

// Elemento raiz do XML
$root = $xml->createElement('requisicoes');
$xml->appendChild($root);

// Loop através das requisições e adicioná-las ao XML
while ($row = mysqli_fetch_assoc($result)) {
    $requisicao = $xml->createElement('requisicao');

    // Adicionar os dados da requisição como elementos do XML
    foreach ($row as $key => $value) {
        $element = $xml->createElement($key, $value);
        $requisicao->appendChild($element);
    }

    // Adicionar a requisição ao elemento raiz
    $root->appendChild($requisicao);
}

// Salvar o XML em um arquivo
$xml_file = 'requisicoes.xml';
$xml->save($xml_file);

// Enviar o arquivo XML para download
header('Content-Type: application/xml');
header('Content-Disposition: attachment; filename="' . $xml_file . '"');
readfile($xml_file);

// Remover o arquivo XML após o download
unlink($xml_file);
?>