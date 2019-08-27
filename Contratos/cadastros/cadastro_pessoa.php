<!DOCTYPE html>
<?php session_start(); ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="imagens/icone.png" />
    <title>Contrato - Pessoas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <?php include('../config/verifica_login.php');
	?>
    <script>
        function showcli(nm) {
            str = nm;
            //COM JQUERY
            //POST
            /*$.post("busca_cli.php", {
            	q: str;
            	//op: 'teste'
            }, function(data, status) {
            	if (status == 'success') {
            		$('#txtcli').html(data);
            	} else {
            		$('#txtcli').html("Erro na consulta de dados");
            	}
            });*/

            ///GET
            $.get("../config/busca_cli.php?q=" + str, function(data, status) {
                if (status == 'success') {
                    $('#txtcli').html(data);
                } else {
                    $('#txtcli').html("Erro na consulta de dados");
                }
            });

        }

        $(document).ready(function() {
            $('#nome').keyup(function() {
                showcli($('#nome').val());
            })
            showcli('');
        });

    </script>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-sm bg-info navbar-light fixed-top">
        <a class="navbar-brand" href="#"><img src="../imagens/icone.png" width="30px">Á definir</a>
        <a class="nav-text">Bem vindo(a) <?php echo $_SESSION['nome']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Cadastrar
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="vendedor.php">Pessoa</a>
                        <a class="dropdown-item" href="veiculo.php">Veículo</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Relatórios
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadastro_pessoa.php">Pessoa</a>
                        <a class="dropdown-item" href="cadastro_veiculo.php">Veículo</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../config/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--</NAVBAR-->
    <div class="container-fluid fundo-card">
        <div class="col-sm-12 col-md-12 col-lg-11 mx-auto">
            <div class="card card-padrao my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Pessoas Cadastradas</h5>
                    <?php
						if (isset($_SESSION['msg'])) {
						echo  $_SESSION['msg'];
            			unset ($_SESSION['msg']);
						}
    				?>

                    <form>
                        <div class="row">
                            <div class="form-group">
                                <!--<label for="nome" style="display:inline;">Pesquisar</label>-->
                                <input type='text' name='nome' id='nome' class="form-control" placeholder="Pesquisar uma pessoa" style="display:inline;" autofocus>
                            </div>
                        </div>
                    </form>

                    <div id="txtcli">
                        Dados dos usuario....
                    </div>
                    <div class="form-padrao">
                        <center><a href="vendedor.php"><button class="btn btn-outline-info text-uppercase btn-inline col-sm-9 col-md-5 col-lg-5">Cadastrar uma Pessoa</button></a>
                            <a href="#"><button class="btn btn-outline-info text-uppercase btn-inline col-sm-9 col-md-5 col-lg-5">Voltar</button></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
