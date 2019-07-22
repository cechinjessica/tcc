<?php
session_start();
require 'config/conexao.php';

if (isset($_GET['id'])){
	$id=$_GET['id'];
	$op=$_GET['op'];
	$sql = "SELECT idpessoa, pessoa, nome, nacionalidade, profissao, sexo, cpf, endereco, cnpj FROM pessoa WHERE idpessoa='$id'";
	$res=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_row($res);
	$id= $row[0];
	$pessoa= $row[1];
	$nome= $row[2];
	$nacionalidade= $row[3];
	$profissao= $row[4];
	$sexo= $row[5];
	$cpf= $row[6];
	$endereco= $row[7];
	$cnpj= $row[8];

	if($pessoa == 'f'){
		$pessoaf='checked';
		$pessoaj='';
	}else if($pessoa =='j'){
		$pessoaj='checked';
		$pessoaf='';
	}
	if ($sexo =='m') {
		$sexom='checked';
		$sexof='';
	} else if ($sexo == 'f') {
		$sexof='checked';
		$sexom='';
	}
} else{
	$id=0;
}

if (isset($_POST['Enviar'])){
	$pessoa = $_POST["pessoa"];
	$nome= $_POST["nome"];
	$nacionalidade=$_POST["nacionalidade"];
	$profissao=$_POST["profissao"];
	$sexo=$_POST["sexo"];
	$cpf=$_POST["cpf"];
	$endereco=$_POST["endereco"];
	$cnpj=$_POST["cnpj"];
	$op=$_POST["op"];

	if ($id!=0) {
		//atualização
		if ($op=='A') {
			$sql="UPDATE pessoa SET NOME='$nome', CPF='$cpf', pessoa='$pessoa', nacionalidade='$nacionalidade', profissao='$profissao', sexo='$sexo', endereco ='$endereco', cnpj ='$cnpj' WHERE idpessoa='$id'";

			$res = mysqli_query($conexao,$sql);
			if (mysqli_error($conexao)) {
				$_SESSION['msg'] = "<h3>Erro na atualização do cliente $nome </h3>";
				header('Location:cadastro_tela.php');
			} else {

				$_SESSION['msg'] = "<h3>Usuario $nome atualizado com exito!</h3>";
				header('Location:cadastro_tela.php');
			}
			mysqli_close($conexao);
		} else {
			//exclusão de clientes
			$sql="DELETE FROM pessoa WHERE idpessoa='$id' ";
			$res = mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)=='1') {
				$_SESSION['msg'] = "<h3>Usuario $nome excluído com exito!</h3>";
				header('Location:cadastro_tela.php');
			} else {
				$_SESSION['msg'] = "<h2>Erro na exclusão do usuario $nome</h2>";
			}
			mysqli_close($conexao);
		}

	}

	//inclusão de clientes novos
	if ($id==0) {
		$sql = "SELECT * FROM pessoa WHERE cpf='$cpf'";
		mysqli_query($conexao,$sql);
		//$con->query($sql);
		if (mysqli_affected_rows($conexao)!=0) {
			mysqli_close($conexao);
			$_SESSION['msg'] = "<h3>Usuario $nome já existe</h3>";
			header('Location:cadastro_tela.php');
		}else {
			$sql = "INSERT INTO pessoa (nome, cpf, pessoa, nacionalidade, profissao, sexo, endereco, cnpj) VALUES ('$nome' ,'$cpf','$pessoa','$nacionalidade','$profissao','$sexo', '$endereco','$cnpj' )";

			mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)!=0) {
				//echo "Usuario $nome inserido com sucesso!";
				$_SESSION['msg'] = "<h1>Usuario $nome inserido com sucesso! </h1>";
				header('Location:cadastro_tela.php');
			} else {
				$_SESSION['msg'] ="<h1>Erro: " . $sql . "<br/>" . mysqli_error($conexao) . "<h1>" . "<br/>";
				header('Location:cadastro_tela.php');
			}
			mysqli_close($conexao);
		}
	}
	$id=0;
}
?>




<!--///////////////////-->
<!DOCTYPE html>
<html>

<head>
	<title>Contrato - Vendedor</title>
	<link rel="shortcut icon" href="imagens/icone.png" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
	<meta charset="utf-8">
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
						$('#rescli').html("<h3>Cuidado, usuario já existe</h3>");
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

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
	<script type="text/javascript" src="javascript/vendedorcomprador.js"></script>
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

	<div id="Vendedor">
		<h2>Formulário de Contrato</h2>
		<form action='#' method="POST" id="form1">
			<fieldset>
				<fieldset class="grupo">
					<legend><b>Sobre o Vendedor: </b></legend>
					<div class="campo" id="gpessoa">
						<label>Tipo de Pessoa</label>
						<input type="radio" id="fisica" class="pessoa" name="pessoa" value="f" <?php echo ($id!=0)?"$pessoaf":'';?> /><label>Pessoa fisica</label>
						<input type="radio" id="juridica" class="pessoa" name="pessoa" value="j" <?php echo($id!=0)?"$pessoaj":'';?> /><label>Pessoa jurídica</label>
						<p id="msg_pessoa"></p>
					</div>
					<div class="campo" id="gnome">
						<label for="nome">Nome Completo</label>
						<label for="nome" class="representante"> do Representante:</label>
						<input type="text" id="nome" name="nome" value="<?php echo ($id!=0)?"$nome":'';?>" placeholder="Nome e Sobrenome">
						<p id="msg_nome"></p>
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
				</fieldset>
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
			</fieldset>
		</form>
	</div>

	<p id='msg'> </p>
</body>

</html>
