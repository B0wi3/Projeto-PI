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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Gerenciar Usuários</title>
    <style>
        body {
            background-color: #343a40; /* Cor de fundo escura */
            color: #fff; /* Cor do texto */
            padding: 20px; /* Espaçamento interno */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6; /* Cor da linha inferior */
        }

        th {
            background-color: #343a40; /* Cor de fundo do cabeçalho */
            color: #fff; /* Cor do texto do cabeçalho */
        }

        tbody tr:nth-child(odd) {
            background-color: #495057; /* Cor de fundo das linhas ímpares */
        }

        tbody tr:hover {
            background-color: #6c757d; /* Cor de fundo ao passar o mouse */
        }

        button {
            background-color: #007bff; /* Cor de fundo do botão */
            color: #fff; /* Cor do texto do botão */
            padding: 10px 20px; /* Espaçamento interno */
            border: none; /* Remover borda */
            cursor: pointer; /* Alterar cursor ao passar o mouse */
            border-radius: 5px; /* Arredondar bordas */
        }

            button:hover {
                background-color: #0056b3; /* Cor de fundo ao passar o mouse */
            }
    </style>
</head>
<body>
    <h1>Gerenciar Usuários</h1>

    <!-- Formulário para criar um novo usuário -->
    <h2>Criar Novo Usuário</h2>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
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
                        <button class='btn btn-info' onclick=\"window.location.href ='editar_usuario.php?id=" . $usuario['id'] . "'\">Editar</button>
                        <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir este usuário?')) window.location.href='gerenciar_usuarios.php?excluir_id=" . $usuario['id'] . "'\">Excluir</button>
                      </td>";
                echo "</tr>";
            }
        ?>
    </table>
    
    <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='admin.php'">Voltar</button>
</body>
</html>
