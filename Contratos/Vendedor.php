<?php
session_start();
require 'config/conexao.php';

//PARA COLOCAR AS INFORMAÇÕES DO BD NOS CAMPOS
if (isset($_GET['id'])){
	$id=$_GET['id'];
	$op=$_GET['op'];
	$sql = "SELECT idpessoa, tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, cnpj, enderecoempresa, cargo, tipoempresa, cidadeempresa, numeroempresa, nomeempresa FROM pessoa WHERE idpessoa='$id'";
	$res=mysqli_query($conexao,$sql);
	$row=mysqli_fetch_row($res);
	$id= $row[0];
	$tipopessoa = $row[1];
	$nome = $row[2];
	$nacionalidade = $row[3];
	$profissao = $row[4];
	$ecivil = $row[5];
	$rg = $row[6];
	$cpf = $row[7];
	$endereco = $row[8];
	$sexo = $row[9];
	$numero = $row[10];
	$cidade = $row[11];
	$cep = $row[12];
	$cnpjempresa = $row[13];
	$enderecoempresa = $row[14];
	$cargoempresa = $row[15];
	$tipoempresa = $row[16];
	$cidadeempresa = $row[17];
	$numeroempresa = $row[18];
	$nomeempresa = $row[19];

	if($tipopessoa == "f"){
		$pessoaf = "checked";
		$pessoaj = "";
	}else if($tipopessoa == "j"){
		$pessoaf = "";
		$pessoaj = "checked";
	}

	if($ecivil == "solteiro"){
		$solteiro = "checked";
		$casado = "";
		$divorciado = "";
		$viuvo = "";
		$separado = "";
	}else if ($ecivil == "casado"){
		$solteiro = "";
		$casado = "checked";
		$divorciado = "";
		$viuvo = "";
		$separado = "";
	}

	if($sexo = "m"){
		$sexom = "checked";
		$sexof = "";
	}else if ($sexo = "f"){
		$sexom = "";
		$sexof = "checked";
	}

	if ($tipoempresa = "pu"){
		$tipoempresapu = "checked";
		$tipoempresapr = "";
	}else if ($tipoempresa = "pr"){
		$tipoempresapu = "";
		$tipoempresapr = "checked";
	}

} else{
	$id=0;
}


