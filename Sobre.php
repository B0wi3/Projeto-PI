<?php 
    include_once('php/conexao.php');
    
    // Consulta para obter a descrição da empresa
    $sql = "SELECT descricao FROM empresa WHERE nome_empresa = 'CONFINTER'";
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se a consulta retornou resultados
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $descricao = $row['descricao'];
    } else {
        $descricao = "Descrição não encontrada";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<title>Sobre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Scripts -->   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
<body>
    <h2>Sobre</h2>
    <div class="container">

        <div class="row">
            <div class="col-11 col-md-12 text-center ml-md-0 ml-2 my-5">

  </div>

            <div id="servicos" class="row justify-content-sm-center">

                <div id="app" class="col-sm-6 col-md-4 disp">
                    <div class="card mb-5">
                        <img class="card-img top" src="imgs/item-01.jpg
">
                        <div class="card-body">
                            <h4 class="card-title">Taxas de juros baixas:</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Oferecemos as melhores taxas do mercado para que você possa realizar</li>

                        </ul>
                        <div class="card-footer text-muted">

                        </div>
                    </div>
                </div>

                <div id="web" class="col-sm-6 col-md-4 disp">
                    <div class="card mb-5">
                        <img class="card-img top" src="imgs/item-02.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Prazos longos para pagar:</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Você pode parcelar o seu crédito em até 84 vezes,</li>
                            <li class="list-group-item">facilitando o pagamento das suas parcelas.</li>
                        </ul>
                        <div class="card-footer text-muted">

                        </div>
                    </div>
                </div>

                <div id="aut" class="col-sm-6 col-md-4 disp">
                    <div class="card mb-5">
                        <img class="card-img top" src="imgs/item-03.jpg">
                        <div class="card-body">
                            <h4 class="card-title">Atendimento personalizado e prioritário</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Uma equipe de especialistas está à disposição para, te orientar e ajudar a escolher a melhor opção de crédito para você.</li>
                        </ul>
                        <div class="card-footer text-muted">

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
</body>
</html>
