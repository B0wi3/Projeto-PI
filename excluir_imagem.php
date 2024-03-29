<?php
session_start();
include_once('php/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome_arquivo"])) {
    $nome_arquivo = $_POST["nome_arquivo"];

    // Excluir a imagem do banco de dados
    $sql = "DELETE FROM imagens_carrossel WHERE nome_arquivo = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $nome_arquivo);
    $stmt->execute();

    // Excluir o arquivo do sistema de arquivos
    $caminho_arquivo = "imgs/" . $nome_arquivo;
    if (file_exists($caminho_arquivo)) {
        unlink($caminho_arquivo); // Remove o arquivo
    }

    // Redirecionar de volta ao painel após a exclusão
    header("Location: admin_painel.php");
    exit();
} else {
    // Se o nome do arquivo não foi fornecido, redirecionar de volta ao painel com uma mensagem de erro
    $_SESSION['mensagem_erro'] = "Erro: Nome do arquivo não especificado.";
    header("Location: admin_painel.php");
    exit();
}
?>
