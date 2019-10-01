<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
session_start();
require 'conexao.php';
include('../config/verifica_login.php');

if (isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	header('Location: cadastro_contrato.php');
}

if (isset($_post['imprmir'])){

	$inicio = "<!DOCTYPE html><html><head><meta charset='utf-8'><style>font-family: sans-serif;</style></head><body style=' margin-top: 2cm; margin-right: 1cm; margin-bottom: 1cm; margin-left: 2cm; font: Arial;'><center>
		<p><b>CONTRATO DE COMPRA E VENDA DE VEÍCULO</b></p><br/>
		<p><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p></center><br/><br/>";
	//PARA VENDEDOR///////////////////////////////////////////////////////////////////////////////
	$titulovend = "<p align='justify'><b>VENDEDOR:";

	//PARA COMPRADOR///////////////////////////////////////////////////////////////////////////////
	$titulocomp = "<p align='justify'><b>COMPRADOR:";

	$tituloobj = "<p align='center'><b>DO OBJETO DO CONTRATO</b></p>";

	$tituloresp = "<p align='center'><b>DAS RESPONSABILIDADES</b></p>";


	$responsabilidade2 = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>VENDEDOR</b> se responsabilizará pela entrega do veículo no local indicado pelo <b>COMPRADOR</b>, nas mesmas condições de quando foi inspecionado pelo <b>COMPRADOR</b>.</p><br/>";
	$clausula++;

	$titulotrans = "<p align='center'><b>DA TRANSFERÊNCIA DA PROPRIEDADE DO VEÍCULO</b></p>";

	$transferencia= "<p align='justify'><b>Cláusula ".$clausula."ª.</b>A transferência da propriedade do veículo será feita até o prazo máximo de 30 (trinta) dias a contar da data de assinatura deste contrato.</p><br/>";
	$clausula++;

	$titulopre= "<p align='center'><b>DO PREÇO</b></p>";

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

	if($entrada == $total){

		$preco = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$total_format.",à vista, que deverá ser quiatda até o dia ".$row['DataPagamento'].".</p><br/>";
		$clausula++;
	}else if($row['Entrada'] != 0 ){

		$preco = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$total_format.", por meio de uma entrada de R$ ".$entrada_format." e mais ".$row['NumeroParcelas']." parcelas de R$ ".$parcela_format.", que serão pagas mensalmente, todos os dias ".$row['DataPagamento']." dos meses subsequentes.";
		$clausula++;
	}else{

		$preco = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$total_format.", dividida em ".$row['NumeroParcelas']." parcelas mensais de ".$parcela_format.", a serem pagas até o dia ".$row['DataPagamento']." dos meses subsequentes.</p><br/>";
		$clausula++;

	}

	$titulocond = "<p align='center'><b>CONDIÇÕES GERAIS</b></p>";

	$condicao1= "<p><b>Cláusula ".$clausula."ª.</b> Qualquer problema verificado no funcionamento ou na estrutura do veículo, depois do prazo estabelecido na Cláusula ".$aclausula."ª, será de inteira responsabilidade no <b>COMPRADOR</b>.</p>";
	$clausula++;

	$condicao2= "<p><b>Cláusula ".$clausula."ª.</b> O presente contrato passa a valer a partir da assinatura pelas partes, obrigando-se a ele os herdeiros ou secessores das mesmas.</p><br/>";
	$clausula++;

	$titulorec= "<p align='center'><b>DA RECISÃO DO CONTRATO</b></p>";

	$recisao1 = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O atraso no pagamento de qualquer parcela no prazo acordado acarretará na aplicação de multa de 10% (dez por cento) sobre a mesma e juros de ".$row['Juros'].".</p><br/>";
	$clausula++;

	$recisao2 = "<p><b>parágrafo primeiro:</b> se houver atraso de pagamento de mais de uma parcela, o presente contrato estará automaticamente rescindo e o <b>COMPRADOR</b> deverá restituir o veículo ao <b>VENDEDOR</b>, sob pena de busca e apreensão.</p>";

	$recisao3 = "<p><b>parágrafo segundo:</b> em caso de rescisão de contrato por falta de pagamento das parcelas ou por desistência do <b>COMPRADOR</b>, além da restituição do veículo, fica resguardada ao <b>VENDEDOR</b> o direito de retenção 100% (cem por cento) da primeira parcela e de 50% (cinquenta por cento) das demais parcelas pagas, a título de indenização pela frustração do negócio e taxa de ocupação do veículo, sem prejuízo de valor para restauração de eventuais avarias causadas pelo <b>COMPRADOR</b>.</p><br/>";

	$tituloforo= "<p align='center'><b>DO FORO</b></p>";

	$foro= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> Para dirimir quaisquer controvérsias oriundas do CONTRATO, as partes elegem o foro da comarca de ".$row['Foro'].".</p><p>Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor, juntamente com duas testemunhas.</p><br/>";

	$localass="<palign='justify'>".$row['LocalAss'].", ".strftime('%d de %B de %Y', strtotime($row['DataAss'])).".</p><br/><br/><br/>";


	$assinaturas="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Vendedor)</p><br/><p align='center'><b>".$nome."</b></p><br/><br/>";
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Comprador)</p><br/><p align='center'><b>".$nomec."</b></p><br/>";

	$assinaturas .="<p align='justify'>Testemunhas:</p><br/>";
	$nome1 = mb_strtoupper($row['NomeTestemunha1'], 'UTF-8');
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>".$nome1."</p><p align='center'>RG ".$row['RGTestemunha1']."</p><br/><br/>";
	$nome2 = mb_strtoupper($row['NomeTestemunha2'], 'UTF-8');
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>".$nome2."</p><p align='center'>RG ".$row['RGTestemunha2']."</p><br/>";
	$fim="</body></html>";

	//Criando a Instancia
	$dompdf = new DOMPDF();
	// Carrega seu HTML
	$dompdf->load_html($inicio."".$titulovend."".$vendedor."".$titulocomp."".$comprador."".$fixo."".$tituloobj."".$objeto."".$objeto1."".$tituloresp."".$responsabilidade1."".$responsabilidade2."".$titulotrans."".$transferencia."".$titulopre."".$preco."".$titulocond."".$condicao1."".$condicao2."".$titulorec."".$recisao1."".$recisao2."".$recisao3."".$tituloforo."".$foro."".$localass."".$assinaturas."".$fim);
	$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"contrato_P".$placa."_ID".$id.".pdf",
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
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
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="switch1">
							<label class="custom-control-label" for="switch1">Cláusula</label>
						</div>
						<div class="form-group">
							<textarea class="form-control rounded-0" id="textarea1" rows="3">Teste</textarea>
						</div>

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


									$vendedor= " ".$nome."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";

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

									$vendedor=" ".$nomeempresa."</b>, empresa ".$tipoempresa.", inscrita no CNPJ n. ".$row['CNPJ'].", localizada na ".$row['EnderecoEmpresa'].", n. ".$row['NumeroEmpresa'].", na cidade de ".$row['CidadeEmpresa']."-".$row['UFEmpresa'].", representada neste ato por ".$sua." ".$cargo." <b>".$nome."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";
								}

								$vendedor_vizualizacao = strip_tags($vendedor);
							}
							?>
						<div class="form-group">
							<label for="vendedor"><b>VENDEDOR</b></label>
							<textarea class="form-control rounded-0" id="vendedor" rows="3" readonly><?php echo $vendedor_vizualizacao ?></textarea>
						</div>
						<!--//////////////////////////////////////////////////////////////////////////////////////////-->
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
									$comprador_vizualizacao = strip_tags($comprador);

							?>

						<div class="form-group">
							<label for="comprador"><b>COMPRADOR</b></label>
							<textarea class="form-control rounded-0" id="comprador" rows="3" readonly><?php echo $comprador_vizualizacao ?></textarea>
						</div>
						<br />

						<?php
	$sql = "SELECT v.*, c.ValorTotal as ValorTotal FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
									$result = mysqli_query($conexao, $sql);
									$row = mysqli_fetch_assoc($result);

									$estado = ucfirst($row['Estado']);
									$fixo = "<p align='justify'><b>As partes acima identificadas têm, entre si, justo e acertado o presente Contrato e Venda de Veículo ".$estado.", que se regerá pelas cláusulas seguintes e pelas condições descritas no presente.</b></p><br/>";

									$fixo_vizualizacao = strip_tags($fixo);

							?>
						<div class="form-group">
							<textarea class="form-control rounded-0" id="fixo" rows="3" readonly><?php echo $fixo_vizualizacao ?></textarea>
						</div>

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

									$objeto= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O presente contrato tem como OBJETO, um ".$nomevei.", ANO MODELO ".$row['Ano']."/".$row['Modelo'].", PLACA ".$placa.", RENAVAM N. ".$row['Renavam'].", CHASSI ".$row['Chassi'].", COMBUSTÍVEL ".$combustivel.", COR ".$cor.", livre de qualquer ônus ou encargo.</p>";
									$clausula++;
									$objeto_vizualizacao = strip_tags($objeto);

							?>
						<div class="form-group">
							<label for="comprador"><b>DO OBJETO</b></label>
							<textarea class="form-control rounded-0" id="objeto" rows="3" readonly><?php echo $objeto_vizualizacao ?></textarea>
						</div>

						<?php
	$objeto1="";
									if($row['Estado'] == "usado"){
										$objeto1 = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O veículo, objeto deste contrato é usado, apresentando desgaste natural decorrente do tempo, já visto e inspecionado pelo <b>COMPRADOR</b>, o qual tomou ciência de suas condições e estado de conservação.</p><br />";
										$clausula++;
										$objeto1_vizualizacao = strip_tags($objeto1);
										echo "<div class='form-group'>
								<textarea class='form-control rounded-0' id='objeto1' rows='3' readonly>".$objeto1_vizualizacao."</textarea>
				</div>";
									}
							?>

						<?php

							$responsabilidade1 = "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>VENDEDOR</b> se responsabilizará pelo bom estado e perfeito funcionamento do veículo até a data de assinatura do presente contrato.</p>";
							$aclausula = $clausula;
							$clausula++;
							?>
						<div class="form-group">

							<label for="comprador"><b>DAS RESPONSABILIDADES</b></label>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="switch_responsabilidade1">
								<label class="custom-control-label" for="switch_responsabilidade1">Utilizar</label>
							</div>
							<textarea class="form-control rounded-0" id="responsabilidade1" rows="3" readonly><?php echo $responsabilidade1 ?></textarea>
						</div>




						<!-- $comp = " este é o Comprador do carro";
echo substr_replace($comp,"<b>Comprador</b>",strpos($comp,"Comprador"), 9);
PARA COLOCAR TAGS B-->
						<a href="pdfcontrato.php?id=<?php echo $id?>"><button type='submit' class='btn btn-outline-info btn-sm w-100' name='imprimir'>Imprimir</button></a>
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
