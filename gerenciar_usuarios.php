<?php
    // Incluir o arquivo de conexão e as funções de manipulação de usuários
    include_once('php/conexao.php'); 
    include_once('php/funcoes_usuarios.php');      

    // Verificar se o formulário de criação de usuário foi enviado
    if(isset($_POST['criar_usuario'])) {
        // Processar os dados do formulário e criar um novo usuário
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        
        criarUsuario($conexao, $nome, $usuario, $senha, $email);
    }

    // Verificar se o formulário de edição de usuário foi enviado
    if(isset($_POST['editar_usuario'])) {
        // Processar os dados do formulário e atualizar o usuário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        
        editarUsuario($conexao, $id, $nome, $usuario, $senha, $email);
    }

    // Verificar se há uma solicitação para excluir um usuário
    if(isset($_GET['excluir_id'])) {
        $id = $_GET['excluir_id'];
        excluirUsuario($conexao, $id);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
</head>
<body>
    <h1>Gerenciar Usuários</h1>

    <!-- Formulário para criar um novo usuário -->
    <h2>Criar Novo Usuário</h2>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <input type="submit" name="criar_usuario" value="Criar Usuário">
    </form>

    <!-- Tabela para listar os usuários -->
    <h2>Listar Usuários</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
            // Consultar e exibir a lista de usuários
            $usuarios = listarUsuarios($conexao);
            foreach($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['nome'] . "</td>";
                echo "<td>" . $usuario['usuario'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo "<td>
                        <a href='editar_usuario.php?id=" . $usuario['id'] . "'>Editar</a> |
                        <a href='gerenciar_usuarios.php?excluir_id=" . $usuario['id'] . "'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
        ?>
    </table>
    !-- Botão Voltar -->
    <a href="admin.php">Voltar</a>
</body>
</html>
