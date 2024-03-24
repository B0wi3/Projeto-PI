<?php
    include_once('../php/verifica_login.php');
    include_once('../php/conexao.php');    
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../script/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="../script/bootstrap.js"></script>
        <title>Requisições de Análise de Crédito</title>
    </head>
    <body class="bg-dark">
        <h3 class="text-light ml-2 mt-2">Requisições de Análise de Crédito</h3>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nasc</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Horário para contato</th>
                    <th>Cotação</th>
                    <th>Contratação</th>
                    <th>Tipo</th>
                    <th>Categoria</th>
                    <th>Outros</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><p class="mt-4"><?php echo $row['nome']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['data_nascimento']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['telefone']; ?></p></td>
                    <td><p class="mt-4"<?php echo $row['email']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['horario_contato']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['cotacao']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['contratacao']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['tipo']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['categoria']; ?></p></td>
                    <td><p class="mt-4"><?php echo $row['outros_info']; ?></p></td>
                    <td><a href="excluirsolicitacao.php?id=<?php echo $row['id_requisicoes']; ?>"><button type="button" class="btn btn-danger mt-3">Excluir</button></a></td>
                </tr>
               
            </tbody>
        </table>
        <a class="container text-light" href="admin.php">Voltar</a>
    </body>
</html>