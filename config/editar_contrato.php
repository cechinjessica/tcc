<?php
require 'conexao.php';
$sql = "SELECT c.* FROM contrato c
inner join pessoa p on c.pessoa_idcomprador = p.idpessoa
inner join pessoa pp on c.pessoa_idvendedor = pp.idpessoa
inner join veiculo v on c.veiculo_idveiculo = v.idveiculo";

$id=$_GET['id']; //recupera o parâmetro passado na visualização
if ($id!='') {
    $sql.=" WHERE contrato =".$id;
}

$result=mysqli_query($conexao,$sql);

if (mysqli_affected_rows($conexao)>0) {

}

mysqli_close($conexao);

//include('verifica_login.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../imagens/icone.png" />
    <title>Contrato - Editar contrato</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

    <style>
        .form-group input {
            border-radius: 2rem;
            display: inline-block;
            width: auto;
        }

        .form-check-input {
            margin: 1px;
        }

    </style>

</head>

<body style="background: #007bff;
                 background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
    <script type="text/javascript" src="../javascript/editar_contrato.js"></script>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-sm bg-info navbar-light sticky-top">
        <a class="navbar-brand" href="#"><img src="../imagens/icone.png" width="30px">Á definir</a>
        <a class="nav-text d-sm-none d-md-block">Bem vindo(a) <?php echo $_SESSION['nome']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../contrato.php">Criar contrato</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Cadastrar
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="vendedor.php">Pessoa</a>
                        <a class="dropdown-item" href="veiculo.php">Veículo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Ver cadastros
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadastro_pessoa.php">Pessoa</a>
                        <a class="dropdown-item" href="cadastro_veiculo.php">Veículo</a>
                        <a class="dropdown-item" href="cadastro_contrato.php">Contrato</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
                <li class="nav-item">
                    <a class="nav-link" href="../config/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--</NAVBAR-->
    <div class="container-fluid fundo-card">
        <div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
            <div class="card card-padrao my-5 justify-content-center">
                <div class="card-body">
                    <h5 class="card-title text-center">Editar contrato:</h5>
                    <form action="#" method="post" class="form-padrao">
                        <!-- Default switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="switch1">
                            <label class="custom-control-label" for="switch1">Cláusula</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control rounded-0" id="textarea1" rows="3"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
