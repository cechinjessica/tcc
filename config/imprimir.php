<?php
//include('pdfcontrato.php');
//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';
//Criando a Instancia
$dompdf = new DOMPDF();

if (isset($_POST['imprmir'])){

	$inicial = "<!DOCTYPE html><html><head><meta charset='utf-8'><style>font-family: sans-serif;</style></head><body style=' margin-top: 2cm; margin-right: 1cm; margin-bottom: 1cm; margin-left: 2cm; font: Arial;'><center>
		<p><b>CONTRATO DE COMPRA E VENDA DE VEÍCULO</b></p><br/>
		<p><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p></center><br/><br/>";

	$titulovend = "<p align='justify'><b>VENDEDOR:";

	$titulocomp = "<p align='justify'><b>COMPRADOR:";

	$tituloobj = "<p align='center'><b>DO OBJETO DO CONTRATO</b></p>";

	$tituloresp = "<p align='center'><b>DAS RESPONSABILIDADES</b></p>";

	$titulotrans = "<p align='center'><b>DA TRANSFERÊNCIA DA PROPRIEDADE DO VEÍCULO</b></p>";

	$titulopre= "<p align='center'><b>DO PREÇO</b></p>";

	$titulocond = "<p align='center'><b>CONDIÇÕES GERAIS</b></p>";

	$titulorec= "<p align='center'><b>DA RECISÃO DO CONTRATO</b></p>";

	$tituloforo= "<p align='center'><b>DO FORO</b></p>";

	$assinaturas="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Vendedor)</p><br/><p align='center'><b>".$nome."</b></p><br/><br/>";
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Comprador)</p><br/><p align='center'><b>".$nomec."</b></p><br/>";

	$assinaturas .="<p align='justify'>Testemunhas:</p><br/>";
	$nome1 = mb_strtoupper($row['NomeTestemunha1'], 'UTF-8');
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>".$nome1."</p><p align='center'>RG ".$row['RGTestemunha1']."</p><br/><br/>";
	$nome2 = mb_strtoupper($row['NomeTestemunha2'], 'UTF-8');
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>".$nome2."</p><p align='center'>RG ".$row['RGTestemunha2']."</p><br/>";
	$final="</body></html>";

	// Carrega seu HTML
	$dompdf->load_html( $inicial ."". $titulovend ."". $vendedor ."". $titulocomp ."". $comprador ."". $fixo ."". $tituloobj ."". $objeto ."". $objeto1 ."". $tituloresp ."". $responsabilidade1 ."". $responsabilidade2 ."". $titulotrans ."". $transferencia ."". $titulopre ."". $preco ."". $titulocond ."". $condicao1 ."". $condicao2 ."". $titulorec ."". $recisao1 ."". $recisao2 ."". $recisao3 ."". $tituloforo ."". $foro ."". $localass ."". $assinaturas ."". $final);
	$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"contrato_P".$placa."_ID".$id.".pdf",
		array(
			"Attachment" =>false //Para realizar o download somente alterar para true
		)
	);
}
?>
