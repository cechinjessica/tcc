<?php
session_start();
require '../config/conexao.php';


//PARA COLOCAR AS INFORMAÇÕES DO BD NOS CAMPOS
/*
if (isset($_GET['id'])){
	$id=$_GET['id'];
	$op=$_GET['op'];
	$sql = "SELECT idveiculo, nome, marca, modelo, ano, chassi, cor, placa, renavam, emnomede, valor FROM veiculo WHERE idveiculo='$id'";
	$res=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_row($res);
	$id= $row[0];
	$nome = $row[1];
	$marca = $row[2];
	$modelo = $row[3];
	$ano = $row[4];
	$chassi = $row[5];
	$cor = $row[6];
	$placa = $row[7];
	$renavam = $row[8];
	$proprietario = $row[9];
	$valor = $row[10];
} else{
	$id=0;
}


//PARA PEGAR OS DADOS DOS CAMPOS
if (isset($_POST['enviar'])){
	$nome = $_POST['nome'];
	$marca  = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$ano = $_POST['ano'];
	$chassi = $_POST['chassi'];
	$cor = $_POST['cor'];
	$placa = $_POST['placa'];
	$renavam = $_POST['renavam'];
	$proprietario = $_POST['proprietario'];
	$valor = $_POST['valor'];
	$op=$_POST['op'];

	//PARA ATUALIZAR, HAVERÁ ID POIS HÁ UM VEICULO
	if ($id != 0) {
		if ($op == 'A') {
			$sql="UPDATE veiculo SET nome ='$nome', marca ='$marca', modelo ='$modelo', ano ='$ano', chassi='$chassi', cor='$cor', placa ='$placa', renavam='$renavam', emnomede ='$proprietario', valor ='$valor' where idveiculo ='$id'";

			$res = mysqli_query($conexao,$sql);
			if (mysqli_error($conexao)) {
				$_SESSION['msg'] = "<p class='alert alert-danger' role='alert'>Erro na atualização de $nome</p>";
				header('Location:cadastro_veiculo.php');
			} else {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome atualizado com sucesso!</p>";
				header('Location:cadastro_veiculo.php');
			}
			mysqli_close($conexao);

		} else if($op == "D") { //PARA EXCLUIR
			$sql="DELETE FROM veiculo WHERE idveiculo='$id'";
			echo $sql;
			$res = mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)=='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome excluído com sucesso!</p>";
				header('Location:cadastro_veiculo.php');
			} else {
				$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>Erro na exclusão de $nome</p>";
                header('Location:cadastro_veiculo.php');
			}
			mysqli_close($conexao);
		}

	}else{//SE FOR == 0 ENTÃO O VEICULO AINDA NÃO ESTÁ CADASTRADO
		//INCLUSÃO
		$sql = "SELECT * FROM veiculo WHERE placa='$placa'";
		mysqli_query($conexao,$sql);

		if (mysqli_affected_rows($conexao)!=0) {
			mysqli_close($conexao);
			$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>$placa já foi cadastrada</p>";
			header('Location:cadastro_veiculo.php');

		}else {
			$sql = "INSERT INTO veiculo (nome, marca, modelo, ano, chassi, cor, placa, renavam, emnomede, valor) VALUES ('$nome', '$marca', '$modelo', '$ano', '$chassi', '$cor', '$placa', '$renavam', '$proprietario', '$valor')";
			mysqli_query($conexao,$sql);

			if (mysqli_affected_rows($conexao) =='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome inserido com sucesso!</p>";
				header('Location:cadastro_veiculo.php');
			} else {
				$_SESSION['msg'] ="<p class='alert alert-danger' role='alert'>Erro: ".mysqli_error($conexao)."<p>";
				header('Location:cadastro_veiculo.php');
			}
			mysqli_close($conexao);
		}
	}
	$id=0;
}
*/
?>

<!--////////////////////////////////////////////////////////////////////////////-->

