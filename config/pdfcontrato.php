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

$html .= "<p align='justify'><b>Cláusula 1ª.</b> O presente contrato tem como OBJETO, um ".$nomevei.", ANO MODELO ".$row['Ano']."/".$row['Modelo'].", PLACA ".$row['Placa'].", RENAVAM N. ".$row['Renavam'].", CHASSI ".$row['Chassi'].", COMBUSTÍVEL ".$combustivel.", COR ".$cor.", livre de qualquer ônus ou encargo.</p>";

if($row['Estado'] == "usado"){
	$html .= "<p align='justify'><b>Cláusula 2ª.</b> O veículo, objeto deste contrato é usado, apresentando desgaste natural decorrente do tempo, já visto e inspecionado pelo <b>COMPRADOR</b>, o qual tomou ciência de suas condições e estado de conservação.</p><br/>";
}

$html .= "<p align='center'><b>DAS RESPONSABILIDADES</b></p>";
$html .= "<p align='justify'><b>Cláusula 3ª.</b> O <b>VENDEDOR</b> se responsabilizará pelo bom estado e perfeito funcionamento do veículo até a data de assinatura do presente contrato.</p>";
$html .= "<p align='justify'><b>Cláusula 4ª.</b> O <b>VENDEDOR</b> se responsabilizará pela entrega do veículo no local indicado pelo <b>COMPRADOR</b>, nas mesmas condições de quando foi inspecionado pelo <b>COMPRADOR</b>.</p><br/>";

$html .= "<p align='center'><b>DA TRANSFERÊNCIA DA PROPRIEDADE DO VEÍCULO</b></p>";
$html .= "<p align='justify'><b>Cláusula 5ª.</b>A transferência da propriedade do veículo será feita até o prazo máximo de 30 (trinta) dias a contar da data de assinatura deste contrato.</p><br/>";

$html .= "<p align='center'><b>DO PREÇO</b></p>";
$html .= "<p align='justify'><b>Cláusula 6ª.</b> O <b>COMPRADOR</b> pagará ao <b>VENDEDOR</b>, pela compra do veículo, objeto deste contrato, a quantia de R$ ".$row['ValorTotal']." conforme dados demonstrados abaixo:</p><br/>";












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
