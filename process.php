<?php
// Conectar ao banco de dados (substitua os valores conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "confinter";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Preparar a declaração SQL para inserir os dados na tabela
$sql = "INSERT INTO requisicoes (nome, data_nascimento, telefone, email, horario_contato, cotacao, contratacao, tipo, categoria, outros_info)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar e executar a declaração
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssssssss", $nome, $data_nascimento, $telefone, $email, $horario_contato, $cotacao, $contratacao, $tipo, $categoria, $outros_info);

    // Atribuir os valores recebidos do formulário às variáveis
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $horario_contato = $_POST['horario_contato'];
    $cotacao = isset($_POST['cotacao']) ? $_POST['cotacao'] : '';
    $contratacao = isset($_POST['contratacao']) ? $_POST['contratacao'] : '';
    $tipo = $_POST['tipo'];
    $categoria = isset($_POST['categoria']) ? implode(', ', $_POST['categoria']) : '';
    $outros_info = isset($_POST['outros_info']) ? $_POST['outros_info'] : '';

    // Executar a declaração
    if (!$stmt->execute()) {
        echo "Erro ao executar a declaração: " . $stmt->error;
    } else {
        echo "Requisição enviada com sucesso!";
    }

    // Fechar a declaração
    $stmt->close();
} else {
    echo "Erro na preparação da declaração: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>
