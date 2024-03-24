<?php
session_start();

// Função para verificar se o usuário está autenticado como administrador
function verificarAutenticacao() {
    // Verifica se a sessão do usuário existe e se o usuário tem permissão de administrador
    if (!isset($_SESSION['user'])) {
        // Se não estiver autenticado, redirecione para a página de login
        header("Location: admin.php");
        exit(); // Encerra o script após o redirecionamento
    }
}

// Chama a função de verificação de autenticação
verificarAutenticacao();

// Conexão com o banco de dados
include_once 'db.php';

// Consulta para selecionar todos os usuários
$sql = "SELECT id, usuario, email FROM usuarios";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Lista de Usuários</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop através dos resultados da consulta e exibir cada usuário em uma linha da tabela
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['usuario']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>";
                    echo "<a href='edit_user.php?id={$row['id']}' class='btn btn-primary'>Editar</a>";
                    echo "<a href='delete_user.php?id={$row['id']}' class='btn btn-danger'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Botão "Cancelar" -->
        <a href="admin.php" class="btn btn-secondary">Cancelar</a>
    </div>

    <!-- JavaScript para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
