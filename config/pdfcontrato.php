<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

include_once("conexao.php");

if (isset($_GET['id'])){
	$id=$_GET['id'];
	echo "foi ne".$id;
}

$html = "<!DOCTYPE html><html><head><meta charset='utf-8'><style>font-family: sans-serif;</style></head><body><center>
		<p><b>CONTRATO DE COMPRA E VENDA DE VEÍCULO</b></p><br/>
		<p><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p></center><br/><br/>";

$sql = "SELECT pp.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
$result = mysqli_query($conexao, $sql);
while($row = mysqli_fetch_assoc($result)){
	$html .= "<p><b>VENDEDOR: ".$row['Nome']."</b>, ".$row['Nacionalidade'].", ".$row['EstadoCivil'].", ".$row['Profissao'].", inscrito no CPF sob n. ".$row['CPF'].", residente e domiciliado na ".$row['Endereco'].", n. ".$row['Numero']."</p>";
}









$html.="</body>
</html>";

//Criando a Instancia
$dompdf = new DOMPDF();
// Carrega seu HTML
$dompdf->load_html( $html);


$dompdf -> set_option ( 'defaultFont ' , 'arial' );
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
