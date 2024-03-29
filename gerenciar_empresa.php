<?php
session_start();
include_once('php/conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Recuperar os dados da empresa do banco de dados
$sql_empresa = "SELECT * FROM empresa";
$result_empresa = mysqli_query($conexao, $sql_empresa);
$row_empresa = mysqli_fetch_assoc($result_empresa);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Empresa - Painel Administrativo</title>
    <script src="../script/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../script/bootstrap.js"></script>
</head>
<body>

    <div class="container">
        <h2>Gerenciar Dados da Empresa</h2>
        <form action="salvar_dados_empresa.php" method="POST">
            <div class="form-group">
                <label for="nome_empresa">Nome da Empresa:</label>
                <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="<?php echo $row_empresa['nome_empresa']; ?>">
            </div>
            <!-- Adicione campos adicionais para telefone, celular, email, descrição e endereço -->
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        <!-- Botão para abrir o modal de edição -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarEmpresaModal">Editar</button>

<!-- Modal de Edição -->
<div class="modal fade" id="editarEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulário de edição da empresa -->
        <form action="salvar_edicao_empresa.php" method="POST">
          <div class="form-group">
            <label for="nome_empresa">Nome da Empresa:</label>
            <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="<?php echo $row_empresa['nome_empresa']; ?>">
          </div>
          <!-- Adicione outros campos aqui -->
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Botão para abrir o modal de exclusão -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluirEmpresaModal">Excluir</button>

<!-- Modal de Exclusão -->
<div class="modal fade" id="excluirEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Tem certeza de que deseja excluir a empresa?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <!-- Botão para confirmar a exclusão -->
        <a href="confirmar_exclusao_empresa.php" class="btn btn-danger">Confirmar Exclusão</a>
      </div>
    </div>
  </div>
</div>

    </div>

</body>
</html>
