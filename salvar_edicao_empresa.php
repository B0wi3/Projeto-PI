<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados
    include_once('php/conexao.php');

    // Recupera os dados enviados pelo formulário
    $id_empresa = $_POST['id_empresa']; // Certifique-se de que este valor seja enviado pelo formulário
    $nome_empresa = $_POST['nome_empresa'];
    // Recupere os outros campos do formulário conforme necessário

    // Atualiza os dados da empresa no banco de dados
    $query = "UPDATE empresa SET nome_empresa = '$nome_empresa' WHERE id_empresa = $id_empresa";

    if (mysqli_query($conexao, $query)) {
        // Redireciona de volta para a página de administração com uma mensagem de sucesso
        header("Location: admin.php?sucesso=empresa_editada");
        exit();
    } else {
        // Se houver algum erro, exiba uma mensagem de erro
        echo "Erro ao editar a empresa: " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    // Se o formulário não foi enviado por método POST, redirecione de volta para a página de administração
    header("Location: admin.php");
    exit();
}
?>
