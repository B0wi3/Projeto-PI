<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'confinter');

// Estabelecer conex�o com o banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

// Verificar se a conex�o foi bem-sucedida
if (!$conexao) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}
?>
