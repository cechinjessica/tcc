<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

include_once("conexao.php");

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

if (isset($_GET['id'])){
	$id=$_GET['id'];
}

$clausula = 1;

$html = "<!DOCTYPE html><html><head><meta charset='utf-8'><style>font-family: sans-serif;</style></head><body style=' margin-top: 2cm; margin-right: 1cm; margin-bottom: 1cm; margin-left: 2cm; font: Arial;'><center>
		<p><b>CONTRATO DE COMPRA E VENDA DE VEÍCULO</b></p><br/>
		<p><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p></center><br/><br/>";
//PARA VENDEDOR///////////////////////////////////////////////////////////////////////////////
$html .= "<p align='justify'><b>VENDEDOR:";

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


		$html .= " ".$nome."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";

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

		$html.=" ".$nomeempresa."</b>, empresa ".$tipoempresa.", inscrita no CNPJ n. ".$row['CNPJ'].", localizada na ".$row['EnderecoEmpresa'].", n. ".$row['NumeroEmpresa'].", na cidade de ".$row['CidadeEmpresa']."-".$row['UFEmpresa'].", representada neste ato por ".$sua." ".$cargo." <b>".$nome."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";
	}
}

//PARA COMPRADOR///////////////////////////////////////////////////////////////////////////////
$html .= "<p align='justify'><b>COMPRADOR:";

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


		$html .= " ".$nomec."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";

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

		$html .=" ".$nomeempresa."</b>, empresa ".$tipoempresa.", inscrita no CNPJ n. ".$row['CNPJ'].", localizada na ".$row['EnderecoEmpresa'].", n. ".$row['NumeroEmpresa'].", na cidade de ".$row['CidadeEmpresa']."-".$row['UFEmpresa'].", representada neste ato por ".$sua." ".$cargo." <b>".$nomec."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";
	}
}

$sql = "SELECT v.*, c.ValorTotal as ValorTotal FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$estado = ucfirst($row['Estado']);
$html .= "<p align='justify'><b>As partes acima identificadas têm, entre si, justo e acertado o presente Contrato e Venda de Veículo ".$estado.", que se regerá pelas cláusulas seguintes e pelas condições descritas no presente.</b></p><br/>";

$html .= "<p align='center'><b>DO OBJETO DO CONTRATO</b></p>";

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

$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O presente contrato tem como OBJETO, um ".$nomevei.", ANO MODELO ".$row['Ano']."/".$row['Modelo'].", PLACA ".$row['Placa'].", RENAVAM N. ".$row['Renavam'].", CHASSI ".$row['Chassi'].", COMBUSTÍVEL ".$combustivel.", COR ".$cor.", livre de qualquer ônus ou encargo.</p>";

$clausula++;

if($row['Estado'] == "usado"){
	$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O veículo, objeto deste contrato é usado, apresentando desgaste natural decorrente do tempo, já visto e inspecionado pelo <b>COMPRADOR</b>, o qual tomou ciência de suas condições e estado de conservação.</p><br/>";
	$clausula++;
}

$html .= "<p align='center'><b>DAS RESPONSABILIDADES</b></p>";

$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>VENDEDOR</b> se responsabilizará pelo bom estado e perfeito funcionamento do veículo até a data de assinatura do presente contrato.</p>";
$aclausula = $clausula;
$clausula++;

$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>VENDEDOR</b> se responsabilizará pela entrega do veículo no local indicado pelo <b>COMPRADOR</b>, nas mesmas condições de quando foi inspecionado pelo <b>COMPRADOR</b>.</p><br/>";
$clausula++;

$html .= "<p align='center'><b>DA TRANSFERÊNCIA DA PROPRIEDADE DO VEÍCULO</b></p>";

$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b>A transferência da propriedade do veículo será feita até o prazo máximo de 30 (trinta) dias a contar da data de assinatura deste contrato.</p><br/>";
$clausula++;

$html .= "<p align='center'><b>DO PREÇO</b></p>";

$sql = "SELECT c.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);


$entrada = $row['Entrada'];
$total = $row['ValorTotal'];

