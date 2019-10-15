<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
session_start();
require 'conexao.php';
include('../config/verifica_login.php');

if (isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	header('Location:../cadastros/cadastro_contrato.php');
}

?>

<!--////////////////////////////////////////////////////////////////////////////-->
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

	</style>

</head>

<body style="background: #007bff;
				 background: linear-gradient(to left, #5A8BB7, #2D9AAD);">
	<script type="text/javascript" src="../javascript/editar_contrato.js"></script>
	<!--NAVBAR-->
	<nav class="navbar navbar-expand-md bg-info navbar-light sticky-top">
		<a class="navbar-brand" href="#"><img src="../imagens/icone.png" width="30px">Contrato</a>
		<a class="nav-text d-none  d-lg-inline">Bem vindo(a) <?php echo $_SESSION['nome']; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link" href="../contrato.php">Gerar contrato</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Cadastrar
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../cadastros/vendedor.php">Pessoa</a>
						<a class="dropdown-item" href="../cadastros/veiculo.php">Veículo</a>
						<a class="dropdown-item" href="../cadastro_contrato.php">Contrato</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Cadastros
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="../cadastros/cadastro_pessoa.php">Pessoa</a>
						<a class="dropdown-item" href="../cadastros/cadastro_veiculo.php">Veículo</a>
						<a class="dropdown-item" href="../cadastros/cadastro_contrato.php">Contrato</a>
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
					<form action="imprimir.php" method="post" class="form-padrao">
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$sql = "SELECT pp.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
							$result = mysqli_query($conexao, $sql);
							while($row = mysqli_fetch_assoc($result)){
								if($row['TipoPessoa'] == 'f'){
									$nome = mb_strtoupper($row['Nome'], 'UTF-8');
									$nacionalidade = mb_strtolower($row['Nacionalidade'], 'UTF-8');
									$profissao = mb_strtolower($row['Profissao'], 'UTF-8');

									if($row['Sexo'] == 'f'){
										$final = 'a';
									}else{
										$final = 'o';
									}

									$ecivil = $row['EstadoCivil'];
									$size = strlen($ecivil);
									$ecivil = substr($ecivil ,0, $size-1);


									$vendedor= " ".$nome.", ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";

								}else{
									$nacionalidade = mb_strtolower($row['Nacionalidade'], 'UTF-8');
									$profissao = mb_strtolower($row['Profissao'], 'UTF-8');
									$cargo = mb_strtolower($row['CargoEmpresa'], 'UTF-8');
									$nomeempresa = mb_strtoupper($row['NomeEmpresa'], 'UTF-8');
									$nome = mb_strtoupper($row['Nome'], 'UTF-8');

									if($row['TipoEmpresa'] == 'pu'){
										$tipoempresa = 'pública';
									}else{
										$tipoempresa = 'privada';
									}

									if($row['Sexo'] == 'f'){
										$final = 'a';
										$sua = 'sua';
									}else{
										$final = 'o';
										$sua = 'seu';
									}

									$ecivil = $row['EstadoCivil'];
									$size = strlen($ecivil);
									$ecivil = substr($ecivil ,0, $size-1);

									$vendedor=" ".$nomeempresa.", empresa ".$tipoempresa.", inscrita no CNPJ n. ".$row['CNPJ'].", localizada na ".$row['EnderecoEmpresa'].", n. ".$row['NumeroEmpresa'].", na cidade de ".$row['CidadeEmpresa']."-".$row['UFEmpresa'].", representada neste ato por ".$sua." ".$cargo." <b>".$nome."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";
								}

								$vendedor_visualizacao = strip_tags($vendedor);
							}
							?>
						<div class="form-group">
							<label for="vendedor"><b>VENDEDOR</b></label>
							<textarea class="form-control rounded-0" id="vendedor" rows="2" name="vendedor" readonly><?php echo $vendedor_visualizacao ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

						<?php
	$sql = "SELECT p.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
									$result = mysqli_query($conexao, $sql);
									while($row = mysqli_fetch_assoc($result)){
										if($row['TipoPessoa'] == 'f'){
											$nomec = mb_strtoupper($row['Nome'], 'UTF-8');
											$nacionalidade = mb_strtolower($row['Nacionalidade'], 'UTF-8');
											$profissao = mb_strtolower($row['Profissao'], 'UTF-8');

											if($row['Sexo'] == 'f'){
												$final = 'a';
											}else{
												$final = 'o';
											}

											$ecivil = $row['EstadoCivil'];
											$size = strlen($ecivil);
											$ecivil = substr($ecivil ,0, $size-1);


											$comprador= " ".$nomec."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";

										}else{
											$nacionalidade = mb_strtolower($row['Nacionalidade'], 'UTF-8');
											$profissao = mb_strtolower($row['Profissao'], 'UTF-8');
											$cargo = mb_strtolower($row['CargoEmpresa'], 'UTF-8');
											$nomeempresa = mb_strtoupper($row['NomeEmpresa'], 'UTF-8');
											$nomec = mb_strtoupper($row['Nome'], 'UTF-8');

											if($row['TipoEmpresa'] == 'pu'){
												$tipoempresa = 'pública';
											}else{
												$tipoempresa = 'privada';
											}

											if($row['Sexo'] == 'f'){
												$final = 'a';
												$sua = 'sua';
											}else{
												$final = 'o';
												$sua = 'seu';
											}

											$ecivil = $row['EstadoCivil'];
											$size = strlen($ecivil);
											$ecivil = substr($ecivil ,0, $size-1);

											$comprador=" ".$nomeempresa."</b>, empresa ".$tipoempresa.", inscrita no CNPJ n. ".$row['CNPJ'].", localizada na ".$row['EnderecoEmpresa'].", n. ".$row['NumeroEmpresa'].", na cidade de ".$row['CidadeEmpresa']."-".$row['UFEmpresa'].", representada neste ato por ".$sua." ".$cargo." <b>".$nomec."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";
										}
									}
									$comprador_visualizacao = strip_tags($comprador);

							?>

						<div class="form-group">
							<label for="comprador"><b>COMPRADOR</b></label>
							<textarea class="form-control rounded-0" id="comprador" rows="3" name="comprador" readonly><?php echo $comprador_visualizacao ?></textarea>
						</div>
						<br />
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


						<?php
	$sql = "SELECT v.*, c.ValorTotal as ValorTotal FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
									$result = mysqli_query($conexao, $sql);
									$row = mysqli_fetch_assoc($result);

									$estado = ucfirst($row['Estado']);
									$fixo = "<p align='justify'><b>As partes acima identificadas têm, entre si, justo e acertado o presente Contrato e Venda de Veículo ".$estado.", que se regerá pelas cláusulas seguintes e pelas condições descritas no presente.</b></p><br/>";

									$fixo_visualizacao = strip_tags($fixo);

							?>
						<div class="form-group">
							<textarea class="form-control rounded-0" id="fixo" rows="3" name="fixo" readonly><?php echo $fixo_visualizacao ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

						<?php

	$clausula = 1;
									$nomevei = mb_strtoupper($row['Nome'], 'UTF-8');
									$cor = mb_strtoupper($row['Cor'], 'UTF-8');
									if($row['Combustivel'] == "gasolina"){
										$combustivel = "GASOLINA";
									}else if($row['Combustivel'] == "etanol"){
										$combustivel = "ETANOL";
									}else if($row['Combustivel'] == "diesel"){
										$combustivel = "DIESEL";
									}else if($row['Combustivel'] == "gasnatural"){
										$combustivel = "GÁS NATURAL";
									}else if($row['Combustivel'] == "eletrico"){
										$combustivel = "ELÉTRICO";
									}else if($row['Combustivel'] == "flex"){
										$combustivel = "FLEX";
									}

									$placa =$row['Placa'];

									$objeto= "<p align='justify'>O presente contrato tem como OBJETO, um ".$nomevei.", ANO MODELO ".$row['Ano']."/".$row['Modelo'].", PLACA ".$placa.", RENAVAM N. ".$row['Renavam'].", CHASSI ".$row['Chassi'].", COMBUSTÍVEL ".$combustivel.", COR ".$cor.", livre de qualquer ônus ou encargo.</p>";
									$clausula++;
									$objeto_visualizacao = strip_tags($objeto);

							?>
						<div class="form-group">
							<label for="objeto"><b>DO OBJETO</b></label>
							<textarea class="form-control rounded-0" id="objeto" rows="2" name="objeto" readonly><?php echo $objeto_visualizacao ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

						<?php
	$objeto1="";
									if($row['Estado'] == "usado"){
										$objeto1 = "<p align='justify'>O veículo, objeto deste contrato é usado, apresentando desgaste natural decorrente do tempo, já visto e inspecionado pelo <b>COMPRADOR</b>, o qual tomou ciência de suas condições e estado de conservação.</p><br />";
										$clausula++;
										$objeto1_visualizacao = strip_tags($objeto1);
										echo "<div class='form-group'>
								<textarea class='form-control rounded-0' id='objeto1' rows='2' name='objeto1' readonly>".$objeto1_visualizacao."</textarea>
				</div>";
									}
							?>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

						<?php

							$responsabilidade1 = "O <b>VENDEDOR</b> se responsabilizará pelo bom estado e perfeito funcionamento do veículo até a data de assinatura do presente contrato.";
							$aclausula = $clausula;
							$clausula++;

							$inicio ="<p align='justify'>";
							$fim = "</p>";
							$responsabilidade1_visualizacao = strip_tags($responsabilidade1);

							?>
						<div class="form-group">

							<label for="responsabilidade1"><b>DAS RESPONSABILIDADES</b></label>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_responsabilidade1" name="s_responsabilidade1" checked>
								<label class="custom-control-label" for="switch_responsabilidade1">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="responsabilidade1" rows="1" name="responsabilidade1" readonly><?php echo $responsabilidade1_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

						<?php


							$responsabilidade2 = "O <b>VENDEDOR</b> se responsabilizará pela entrega do veículo no local indicado pelo <b>COMPRADOR</b>, nas mesmas condições de quando foi inspecionado pelo <b>COMPRADOR</b>.";
							$clausula++;

							$responsabilidade2_visualizacao = strip_tags($responsabilidade2);
							?>
						<div class="form-group">
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_responsabilidade2" name="s_responsabilidade2" checked>
								<label class="custom-control-label" for="switch_responsabilidade2">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="responsabilidade2" rows="2" name="responsabilidade2" readonly><?php echo $responsabilidade2_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php


							$transferencia= "A transferência da propriedade do veículo será feita até o prazo máximo de 30 (trinta) dias a contar da data de assinatura deste contrato.";
							$clausula++;
							$transferencia_visualizacao = strip_tags($transferencia);

							?>
						<div class="form-group">

							<label for="transferencia"><b>DA TRANSFERÊNCIA DA PROPRIEDADE DO VEÍCULO</b></label>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_transferencia" name="s_transferencia" checked>
								<label class="custom-control-label" for="switch_transferencia">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="transferencia" rows="1" name="transferencia" readonly><?php echo $transferencia_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

						<?php

							$sql = "SELECT c.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
							$result = mysqli_query($conexao, $sql);
							$row = mysqli_fetch_assoc($result);


							$entrada = $row['Entrada'];
							$total = $row['ValorTotal'];

							$total_format = number_format($row['ValorTotal'], 2, ',', '.');
							$entrada_format = number_format($row['Entrada'], 2, ',', '.');
							$parcela_format = number_format($row['ValorParcela'], 2, ',', '.');

							$inicio="<p align='justify'>";
							$fim ="</p><br/>";

							if($entrada == $total){

								$preco = "O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$total_format.",à vista, que deverá ser quiatda até o dia ".$row['DataPagamento'].".";
								$clausula++;
							}else if($row['Entrada'] != 0 ){

								$preco = "O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$total_format.", por meio de uma entrada de R$ ".$entrada_format." e mais ".$row['NumeroParcelas']." parcelas de R$ ".$parcela_format.", que serão pagas mensalmente, todos os dias ".$row['DataPagamento']." dos meses subsequentes.";
								$clausula++;
							}else{

								$preco = "O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$total_format.", dividida em ".$row['NumeroParcelas']." parcelas mensais de ".$parcela_format.", a serem pagas até o dia ".$row['DataPagamento']." dos meses subsequentes.";
								$clausula++;

							}

							$preco_visualizacao = strip_tags($preco);

							?>
						<div class="form-group">

							<label for="preco"><b>DO PREÇO</b></label>
							<textarea class="form-control rounded-0" id="preco" rows="2" name="preco" readonly><?php echo $preco_visualizacao; ?></textarea>
						</div>

						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$condicao1= "Qualquer problema verificado no funcionamento ou na estrutura do veículo, depois do prazo estabelecido na Cláusula ".$aclausula."ª, será de inteira responsabilidade no <b>COMPRADOR</b>.";
							$clausula++;

							$inicio="<p align='justify'>";
							$fim ="</p>";
							$condicao1_visualizacao = strip_tags($condicao1);
							?>
						<div class="form-group">
							<label for="condicao1"><b>CONDIÇÕES GERAIS</b></label>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_condicao1" name="s_condicao1" checked>
								<label class="custom-control-label" for="switch_condicao1">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="condicao1" rows="2" name="condicao1" readonly><?php echo $condicao1_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$inicio="<p>";
							$fim="</p><br/>";
							$condicao2= "O presente contrato passa a valer a partir da assinatura pelas partes, obrigando-se a ele os herdeiros ou secessores das mesmas.";
							$clausula++;
							$condicao2_visualizacao = strip_tags($condicao2);
							?>
						<div class="form-group">
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_condicao2" name="s_condicao2" checked>
								<label class="custom-control-label" for="switch_condicao2">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="condicao2" rows="1" name="condicao2" readonly><?php echo $condicao2_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$inicio="<p align='justify'>";
							$fim ="</p><br/>";
							$recisao1 = "O atraso no pagamento de qualquer parcela no prazo acordado acarretará na aplicação de multa de 10% (dez por cento) sobre a mesma e juros de ".$row['Juros'].".";
							$clausula++;
							$recisao1_visualizacao = strip_tags($recisao1);
							?>
						<div class="form-group">
							<label for="transferencia"><b>DA RECISÃO DO CONTRATO</b></label>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_recisao1" name="s_recisao1" checked>
								<label class="custom-control-label" for="switch_recisao1">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="recisao1" rows="2" name="recisao1" readonly><?php echo $recisao1_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$inicio ="<p>";
							$fim ="</p>";
							$recisao2 = "<b>parágrafo primeiro:</b> se houver atraso de pagamento de mais de uma parcela, o presente contrato estará automaticamente rescindo e o <b>COMPRADOR</b> deverá restituir o veículo ao <b>VENDEDOR</b>, sob pena de busca e apreensão.";
							$recisao2_visualizacao = strip_tags($recisao2);
							$recisao3 = "<b>parágrafo segundo:</b> em caso de rescisão de contrato por falta de pagamento das parcelas ou por desistência do <b>COMPRADOR</b>, além da restituição do veículo, fica resguardada ao <b>VENDEDOR</b> o direito de retenção 100% (cem por cento) da primeira parcela e de 50% (cinquenta por cento) das demais parcelas pagas, a título de indenização pela frustração do negócio e taxa de ocupação do veículo, sem prejuízo de valor para restauração de eventuais avarias causadas pelo <b>COMPRADOR</b>.";
							$recisao3_visualizacao = strip_tags($recisao3);
							?>
						<div class="form-group">
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_recisao2" name="s_recisao2" checked>
								<label class="custom-control-label" for="switch_recisao2">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="recisao2" rows="5" name="recisao2" readonly><?php echo $recisao2_visualizacao; echo "
".$recisao3_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$inicio="<p align='justify'>";
							$fim="</p><br/>";
							$foro= "Para dirimir quaisquer controvérsias oriundas do CONTRATO, as partes elegem o foro da comarca de ".$row['Foro'].".</p><p>Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor, juntamente com duas testemunhas.";
							$foro_visualizacao = strip_tags($foro);
							?>
						<div class="form-group">
							<label for="transferencia"><b>DO FORO</b></label>
							<textarea class="form-control rounded-0" id="foro" rows="2" name="foro" readonly><?php echo $foro_visualizacao; ?></textarea>
						</div>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<?php
							$inicio="<p align='justify'>";
							$fim="</p><br/><br/><br/>";
							$localass="".$row['LocalAss'].", ".strftime('%d de %B de %Y', strtotime($row['DataAss'])).".";
							?>
						<div class="form-group">
							<label for="transferencia"><b>DA ASSINATURA</b></label>
							<textarea class="form-control rounded-0" id="localass" rows="1" name="localass" readonly><?php echo $localass; ?></textarea>
						</div>



						<!-- $comp = " este é o Comprador do carro";
echo substr_replace($comp,"<b>Comprador</b>",strpos($comp,"Comprador"), 9);
PARA COLOCAR TAGS B-->
						<input type="hidden" value="<?php echo $id?>" name="id">
						<button type='submit' class='btn btn-outline-info btn-sm w-100' name='imprimir'>Imprimir</button>
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
