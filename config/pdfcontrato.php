<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

include_once("conexao.php");
$html = "";

if (isset($_GET['id'])){
	$id=$_GET['id'];
	$html="<h1>Contrato ".$id."</h1></br>";
}

$sql = "SELECT p.* FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
$result = mysqli_query($conexao, $sql);
while($row = mysqli_fetch_array($result)){
	$html .= $row[0];
	$html .= $row[1];
	$html .= $row[2];
	$html .= $row[3] ;
	$html .= $row[4] ;
	$html .= $row[5] ;
	$html .= $row[6] ;
	$html .= $row[7] ;
	$html .= $row[8];
}




//Criando a Instancia
$dompdf = new DOMPDF();
// Carrega seu HTML
$dompdf->load_html( $html);


$dompdf -> set_option ( 'defaultFont ' , 'sanserif' );
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
