<?php
// Conexão com o banco de dados
include_once 'db_connect.php';

// Verifica se o ID do usuário foi passado via GET
if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit();
}

$id = $_GET['id'];

// Consulta para selecionar as informações do usuário com base no ID fornecido
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location: users.php");
    exit();
}

$row = mysqli_fetch_assoc($result);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário de edição do usuário aqui
    // Atualizar os dados no banco de dados e redirecionar de volta para users.php
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Editar Usuário</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Campos de formulário para edição dos dados do usuário -->
