<?php
    include_once('php/conexao.php');    
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - CONFINTER</title>
</head>
<body>

    <h2>Bem-vindo ao Painel Administrativo</h2>
    <ul>
        <li><a href="consultar_requisicoes.php">Consultar Requisições</a></li>
        <li><a href="listar_clientes.php">Listar Clientes</a></li>
        <li><a href="gerenciar_usuarios.php">Gerenciar Usuários</a></li>
        <!-- Adicione mais links para outras funcionalidades, se necessário -->
    </ul>
    <a href="index.php">Sair</a>

</body>
</html>
