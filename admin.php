<?php
    include_once('php/conexao.php');    
?>

    
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../script/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <script src="../script/bootstrap.js"></script>
        <title>Painel Administrativo</title>
    </head>
    <body>
        <div class="container">
            <div class="album py-5 bg-light">
                <h2>Bem vindo ao painel de administrador</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver os usuários cadastrados ou cadastrar mais?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="cadastro.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">1</small>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver as requisições realizadas?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="solicitacao.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">4</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer ver os clientes que entraram em contato?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="pessoas.php"><button type="button" class="btn btn-sm btn-success btn-outline-success text-light">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">5</small>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Você quer excluir todos os dados pessoais?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a hindex.phpref="admin.php?id=0"><button type="button" class="btn btn-sm btn-danger">Clique aqui!</button></a>
                                        </div>
                                        <small class="text-muted">7</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.php" class="btn btn-danger">Sair</a>
            
        </div>
        </div>
    </body>
</html>
<?php
    if(!empty($_GET['id'])){
        if($_GET['id'] == 0){
            $query = "DELETE FROM dados_pessoais WHERE id_pessoa > 0";
            $res = mysqli_query($con, $query);
            if($res == 1){
                echo "<p class='container text-danger'>TODOS OS DADOS FORAM EXCLUIDOS!</p>";
            }else{
                echo "<p class='container text-danger'>ERRO. CONTACTE O SUPORTE</p>";
            }
        }
    }
?>

    <!-- JavaScript para Bootstrap e jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--===============================================================================================-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
