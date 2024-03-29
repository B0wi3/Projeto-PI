<?php
include 'conexao.php';
include_once('verifica_login.php');
echo "<h3>Requisições de Análise de Crédito</h3>";

// Tabela para mostrar as requisições com opções de filtro
echo "<table class='table table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";            
echo "<th>E-mail</th>";
echo "<th>Data de Requisição</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Consulta SQL
$sql = "SELECT id, nome, email, data_requisicao FROM requisicoes";
$stmt = $conn->prepare($sql);

// Verifica se a consulta foi preparada com sucesso
if ($stmt) {
    // Executa a consulta
    $stmt->execute();

    // Associa as variáveis aos resultados da consulta
    $stmt->bind_result($id, $nome, $email, $data_requisicao);

    // Itera sobre os resultados
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($id) . "</td>";
        echo "<td>" . htmlspecialchars($nome) . "</td>";                
        echo "<td>" . htmlspecialchars($email) . "</td>";
        echo "<td>" . htmlspecialchars($data_requisicao) . "</td>";
        echo "</tr>";
    }

    // Fecha a declaração
    $stmt->close();
} else {
    // Se a consulta falhar, exibe uma mensagem de erro
    echo "<tr><td colspan='4'>Erro ao preparar a consulta.</td></tr>";
}

// Fecha a conexão com o banco de dados
$conn->close();

echo "</tbody>";
echo "</table>";
?>