if($entrada == $total){

	$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$row['ValorTotal'].",à vista, que deverá ser quiatda até o dia ".$row['DataPagamento'].".</p><br/>";
	$clausula++;
}else if($row['Entrada'] != 0 ){

	$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$row['ValorTotal'].", por meio de uma entrada de R$ ".$row['Entrada']." e mais ".$row['NumeroParcelas']." parcelas de R$ ".$row['ValorParcela'].", que serão pagas mensalmente, todos os dias ".$row['DataPagamento']." dos meses subsequentes.";
	$clausula++;
}else{

	$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b> pela compra do veículo, objeto deste contrato, a quantia de R$ ".$row['ValorTotal'].", dividida em ".$row['NumeroParcelas']." parcelas mensais de ".$row['ValorParcela'].", a serem pagas até o dia ".$row['DataPagamento']." dos meses subsequentes.</p><br/>";
	$clausula++;

}

$html .= "<p align='center'><b>CONDIÇÕES GERAIS</b></p>";

$html .= "<p><b>Cláusula ".$clausula."ª.</b> Qualquer problema verificado no funcionamento ou na estrutura do veículo, depois do prazo estabelecido na Cláusula ".$aclausula."ª, será de inteira responsabilidade no <b>COMPRADOR</b>.</p>";
$clausula++;

$html .= "<p><b>Cláusula ".$clausula."ª.</b> O presente contrato passa a valer a partir da assinatura pelas partes, obrigando-se a ele os herdeiros ou secessores das mesmas.</p><br/>";
$clausula++;

$html .= "<p align='center'><b>DA RECISÃO DO CONTRATO</b></p>";

$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> O atraso no pagamento de qualquer parcela no prazo acordado acarretará na aplicação de multa de 10% (dez por cento) sobre a mesma e juros de ".$row['Juros'].".</p><br/>";
$clausula++;

$html .= "<p><b>parágrafo primeiro:</b> se houver atraso de pagamento de mais de uma parcela, o presente contrato estará automaticamente rescindo e o <b>COMPRADOR</b> deverá restituir o veículo ao <b>VENDEDOR</b>, sob pena de busca e apreensão.</p>";

$html .= "<p><b>parágrafo segundo:</b> em caso de rescisão de contrato por falta de pagamento das parcelas ou por desistência do <b>COMPRADOR</b>, além da restituição do veículo, fica resguardada ao <b>VENDEDOR</b> o direito de retenção 100% (cem por cento) da primeira parcela e de 50% (cinquenta por cento) das demais parcelas pagas, a título de indenização pela frustração do negócio e taxa de ocupação do veículo, sem prejuízo de valor para restauração de eventuais avarias causadas pelo <b>COMPRADOR</b>.</p><br/>";

$html .= "<p align='center'><b>DO FORO</b></p>";

$html .= "<p align='justify'><b>Cláusula ".$clausula."ª.</b> Para dirimir quaisquer controvérsias oriundas do CONTRATO, as partes elegem o foro da comarca de ".$row['Foro'].".</p><p>Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor, juntamente com duas testemunhas.</p><br/>";

$html .="<palign='justify'>".$row['LocalAss'].", ".strftime('%d de %B de %Y', strtotime($row['DataAss'])).".</p><br/><br/><br/>";


$html .="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Vendedor)</p><br/><p align='center'><b>".$nome."</b></p><br/><br/>";
$html .="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Comprador)</p><br/><p align='center'><b>".$nomec."</b></p><br/>";

$html .="<p align='justify'>Testemunhas:</p><br/>";
$nome1 = mb_strtoupper($row['NomeTestemunha1'], 'UTF-8');
$html .="<p align='center'>__________________________________________</p><p align='center'>".$nome1."</p><p align='center'>RG ".$row['RGTestemunha1']."</p><br/><br/>";
$nome2 = mb_strtoupper($row['NomeTestemunha2'], 'UTF-8');
$html .="<p align='center'>__________________________________________</p><p align='center'>".$nome2."</p><p align='center'>RG ".$row['RGTestemunha2']."</p><br/>";

















	$html.="</body>
</html>";

//Criando a Instancia
$dompdf = new DOMPDF();
// Carrega seu HTML
$dompdf->load_html($html);
$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
	"contrato.pdf",
	array(
		"Attachment" => false //Para realizar o download somente alterar para true
	)
);
?>