//PARA PEGAR OS DADOS DOS CAMPOS
if (isset($_POST['enviar'])){
	$id= $_POST['pessoa'];
	$tipopessoa = $_POST['pessoa'];
	$nome = $_POST['nome'];
	$nacionalidade = $_POST['nacionalidade'];
	$profissao = $_POST['profissao'];
	$ecivil = $_POST['ecivil'];
	$rg = $_POST['rg'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$sexo = $_POST['sexo'];
	$numero = $_POST['numero'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$cnpjempresa = $_POST['cnpjempresa'];
	$enderecoempresa = $_POST['enderecoempresa'];
	$cargoempresa = $_POST['cargoempresa'];
	$tipoempresa = $_POST['tipoempresa'];
	$cidadeempresa = $_POST['cidadeempresa'];
	$numeroempresa = $_POST['numeroempresa'];
	$nomeempresa = $_POST['nomeempresa'];
	$op=$_POST['op'];


	//PARA ATUALIZAR, HAVERÁ ID POIS HÁ UMA PESSOA
	if ($id != 0) {
		if ($op == 'A') {
			$sql="UPDATE pessoa SET tipopessoa='$tipopessoa', nome ='$nome', nacionalidade ='$nacionalidade', profissao ='$profissao', estadocivil ='$ecivil', rg='$rg', cpf='$cpf', endereco ='$endereco', sexo='$sexo', numero ='$numero', cidade ='$cidade', cep ='$cep', cnpj ='$cnpjempresa', enderecoempresa ='$enderecoempresa', cargo ='$cargoempresa', tipoempresa ='$tipoempresa', cidadeempresa ='$cidadeempresa', numeroempresa ='$numeroempresa', nomeempresa ='$nomeempresa' where idpessoa ='$id'";

			$res = mysqli_query($conexao,$sql);
			if (mysqli_error($conexao)) {
				$_SESSION['msg'] = "<p class='alert alert-danger' role='alert'>Erro na atualização de $nome</p>";
				header('Location:vendedor.php');
			} else {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome atualizado com sucesso!</p>";
				header('Location:vendedor.php');
			}
			mysqli_close($conexao);

		} else { //PARA EXCLUIR
			$sql="DELETE FROM pessoa WHERE idpessoa='$id'";
			$res = mysqli_query($conexao,$sql);
			if (mysqli_affected_rows($conexao)=='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome excluído com sucesso!</p>";
				header('Location:cadastro_tela.php');
			} else {
				$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>Erro na exclusão de $nome</p>";
			}
			mysqli_close($conexao);
		}

	}else{//SE FOR == 0 ENTÃO A PESSOA AINDA NÃO ESTÁ CADASTRADA
		//INCLUSÃO
		$sql = "SELECT * FROM pessoa WHERE cpf='$cpf'";
		mysqli_query($conexao,$sql);

		if (mysqli_affected_rows($conexao)!=0) {
			mysqli_close($conexao);
			$_SESSION['msg'] = "p class='alert alert-danger' role='alert'>$cpf já foi cadastrado</p>";
			header('Location:vendedor.php');

		}else {
			$sql = "INSERT INTO pessoa (tipopessoa, nome, nacionalidade, profissao, estadocivil, rg, cpf, endereco, sexo, numero, cidade, cep, cnpj, enderecoempresa, cargo, tipoempresa, cidadeempresa, numeroempresa, nomeempresa) VALUES ('$tipopessoa', '$nome', '$nacionalidade', '$profissao', '$ecivil', '$rg', '$cpf', '$endereco', '$sexo', '$numero', '$cidade', '$cep', '$cnpjempresa', '$enderecoempresa', '$cargoempresa', '$tipoempresa', '$cidadeempresa', '$numeroempresa', '$nomeempresa')";
			mysqli_query($conexao,$sql);

			if (mysqli_affected_rows($conexao) =='1') {
				$_SESSION['msg'] = "<p class='alert alert-success' role='alert'>$nome inserido com sucesso!</p>";
				header('Location:vendedor.php');
			} else {
				$_SESSION['msg'] ="<p class='alert alert-danger' role='alert'>Erro: ".mysqli_error($conexao)."<p>";
				header('Location:vendedor.php');
			}
			mysqli_close($conexao);
		}
	}
	$id=0;
}
?>

<!--////////////////////////////////////////////////////////////////////////////-->

<?php
include('config/verifica_login.php');
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

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
						$('#rescli').html("<p class='alert alert-success' role='alert'>CPF já cadastrado</p>");
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

</head>

<body>
	<script type="text/javascript" src="javascript/vendedorcomprador.js"></script>
	<div class="container-fluid">
		<div class="col-sm-12 col-md-11 col-lg-11 mx-auto">
			<?php
				if (isset($_SESSION['msg'])) {
					echo  $_SESSION['msg'];
					unset ($_SESSION['msg']);
				}
				?>
			<div class="card card-padrao my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Sobre o vendedor:</h5>
					<form action="#" method="post" class="form-padrao">
						<div class="row">
							<div class="form-group col-sm-12 col-md-5 col-lg-5">
								<!--faltou: o php do input-->
								<label for="pessoa">Tipo de pessoa</label>
								<div class="form-check-inline">
									<input type="radio" class="form-check-input" name="pessoa" value="f" id="pessoaf" <?php echo ($id!=0)?"$pessoaf":'';?>>Pessoa física
								</div>
								<div class="form-check-inline">
									<input type="radio" class="form-check-input" name="pessoa" value="j" id="pessoaj" <?php echo ($id!=0)?"$pessoaj":'';?>>Pessoa jurídica
								</div>
								<p id="msg_pessoa" class="form-control feedback"></p>
							</div>

							<div class="form-group col-sm-12 col-md-5 col-lg-5">
								<label for="nome">Nome Completo</label><label for="nome" class="representante"> do representante</label>
								<input type="text" id="nome" class="form-control" name="nome" value="<?php echo ($id!=0)?"$nome":'';?>">
								<p id="msg_nome" class="form-control-feedback"></p>
							</div>
						</div>

						<div class="form-group">
							<label for="nacionalidade">Nacionalidade</label><label for="nacionalidade" class="representante"> do representante</label>
							<input type="text" id="nacionalidade" class="form-control" name="nacionalidade" value="<?php echo ($id!=0)?"$nacionalidade":'';?>">
							<p id="msg_nacionalidade" class="form-control feedback"></p>
						</div>

						<div class="form-group">
							<label for="profissao">Profissão</label><label for="profissao" class="representante"> do representante</label>
							<input type="text" id="profissao" class="form-control" name="profissao" value="<?php echo ($id!=0)?"$profissao":'';?>">
							<p id="msg_profissao" class="form-control feedback"></p>
						</div>

						<div class="form-group" id="ecivil">
							<label for="ecivil">Estado cívil</label>
							<label for="ecivil" class="representante"> do representante</label>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="ecivil" value="solteiro" id="solteiro" <?php echo ($id!=0)?"$solteiro":'';?>>Solteiro(a)
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="ecivil" value="casado" id="casado" <?php echo ($id!=0)?"$casado":'';?>>Casado(a)
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="ecivil" value="divorciado" id="divorciado" <?php echo ($id!=0)?"$divorciado":'';?>>Divorciado(a)
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="ecivil" value="viuvo" id="viuvo" <?php echo ($id!=0)?"$viuvo":'';?>>Viúvo(a)
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="ecivil" value="separado" id="separado" <?php echo ($id!=0)?"$separado":'';?>>Separado(a)
							</div>
							<p id="msg_ecivil" class="form-control feedback"></p>
						</div>

						<div class="form-group">
							<label for="rg">RG</label><label for="rg" class="representante"> do representante</label>
							<input type="text" id="rg" class="form-control" name="rg" value="<?php echo ($id!=0)?'$rg':'';?>">
							<p id="msg_rg" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="cpf">CPF</label><label for="cpf" class="representante"> do representante</label>
							<input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo ($id!=0)?'$cpf':'';?>">
							<p id="msg_cpf" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="endereco">Endereco</label><label for="endereco" class="representante"> do representante</label>
							<input type="text" id="endereco" class="form-control" name="endereco" value="<?php echo ($id!=0)?'$endereco':'';?>">
							<p id="msg_endereco" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="numero">Número</label><label for="numero" class="representante"> do representante</label>
							<input type="text" id="numero" class="form-control" name="numero" value="<?php echo ($id!=0)?'$numero':'';?>">
							<p id="msg_numero" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="cidade">Cidade</label><label for="cidade" class="representante"> do representante</label>
							<input type="text" id="cidade" class="form-control" name="cidade" value="<?php echo ($id!=0)?'$cidade':'';?>">
							<p id="msg_cidade" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="cep">CEP</label><label for="cep" class="representante"> do representante</label>
							<input type="text" id="cep" class="form-control" name="cep" value="<?php echo ($id!=0)?'$cep':'';?>">
							<p id="msg_cep" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="sexo">Sexo</label><label for="cep" class="representante"> do representante</label>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="sexo" value="f" id="sexof" <?php echo ($id!=0)?"$sexof":'';?>>Feminino
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="sexo" value="m" id="sexom" <?php echo ($id!=0)?"$sexom":'';?>>Masculino
							</div>
							<p id="msg_sexo" class="form-control feedback"></p>
						</div>

						<div class="form-group" id="gnomeempresa">
							<label for="nomeempresa">Nome</label><label for="nomeempresa" class="representante"> da empresa</label>
							<input type="text" id="nomeempresa" class="form-control" name="nomeempresa" value="<?php echo ($id!=0)?"$nomeempresa":'';?>">
							<p id="msg_nomeempresa" class="form-control-feedback "></p>
						</div>

						<div class="form-group" id="gcnpj">
							<label for="cnpj">CNPJ</label><label for="cnpj" class="representante"> da empresa</label>
							<input type="text" id="cnpj" class="form-control" name="cnpjempresa" value="<?php echo ($id!=0)?"$cnpjempresa":'';?>">
							<p id="msg_cnpj" class="form-control-feedback "></p>
						</div>

						<div class="form-group" id="genderecoempresa">
							<label for="enderecoempresa">Endereço</label><label for="enderecoempresa" class="representante"> da empresa</label>
							<input type="text" id="enderecoempresa" class="form-control" name="enderecoempresa" value="<?php echo ($id!=0)?"$enderecoempresa":'';?>">
							<p id="msg_enderecoempresa" class="form-control-feedback "></p>
						</div>

						<div class="form-group" id="gcargoempresa">
							<label for="cargo">Cargo</label><label for="cargo" class="representante"> do representante</label>
							<input type="text" id="cargo" class="form-control" name="cargoempresa" value="<?php echo ($id!=0)?"$cargoempresa":'';?>">
							<p id="msg_cargo" class="form-control-feedback "></p>
						</div>

						<div class="form-group" id="gtipoempresa">
							<label for="tipoempresa">Tipo</label>
							<label for="tipoempresa" class="representante"> da empresa</label>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="tipoempresa" value="pu" id="tipoempresapu" <?php echo ($id!=0)?"$tipoempresapu":'';?>>Pública
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="tipoempresa" value="pr" id="tipoempresapr" <?php echo ($id!=0)?"$tipoempresapr":'';?>>Privada
							</div>
							<p id="msg_tipoempresa" class="form-control feedback"></p>
						</div>

						<div class="form-group" id="gcidadeempresa">
							<label for="cidadeempresa">Cidade</label><label for="cidadeempresa" class="representante"> da empresa</label>
							<input type="text" id="cidadeempresa" class="form-control" name="cidadeempresa" value="<?php echo ($id!=0)?"$cidadeempresa":'';?>">
							<p id="msg_cidadeempresa" class="form-control-feedback "></p>
						</div>

						<div class="form-group" id="gnumeroempresa">
							<label for="numeroempresa">Número</label><label for="numeroempresa" class="representante"> da empresa</label>
							<input type="text" id="numeroempresa" class="form-control" name="numeroempresa" value="<?php echo ($id!=0)?"$numeroempresa":'';?>">
							<p id="msg_numeroempresa" class="form-control-feedback "></p>
						</div>

						<input type='hidden' name='id' id='codigo' value="<?php echo ($id!=0)?"$id":'0';?>">
						<input type='hidden' name='op' value="<?php echo ($id!=0)?"$op":'';?>">

						<?php
							$txtbtn="Incluir";
							if (isset($op)){
								$txtbtn=($op=='A')?'Salvar':'Excluir';
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
