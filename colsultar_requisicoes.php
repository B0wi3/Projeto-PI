<?php
    // Incluir o arquivo de conexão e as funções de manipulação de requisições
    include_once('conexao.php');
    include_once('funcoes_requisicoes.php');

    // Verificar se o formulário de filtro foi submetido
    if(isset($_POST['filtrar'])) {
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        // Consultar requisições filtradas por data
        $requisicoes = listarRequisicoesPorData($conexao, $data_inicio, $data_fim);
    } else {
        // Consultar todas as requisições do banco de dados
        $requisicoes = listarRequisicoes($conexao);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Requisições</title>
</head>
<body>
    <h1>Consultar Requisições</h1>

    <!-- Formulário de filtro por data -->
    <form method="post">
        <label for="data_inicio">Data Início:</label>
        <input type="date" name="data_inicio" id="data_inicio">
        <label for="data_fim">Data Fim:</label>
        <input type="date" name="data_fim" id="data_fim">
        <button type="submit" name="filtrar">Filtrar</button>
    </form>

    <!-- Tabela para exibir as requisições -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Telefone</th>
                <!-- Adicione mais colunas conforme necessário -->
            </tr>
        </thead>
        <tbody>
            <?php foreach($requisicoes as $requisicao): ?>
                <tr>
                    <td><?php echo $requisicao['id']; ?></td>
                    <td><?php echo $requisicao['nome']; ?></td>
                    <td><?php echo $requisicao['data_nascimento']; ?></td>
                    <td><?php echo $requisicao['email']; ?></td>
                    <td><?php echo $requisicao['telefone']; ?></td>
                    <!-- Adicione mais colunas conforme necessário -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="painel_admin.php">Voltar para o Painel Administrativo</a>
</body>
</html>