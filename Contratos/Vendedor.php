<?php
session_start();
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

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">CRUD</a> </div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Clientes <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Gerenciar Clientes</a></li>
							<li><a href="#">Novo Cliente</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.navbar-collapse -->
		</div>
	</nav>
	<div class="container-fluid">
		<div class="col-sm-9 col-md-8 col-lg-6 mx-auto">
			<div class="card card-padrao my-5">
				<div class="card-body">
					<h5 class="card-title text-center">Sobre o vendedor:</h5>
					<form action="config/vendedor.php" method="post" class="form-padrao">
						<div class="form-group">
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

						<div class="form-group">
							<label for="nome">Nome Completo</label><label for="nome" class="representante"> do representante</label>
							<input type="text" id="nome" class="form-control" name="nome" value="<?php echo ($id!=0)?'$nome':'';?>">
							<p id="msg_nome" class="form-control-feedback "></p>
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

						<div class="form-group">
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

						<div class="form-group">
							<label for="nomeempresa">Nome</label><label for="nomeempresa" class="representante"> da empresa</label>
							<input type="text" id="nomeempresa" class="form-control" name="nomeempresa" value="<?php echo ($id!=0)?'$nomeempresa':'';?>">
							<p id="msg_nomeempresa" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="cnpj">CNPJ</label><label for="cnpj" class="representante"> da empresa</label>
							<input type="text" id="cnpj" class="form-control" name="cnpj" value="<?php echo ($id!=0)?'$cnpj':'';?>">
							<p id="msg_cnpj" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="enderecoempresa">Endereço</label><label for="enderecoempresa" class="representante"> da empresa</label>
							<input type="text" id="enderecoempresa" class="form-control" name="enderecoempresa" value="<?php echo ($id!=0)?'$enderecoempresa':'';?>">
							<p id="msg_enderecoempresa" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="cargo">Cargo</label><label for="cargo" class="representante"> do representante</label>
							<input type="text" id="cargo" class="form-control" name="cargo" value="<?php echo ($id!=0)?'$cargo':'';?>">
							<p id="msg_cargo" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="tipoempresa">Tipo</label>
							<label for="tipoempresa" class="representante"> da empresa</label>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="tipoempresa" value="pu" id="tipoempresapu" <?php echo ($id!=0)?"$tipoempresapu":'';?>>Pública
							</div>
							<div class="form-check-inline">
								<input type="radio" class="form-check-input" name="tipoempresa" value="pr" id="tipoempresapr" <?php echo ($id!=0)?"$tipoemprespr":'';?>>Privada
							</div>
							<p id="msg_tipoempresa" class="form-control feedback"></p>
						</div>

						<div class="form-group">
							<label for="cidadeempresa">Cidade</label><label for="cidadeempresa" class="representante"> da empresa</label>
							<input type="text" id="cidadeempresa" class="form-control" name="cidadeempresa" value="<?php echo ($id!=0)?'$cidadeempresa':'';?>">
							<p id="msg_cidadeempresa" class="form-control-feedback "></p>
						</div>

						<div class="form-group">
							<label for="numeroempresa">Número</label><label for="numeroempresa" class="representante"> da empresa</label>
							<input type="text" id="numeroempresa" class="form-control" name="numeroempresa" value="<?php echo ($id!=0)?'$numeroempresa':'';?>">
							<p id="msg_numeroempresa" class="form-control-feedback "></p>
						</div>





					</form>
				</div>
			</div>
		</div>
	</div>





	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
