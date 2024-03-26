<?php
    // Incluir o arquivo de conexão e as funções de manipulação de usuários
    include_once('conexao.php');
    include_once('funcoes_usuarios.php');

    // Verificar se o ID do usuário foi fornecido na URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Consultar o usuário com base no ID fornecido
        $usuario = buscarUsuarioPorId($conexao, $id);

        // Verificar se o usuário foi encontrado
        if(!$usuario) {
            // Se o usuário não for encontrado, redirecionar para a página de gerenciamento de usuários
            header("Location: gerenciar_usuarios.php");
            exit();
        }
    } else {
        // Se nenhum ID de usuário foi fornecido na URL, redirecionar para a página de gerenciamento de usuários
        header("Location: gerenciar_usuarios.php");
        exit();
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

        // Redirecionar para a página de gerenciamento de usuários após a edição
        header("Location: gerenciar_usuarios.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <!-- Formulário para editar o usuário -->
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" required><br>
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" value="<?php echo $usuario['usuario']; ?>" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?php echo $usuario['senha']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>" required><br>
        <input type="submit" name="editar_usuario" value="Editar Usuário">
    </form>

    <a href="gerenciar_usuarios.php">Voltar para Gerenciar Usuários</a>
</body>
</html>