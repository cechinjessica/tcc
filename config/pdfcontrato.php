<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

include_once("conexao.php");

if (isset($_GET['id'])){
	$id=$_GET['id'];
	echo "foi ne".$id;
}

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

		$html .=" ".$nomeempresa."</b>, empresa ".$tipoempresa.", inscrita no CNPJ n. ".$row['CNPJ'].", localizada na ".$row['EnderecoEmpresa'].", n. ".$row['NumeroEmpresa'].", na cidade de ".$row['CidadeEmpresa']."-".$row['UFEmpresa'].", representada neste ato por ".$sua." ".$cargo." <b>".$nome."</b>, ".$nacionalidade.", ".$ecivil.$final.", ".$profissao.", inscrit".$final." no CPF sob n. ".$row['CPF'].", residente e domiciliad".$final." na ".$row['Endereco'].", n. ".$row['Numero'].", na cidade de ".$row['Cidade']."-".$row['UF'].", CEP: ".$row['CEP'].";</p><br/>";
	}
}

$sql = "SELECT v.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$estado = ucfirst($row['Estado']);
$html .= "<p align='justify'><b>As partes acima identificadas têm, entre si, justo e acertado o presente Contrato e Venda de Veículo ".$estado.", que se regerá pelas cláusulas seguintes e pelas condições descritas no presente.</b></p><br/>";









$html.="</body>
</html>";

//Criando a Instancia
$dompdf = new DOMPDF();
// Carrega seu HTML
$dompdf->load_html( $html);
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
