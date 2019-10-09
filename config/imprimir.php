<?php
require 'conexao.php';
//include('pdfcontrato.php');
//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';
//Criando a Instancia
$dompdf = new Dompdf();
// some options...
$dompdf->getOptions()->setLogOutputFile('dompdf.log');


if (isset($_POST['imprimir'])){
	$vendedor = $_POST['vendedor'];
	$comprador = $_POST['comprador'];
	$fixo = $_POST['fixo'];
	$objeto = $_POST['objeto'];
	$objeto1 = $_POST['objeto1'];
	$responsabilidade1 = $_POST['responsabilidade1'];
	$responsabilidade2 = $_POST['responsabilidade2'];
	$transferencia = $_POST['transferencia'];
	$preco = $_POST['preco'];
	$condicao1 = $_POST['condicao1'];
	$condicao2 = $_POST['condicao2'];
	$recisao1 = $_POST['recisao1'];
	$recisao2 = $_POST['recisao2'];
	$recisao3 = $_POST['recisao3'];
	$foro = $_POST['foro'];
	$localass = $_POST['localass'];
	$id = $_POST['id'];

	$inicio = "<p align='justify'>";
	$fim ="</p><br/>";

	$vendedor = $inicio."".$vendedor."".$fim;
	$comprador = $inicio."".$comprador."".$fim;
	$fixo = $inicio."<b>".$fixo."</b>".$fim;
	$objeto = $inicio."".$objeto."".$fim;
	$objeto1 = $inicio."".$objeto1."".$fim;
	$responsabilidade1 = $inicio."".$responsabilidade1."".$fim;
	$responsabilidade2 = $inicio."".$responsabilidade2."".$fim;
	$transferencia = $inicio."".$transferencia."".$fim;
	$preco = $inicio."".$preco."".$fim;
	$condicao1 = $inicio."".$condicao1."".$fim;
	$condicao2 = $inicio."".$condicao2."".$fim;
	$recisao1 = $inicio."".$recisao1."".$fim;
	$recisao2 = $inicio."".$recisao2."".$fim;
	$recisao3 = $inicio."".$recisao3."".$fim;
	$foro = $inicio."".$foro."".$fim;
	$localass = $inicio."".$localass."".$fim;

	$sql = "SELECT pp.Nome as NomeVend, p.Nome as NomeComp, c.*, v.Placa as Placa FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo where c.idcontrato = $id";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);
	$nome = mb_strtoupper($row['NomeVend'], 'UTF-8');
	$nomec = mb_strtoupper($row['NomeComp'], 'UTF-8');
	$placa = mb_strtoupper($row['Placa'], 'UTF-8');

	$inicial = "<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
	<div style='text-align: center; margin:2cm 1cm 1cm 2cm;'>
		<p><b>CONTRATO DE COMPRA E VENDA DE VEÍCULO</b></p><br/>
		<p><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p>
		</div>
		<br/>
		<br/>";

	$titulovend = "<p align='justify'> <b>VENDEDOR:</b></p>";

	$titulocomp = "<p align='justify'> <b>COMPRADOR:</b></p>";

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
	//$dompdf->loadHtml( $inicial ."". $titulovend ."". $vendedor ."". $titulocomp ."". $comprador ."". $fixo ."". $tituloobj ."". $objeto ."". $objeto1 ."". $tituloresp ."". $responsabilidade1 ."". $responsabilidade2 ."". $titulotrans ."". $transferencia ."". $titulopre ."". $preco ."". $titulocond ."". $condicao1 ."". $condicao2 ."". $titulorec ."". $recisao1 ."". $recisao2 ."". $recisao3 ."". $tituloforo ."". $foro ."". $localass ."". $assinaturas ."". $final, "utf-8");
	//$variavel = $inicial ."". $titulovend ."". $vendedor ." ". $titulocomp ."". $comprador ."". $fixo ."". $tituloobj ."". $objeto ."". $objeto1 ."". $tituloresp ."". $responsabilidade1 ."". $responsabilidade2 ."". $titulotrans ."". $transferencia ."". $titulopre ."". $preco ."". $titulocond ."". $condicao1 ."". $condicao2 ."". $titulorec ."". $recisao1 ."". $recisao2 ."". $recisao3 ."". $tituloforo ."". $foro ."". $localass ."". $assinaturas ."". $final;
	$variavel= $inicial ."". $titulovend ."". $vendedor ."". $titulocomp ."". $comprador ."". $fixo ."". $tituloobj ."". $objeto ."". $objeto1 ."". $tituloresp ."". $responsabilidade1 ."". $responsabilidade2 ."". $titulotrans ."". $transferencia ."". $titulopre ."". $preco ."". $titulocond ."". $condicao1 ."". $condicao2 ."". $titulorec ."". $recisao1 ."". $recisao2 ."". $recisao3 ."". $tituloforo ."". $foro ."". $localass ."". $assinaturas ."". $final;

	/*$variavel_c = $variavel;
	$variavel_c = substr_replace($variavel_c,"<b>VENDEDOR</b>",strpos($variavel,"VENDEDOR"), 8);
	$variavel_c = substr_replace($variavel_c,"<b>COMPRADOR</b>",strpos($variavel,"COMPRADOR"), 9);
	$variavel_c = substr_replace($variavel_c,"<b>parágrafo primeiro:</b>",strpos($variavel,"parágrafo primeiro:"), 19);
	$variavel_c = substr_replace($variavel_c,"<b>parágrafo segundo:</b>", strpos($variavel,"parágrafo segundo:"), 18);
	for ($i = 1; $i <15; $i++){
		$variavel_c = substr_replace($variavel,"<b>Cláusula ".$i."ª.</b>",strpos($variavel,"Cláusula ".$i."ª."), 12);
	}*/

	//echo $variavel_c;
	//header_remove();
	$dompdf->loadHtml($inicial ."". $titulovend ."". $vendedor ."". $titulocomp ."". $comprador ."". $fixo ."". $tituloobj ."". $objeto ."". $objeto1 ."". $tituloresp ."". $responsabilidade1 ."". $responsabilidade2 ."". $titulotrans ."". $transferencia ."". $titulopre ."". $preco ."". $titulocond ."". $condicao1 ."". $condicao2 ."". $titulorec ."". $recisao1 ."". $recisao2 ."". $recisao3 ."". $tituloforo ."". $foro ."".$localass ."". $assinaturas ."".$final);
	$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream( "contrato_P".$placa."_ID".$id.".pdf",array(
		"Attachment" =>false //Para realizar o download somente alterar para true
	));
}else{
	header('Location:../cadastros/cadastro_contrato.php');
}
?>
