<!DOCTYPE html>
<?php session_start(); ?>

<html>

<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="imagens/icone.png" />
	<link rel='stylesheet' href='css/style.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include('config/verifica_login.php');
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
			$.get("config/busca_cli.php?q=" + str, function(data, status) {
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

	<title>Cadastro de Clientes </title>
</head>

<body>
	<nav id="menu">
		<ul id="b1">
			<li>
				<a href="Vendedor.php">
					<h1>Bem vindo <?php echo $_SESSION['usuario']; ?></h1>
				</a>
			</li>
			<li><a href="cadastro_tela.php">Ver cadastros</a></li>
			<li style="float: right;"><a href="config/logout.php">Logout</a></li>
		</ul>
	</nav>
	<center>
		<h1 style="font-size:17px;">Cadastro de Pessoas</h1>

		<?php
        if (isset($_SESSION['msg'])) {
            echo  $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }
    ?>

		<h2>
			<a href="Vendedor.php"><input type="button" name="incluir" value="Incluir uma nova pessoa"></a>
		</h2>

		<form>
			<input type='text' name='nome' id='nome' placeholder="digite o nome da pessoa">
		</form>
		<br />

		<fieldset id="txtcli">
			Dados dos usuario....
		</fieldset>
	</center>
	<form><a href="Vendedor.php"><input type='button' value='Voltar'></a></form>
</body>

</html>
