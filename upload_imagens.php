<?php
session_start();
include_once('php/conexao.php');

// Verificar se o formulário de upload de imagem foi enviado
if(isset($_POST["submit"])) {
    $diretorio_destino = "imgs/"; // Diretório onde as imagens serão armazenadas
    $nome_arquivo = basename($_FILES["imagem"]["name"]);
    $caminho_completo = $diretorio_destino . $nome_arquivo;

    // Move a imagem para o diretório de destino
    if(move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminho_completo)) {
        // Insira o nome do arquivo no banco de dados
        $sql = "INSERT INTO imagens_carrossel (nome_arquivo) VALUES (?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $nome_arquivo);
        $stmt->execute();
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}

// Verificar se há uma solicitação para excluir uma imagem
if(isset($_POST['excluir_imagem'])) {
    $nome_arquivo = $_POST['nome_arquivo'];
    $caminho_arquivo = "imgs/" . $nome_arquivo;

    // Excluir o arquivo do diretório
    if(file_exists($caminho_arquivo)) {
        unlink($caminho_arquivo);

        // Excluir o registro do banco de dados
        $sql = "DELETE FROM imagens_carrossel WHERE nome_arquivo = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $nome_arquivo);
        $stmt->execute();
    } else {
        echo "Arquivo não encontrado.";
    }
}

// Consulta ao banco de dados para recuperar as imagens do carrossel
$sql = "SELECT * FROM imagens_carrossel";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Alterar imagens do Carrosel</title>
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
    
        .img-thumbnail {
            max-width: 200px;
            max-height: 200px;
            cursor: pointer;
        }

        .img-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .modal-dialog {
            max-width: 800px;
        }

        .modal-content {
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Upload de Imagens</h2>
        <form action="upload_imagens.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="imagem">Selecione uma imagem:</label>
                <input type="file" class="form-control-file" id="imagem" name="imagem" accept="image/*">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Enviar Imagem</button>
        </form>

        <h2>Imagens no Carrossel</h2>
        <div class="img-container">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="card" style="width: 200px;">
                    <img src="imgs/<?php echo $row['nome_arquivo']; ?>" class="card-img-top img-thumbnail" alt="Imagem do Carrossel" data-toggle="modal" data-target="#imagemModal<?php echo $row['id']; ?>">
                    <div class="card-body">
                        <form action="upload_imagens.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?')">
                            <input type="hidden" name="nome_arquivo" value="<?php echo $row['nome_arquivo']; ?>">
                            <button type="submit" name="excluir_imagem" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="imagemModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="imgs/<?php echo $row['nome_arquivo']; ?>" class="img-fluid" alt="Imagem do Carrossel">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

        <div class="btn-container">
            <a href="admin.php" class="btn btn-primary btn-back">Voltar</a>
        </div>
    </div>

    <script src="../script/jquery.js"></script>
    <script src="../script/bootstrap.js"></script>

</body>
</html>
