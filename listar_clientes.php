<?php
    // Incluir o arquivo de conexão e as funções de manipulação de clientes
    include_once('conexao.php');
    include_once('funcoes_clientes.php');

    // Consultar todos os clientes do banco de dados
    $clientes = listarClientes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>

    <!-- Tabela para exibir os clientes -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id_cliente']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['telefone']; ?></td>
                    <td><?php echo $cliente['cidade']; ?></td>
                    <td>
                        <a href="editar_cliente.php?id=<?php echo $cliente['id_cliente']; ?>">Editar</a>
                        <a href="excluir_cliente.php?id=<?php echo $cliente['id_cliente']; ?>" onclick="return confirm('Tem certeza que deseja excluir este cliente?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="painel_admin.php">Voltar para o Painel Administrativo</a>
</body>
</html>