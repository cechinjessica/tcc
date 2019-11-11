<?php 
session_start();
require 'verifica_login.php';
require 'config/conexao.php';
?>

<!--  //////////////////////////////-->
<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Contrato - Relatório</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<script src="javascript/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="javascript/popper.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#formulario').submit(function() {
				var dados = jQuery(this).serialize();

				jQuery.ajax({
					type: "POST",
					url: "config/montasql.php",
					data: dados,
					cache: false,
					success: function(result) {
						$('.result').html(result); //exibe o resultado em uma div class="result"
					}
				});
				return false;
			});
		});

	</script>
</head>

<body style="background: #007bff;
               background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
	<!--NAVBAR-->
	<nav class="navbar navbar-expand-md bg-info navbar-light sticky-top">
		<a class="navbar-brand" href="#"><img src="imagens/icone.png" width="30px">Contrato</a>
		<a class="nav-text d-none  d-lg-inline mr-5"><b> <?php echo $_SESSION['nome']; ?></b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-5">
				<li class="nav-item ">
					<a class="nav-link" href="contrato.php">Gerar contrato</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Cadastrar
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="cadastros/vendedor.php">Pessoa</a>
						<a class="dropdown-item" href="cadastros/veiculo.php">Veículo</a>

					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Cadastros
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="cadastros/cadastro_pessoa.php">Pessoa</a>
						<a class="dropdown-item" href="cadastros/cadastro_veiculo.php">Veículo</a>
						<a class="dropdown-item" href="cadastros/cadastro_contrato.php">Contrato</a>
					</div>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="relatorio.php">Relatórios</a>
				</li>
			</ul>
			<ul class="navbar-nav flex-row ml-md-auto d-md-flex">
				<li class="nav-item">
					<a class="nav-link" href="config/logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<!--</NAVBAR-->
	<div class="container-fluid fundo-card">
		<div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
			<div class="card card-padrao my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Relatório</h5>
					<form action="" method="post" class="form-padrao" id="formulario">

						<div class="card-deck my-3">

							<div class='custom-control custom-control p-0 mb-1'>
								<div class='card border-0' style='width:16rem;'>
									<div class='card-header border-primary bg-transparent'>
										<h6 class='text-uppercase'>Período</h6>
									</div>
									<div class='card-body bg-transparent p-0'>
										<div class='card-text'>
											<div class="form-group">
												<label for="dinicial">Data Inicial</label>
												<input type="date" id="dinicial" class="form-control" name="dinicial">
											</div>
											<div class="form-group">
												<label for="dfinal">Data Final</label>
												<input type="date" id="dfinal" class="form-control" name="dfinal">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class='custom-control custom-control p-0 mb-1'>
								<div class='card border-0' style='width:16rem;'>
									<div class='card-header border-primary bg-transparent'>
										<h6 class='text-uppercase'>Envolvidos</h6>
									</div>
									<div class='card-body bg-transparent p-0'>
										<div class='card-text'>
											<div class="form-group">
												<label for="comprador">Comprador</label>
												<?php $sql = "SELECT pp.idpessoa, pp.nome FROM contrato c inner join pessoa pp on pp.idpessoa = c.pessoa_idcomprador group by pp.nome order by pp.nome asc;";
                          $result=mysqli_query($conexao,$sql);
                          echo "<select class='form-control custom-select' name='comprador' id='comprador'>";
                          echo "<option selected value='' >Compradores</option>";
                          while ($row = mysqli_fetch_row($result)){?>
												<option value='<?php echo $row[0] ?>'> <?php echo $row[1] ?></option>";
												<?php }
                          echo "</select>";
                          ?>
											</div>

											<div class="form-group">
												<label for="vendedor">Vendedor</label>
												<?php $sql = "SELECT pp.idpessoa, pp.nome FROM contrato c inner join pessoa pp on pp.idpessoa = c.pessoa_idvendedor group by pp.nome order by pp.nome asc;";
                          $result=mysqli_query($conexao,$sql);
                          echo "<select class='form-control custom-select' name='vendedor' id='vendedor'>";
                          echo "<option selected value='' >Vendedores</option>";
                          while ($row = mysqli_fetch_row($result)){?>
												<option value='<?php echo $row[0] ?>'> <?php echo $row[1] ?></option>";
												<?php }
                          echo "</select>";
                          ?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class='custom-control custom-control p-0 mb-1'>
								<div class='card border-0' style='width:16rem;'>
									<div class='card-header border-primary bg-transparent'>
										<h6 class='text-uppercase'>Sobre o contrato</h6>
									</div>
									<div class='card-body bg-transparent p-0'>
										<div class='card-text'>
											<div class="form-group">
												<label for="ulogado">Usuário</label>
												<?php $sql = "SELECT l.idusuario, l.nome FROM contrato c inner join login l on c.Login_IdUsuario = l.IdUsuario group by c.Login_IdUsuario order by c.Login_IdUsuario asc;";
                          $result=mysqli_query($conexao,$sql);
                          echo "<select class='form-control custom-select' name='ulogado' id='ulogado'>";
                          echo "<option selected value='' >Usuários</option>";
                          while ($row = mysqli_fetch_row($result)){?>
												<option value='<?php echo $row[0] ?>'> <?php echo $row[1] ?></option>";
												<?php }
                          echo "</select>";
                          ?>
											</div>

											<div class="form-group">
												<label for="foro">Foro</label>
												<?php $sql = "SELECT c.foro FROM contrato c group by c.foro order by c.foro asc;";
                          $result=mysqli_query($conexao,$sql);
                          echo "<select class='form-control custom-select' name='foro' id='foro'>";
                          echo "<option selected value='' >Cidades</option>";
                          while ($row = mysqli_fetch_row($result)){?>
												<option value='<?php echo $row[0] ?>'> <?php echo $row[0] ?></option>";
												<?php }
                          echo "</select>";
                          ?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class='custom-control custom-control p-0 mb-1'>
								<div class='card border-0' style='width:16rem;'>
									<div class='card-header border-primary bg-transparent'>
										<h6 class='text-uppercase'>Veículo</h6>
									</div>
									<div class='card-body bg-transparent p-0'>
										<div class='card-text'>
											<div class="form-group">
												<label for="modelo">Modelo</label>
												<?php $sql = "SELECT v.nome FROM contrato c inner join veiculo v on c.Veiculo_IdVeiculo = v.IdVeiculo group by v.nome order by v.nome asc;";
                          $result=mysqli_query($conexao,$sql);
                          echo "<select class='form-control custom-select' name='modelo' id='modelo'>";
                          echo "<option selected value=''>Modelos</option>";
                          while ($row = mysqli_fetch_row($result)){?>
												<option value='<?php echo $row[0] ?>'> <?php echo $row[0] ?></option>";
												<?php }
                          echo "</select>";
                          ?>
											</div>

											<div class="form-group">
												<label for="ano">Ano</label>
												<?php $sql = "SELECT v.modelo FROM contrato c inner join veiculo v on c.Veiculo_IdVeiculo = v.IdVeiculo group by v.modelo order by v.modelo asc;";
                          $result=mysqli_query($conexao,$sql);
                          echo "<select class='form-control custom-select' name='ano' id='ano'>";
                          echo "<option selected value=''>Anos</option>";
                          while ($row = mysqli_fetch_row($result)){?>
												<option value='<?php echo $row[0] ?>'> <?php echo $row[0] ?></option>";
												<?php }
                          echo "</select>";
                          ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<input class="btn btn-md btn-primary btn-block text-uppercase" type="submit" name="encontrar" value="Encontrar" id="encontrar">
					</form>

					<div class="result"></div>


				</div>
			</div>
		</div>

	</div>



	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
