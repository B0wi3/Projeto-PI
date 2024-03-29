<?php
// Incluir o arquivo de conexão e as funções de manipulação de clientes
include_once('php/conexao.php'); 
include_once('php/funcoes_clientes.php');

// Consultar todos os clientes do banco de dados
$clientes = listarClientes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Listar Clientes</title>
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

        .btn-action {
            padding: 5px 10px; /* Espaçamento interno */
            border: none; /* Remover borda */
            cursor: pointer; /* Alterar cursor ao passar o mouse */
            border-radius: 5px; /* Arredondar bordas */
            margin-right: 5px; /* Margem à direita */
        }

        .btn-edit {
            background-color: #007bff; /* Cor de fundo azul */
            color: #fff; /* Cor do texto */
        }

        .btn-delete {
            background-color: #dc3545; /* Cor de fundo vermelha */
            color: #fff; /* Cor do texto */
        }

        .btn-back {
            margin-top: 10px; /* Margem superior */
        }

        .btn-container {
            text-align: center; /* Centralizar botões */
        }
    </style>
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
                    <td class="btn-container">
                        <form action="editar_cliente.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $cliente['id_cliente']; ?>">
                            <button type="submit" class="btn-action btn-edit">Editar</button>
                        </form>
                        <form action="excluir_cliente.php" method="GET" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                            <input type="hidden" name="id" value="<?php echo $cliente['id_cliente']; ?>">
                            <button type="submit" class="btn-action btn-delete">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-sm btn-success btn-back" onclick="window.location.href='admin.php'">Voltar</button>
</body>
</html>
