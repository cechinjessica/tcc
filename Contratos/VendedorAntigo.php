<!--///////////////////-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<title>Contrato - Vendedor</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
		function verif_cli(cpf) {
			str = cpf;
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					if ((this.response) == '1') {
						$('#rescli').html("<p class='alert alert-success' role='alert'>Cuidado, usuario já existe</p>");
						$('#cpf').addClass('erro');
					} else {
						$('#cpf').removeClass('erro');
						$('#rescli').html("");
					}

					//return (this.response);
				}
			};
			//xmlhttp.open("GET", "busca_cli.php?q=" + str, true);
			//xmlhttp.send();
			xmlhttp.open("POST", "config/busca_cli_cpf.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("q=" + str);

		}

		$(document).ready(function() {
			$('#cpf').blur(function() {
				if (($('#codigo').val() == '0') && ($('#cpf').val().trim() != '')) {
					verif_cli($('#cpf').val());
				}

			});
		});

	</script>
	<?php
	include('config/verifica_login.php');
	?>
</head>

<body>
	<script type="text/javascript" src="javascript/vendedorcomprador.js"></script>
	<!--Menu a fazer-->
	<!--<nav id="menu">
		<ul id="b1">
			<li>
				<a href="Vendedor.php">
					<h1>Bem vindo <?php echo $_SESSION['usuario']; ?></h1>
				</a>
			</li>
			<li><a href="cadastro_tela.php">Ver cadastros</a></li>
			<li style="float: right;"><a href="config/logout.php">Logout</a></li>
		</ul>
	</nav>-->
	<!--Menu a fazer-->
	<div class="container-fluid">
		<div class="col-sm-9 col-md-8 col-lg-6 mx-auto">
			<div class="card card-padrao my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Sobre vendedor:</h5>
					<form action="config/vendedor.php" method="post" class="form-padrao">

						<div class="form-check form-check-inline">
							<label for="pessoa">Tipo de Pessoa</label>
							<input class="form-check-input" type="radio" name="pessoa" id="pfisica" value="f" <?php echo ($id!=0)?"$pessoaf":'';?>>
							<label class="form-check-label" for="pfisica">
								Pessoa física
							</label>
							<input class="form-check-input" type="radio" name="pessoa" id="pjuridica" value="j" <?php echo ($id!=0)?"$pessoaj":'';?>>
							<label class="form-check-label" for="pfisica">
								Pessoa jurídica
							</label>
							<p id="msg_pessoa" class="form-control-feedback"></p>
						</div>

						<div class="form-group">
							<label for="nome">Nome Completo</label>
							<label for="nome" class="representante"> do Representante:</label>
							<input type="text" id="nome" class="form-control" name="nome" value="<?php echo ($id!=0)?"$nome":'';?>" placeholder="Nome e Sobrenome">
							<p id="msg_nome" class="form-control-feedback "></p>
						</div>
						<div class="campo" id="gnacionalidade">
							<label for="nacionalidade">Nacionalidade</label>
							<label for="nome" class="representante"> do Representante:</label>
							<input type="text" id="nacionalidade" name="nacionalidade" value="<?php echo ($id!=0)?"$nacionalidade":'';?>" placeholder="Nacionalidade">
							<p id="msg_nacionalidade"></p>
						</div>
						<div class="campo" id="gprofissao">
							<label for="Profissão">Profissão</label>
							<!--<label for="nome" class="representante"> do Representante:</label>-->
							<input type="text" id="profissao" value="<?php echo ($id!=0)?"$profissao":'';?>" placeholder="Profissão" name="profissao">
							<p id="msg_profissao"></p>
						</div>

						<div class="campo" id="gsexo">
							<label>Sexo</label>
							<label for="nome" class="representante"> do Representante:</label>
							<label>
								<input type="radio" class="sexo" name="sexo" value="m" <?php echo ($id!=0)?"$sexom":'';?>> Masculino
							</label>
							<label>
								<input type="radio" class="sexo" name="sexo" value="f" <?php echo ($id!=0)?"$sexof":'';?>> Feminino
							</label>
							<p id="msg_sexo"></p>
						</div>
						<div class="campo" id="gcpf">
							<label for="cpf">CPF</label>
							<label for="nome" class="representante"> do Representante:</label>
							<input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?php echo ($id!=0)?"$cpf":'';?>">
							<p id="msg_cpf"></p>
						</div>

						<div class="campo" id="gendereco">
							<label for="endereco">Endereço</label>
							<label for="nome" class="representante"> do Representante:</label>
							<input type="text" id="endereco" value="<?php echo ($id!=0)?"$endereco":'';?>" placeholder="Rua" name="endereco">
							<p id="msg_endereco"></p>
						</div>
						<div class="campo" id="gcnpj">
							<label for="cnpj">CNPJ:</label>
							<input type="text" id="cnpj" value="<?php echo ($id!=0)?"$cnpj":'';?>" placeholder="CNPJ da Empresa" name="cnpj">
							<p id="msg_cnpj"></p>
						</div>

						<br>
						<input type='hidden' name='id' id='codigo' value="<?php echo ($id!=0)?"$id":'0';?>">
						<input type='hidden' name='op' value="<?php echo ($id!=0)?"$op":'';?>">

						<?php
            $txtbtn='Incluir';
            if (isset($op)){
                $txtbtn=($op=='A')?'Salvar':'Excluir';
            }
          ?>
						<input type="submit" name="Enviar" value="<?php echo $txtbtn; ?>" id="salvar">

					</form>
				</div>

				<p id='msg'> </p>
			</div>
		</div>
	</div>


</body>

</html>
