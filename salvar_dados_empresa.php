<?php
session_start();
include_once('php/conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Recuperar os dados do formulário
$nome_empresa = $_POST['nome_empresa'];
// Recuperar outros dados conforme necessário

// Atualizar os dados da empresa no banco de dados
$sql_update_empresa = "UPDATE empresa SET nome_empresa = '$nome_empresa' WHERE id_empresa = 1"; // Supondo que o id da empresa é 1
mysqli_query($conexao, $sql_update_empresa);

// Redirecionar de volta para a página de gerenciamento da empresa
header("Location: gerenciar_empresa.php");
exit();
?>