<?php
include('../config/verifica_login.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../imagens/icone.png" />
    <title>Contrato - Pessoa</title>

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
    <!-- <script type="text/javascript" src="../javascript/veiculo.js"></script>-->
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-sm bg-info navbar-light fixed-top">
        <a class="navbar-brand" href="#"><img src="../imagens/icone.png" width="30px">Á definir</a>
        <a class="nav-text">Bem vindo(a) <?php echo $_SESSION['usuario']; ?></a>
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
        <div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
            <div class="card card-padrao my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">O contrato:</h5>
                    <form action="#" method="post" class="form-padrao">
                        <p class="feedback"><?php
				if (isset($_SESSION['msg'])) {
					echo  $_SESSION['msg'];
					unset ($_SESSION['msg']);
				}
				?></p>

                        <div class="row">
                            <div class="form-group col-xl">
                                <label for="nome">Modelo(Nome)</label>
                                <input type="text" id="nome" class="form-control" name="nome" title="Ex.: Celta, Prisma, Corsa" value="<?php echo ($id!=0)?"$nome":'';?>">
                                <p id="msg_nome" class="form-control-feedback"></p>
                            </div>

                            <div class="form-group col-xl">
                                <label for="marca">Marca</label>
                                <input type="text" id="marca" class="form-control" name="marca" title="Ex.: Chevrolet, Volkswagen, Ford " value="<?php echo ($id!=0)?"$marca":'';?>">
                                <p id="msg_marca" class="form-control-feedback"></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl">
                                <label for="ano">Ano</label>
                                <input type="text" id="ano" class="form-control" name="ano" title="Ex.: 2010, 2000, 2019" value="<?php echo ($id!=0)?"$ano":'';?>">
                                <p id="msg_ano" class="form-control-feedback"></p>
                            </div>

                            <div class="form-group col-xl">
                                <label for="modelo">Modelo(Ano)</label>
                                <input type="text" id="modelo" class="form-control" name="modelo" value="<?php echo ($id!=0)?"$modelo":'';?>">
                                <p id="msg_modelo" class="form-control-feedback "></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl">
                                <label for="chassi">Chassi</label>
                                <input type="text" id="chassi" class="form-control" maxlength="17" name="chassi" value="<?php echo ($id!=0)?"$chassi":'';?>">
                                <p id="msg_chassi" class="form-control-feedback "></p>
                            </div>

                            <div class="form-group col-xl">
                                <label for="cor">Cor</label>
                                <input type="text" id="cor" class="form-control" name="cor" title="Ex.: Vermelho, Rosa, Prata" value="<?php echo ($id!=0)?"$cor":'';?>">
                                <p id="msg_cor" class="form-control-feedback "></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl">
                                <label for="placa">Placa</label>
                                <input type="text" id="placa" class="form-control" maxlength="8" name="placa" title="XXX-0000" value="<?php echo ($id!=0)?"$placa":'';?>">
                                <p id="msg_placa" class="form-control-feedback "></p>
                            </div>

                            <div class="form-group col-xl">
                                <label for="renavam">Renavam</label>
                                <input type="text" id="renavam" class="form-control" maxlength="11" name="renavam" value="<?php echo ($id!=0)?"$renavam":'';?>">
                                <p id="msg_renavam" class="form-control-feedback "></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl">
                                <label for="proprietario">Proprietario</label>
                                <input type="text" id="proprietario" class="form-control" name="proprietario" title="O veículo esta em nome de ..." value="<?php echo ($id!=0)?"$proprietario":'';?>">
                                <p id="msg_proprietario" class="form-control-feedback "></p>
                            </div>

                            <div class="form-group col-xl">
                                <label for="valor">Valor</label>
                                <input type="text" id="valor" class="form-control" name="valor" title="Ex.: 10000,00" value="<?php echo ($id!=0)?"$valor":'';?>">
                                <p id="msg_valor" class="form-control-feedback "></p>
                            </div>

                        </div>


                        <input type='hidden' name='id' id='codigo' value="<?php echo ($id!=0)?"$id":'0';?>">
                        <input type='hidden' name='op' value="<?php echo ($id!=0)?"$op":'';?>">

                        <?php
							$txtbtn="Incluir";
							if (isset($op)){
								$txtbtn=($op=='A')?'Atualizar':'Excluir';
							}
							?>
                        <input class="btn btn-md btn-primary btn-block text-uppercase" type="submit" name="enviar" value="<?php echo $txtbtn?>" id="salvar">
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
