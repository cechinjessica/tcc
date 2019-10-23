<?php
require 'conexao.php';
//include('pdfcontrato.php');
//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';
//Criando a Instancia

$dompdf = new Dompdf();
// some options...
//$dompdf->getOptions()->setLogOutputFile('dompdf.log');
$dompdf->set_option('isHtml5ParserEnabled', true);


if (isset($_POST['imprimir'])){

	$inicio = "<p align='justify'>";
	$fim ="</p><br/>";
	$clausula = 1;

	$titulovend = "<p align='justify'> <b>VENDEDOR:</b>";
	$vendedor = $_POST['vendedor'];
	$vendedor = $vendedor."".$fim;

	$titulocomp = "<p align='justify'> <b>COMPRADOR:</b>";
	$comprador = $_POST['comprador'];
	$comprador = $comprador."".$fim;

	$fixo = $_POST['fixo'];
	$fixo = $inicio."<b>".$fixo."</b>".$fim;

	$tituloobj = "<p align='center'><b>DO OBJETO DO CONTRATO</b></p>";
	$objeto = $_POST['objeto'];
	$objeto = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$objeto."".$fim;
	$clausula++;

	if(isset($_POST['objeto1'])){
		$objeto1 = $_POST['objeto1'];
		$objeto1 = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$objeto1."".$fim;
		$clausula++;
	}else{
		$objeto1 = "";
	}

	if(isset($_POST['s_responsabilidade1']) || isset($_POST['s_responsabilidade2'])){
		$tituloresp = "<p align='center'><b>DAS RESPONSABILIDADES</b></p>";

		if(isset($_POST['s_responsabilidade1'])){
			$s_responsabilidade1 = $_POST['s_responsabilidade1'];
			$responsabilidade1 = $_POST['responsabilidade1'];
			$responsabilidade1 = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$responsabilidade1."".$fim;
			$clausula++;
		}else {
			$s_responsabilidade1="";
			$responsabilidade1="";
		}

		if(isset($_POST['s_responsabilidade2'])){
			$s_responsabilidade2 = $_POST['s_responsabilidade2'];
			$responsabilidade2 = $_POST['responsabilidade2'];
			$responsabilidade2 = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$responsabilidade2."".$fim;
			$clausula++;
		}else{
			$s_responsabilidade2 = "";
			$responsabilidade2 = "";
		}
	}else{
		$tituloresp="";
		$responsabilidade1="";
		$responsabilidade2="";
	}

	if(isset($_POST['s_transferencia'])){
		$titulotrans = "<p align='center'><b>DA TRANSFERÊNCIA DA PROPRIEDADE DO VEÍCULO</b></p>";

		if(isset($_POST['s_transferencia'])){
			$s_transferencia = $_POST['s_transferencia'];
			$transferencia = $_POST['transferencia'];
			$transferencia = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$transferencia."".$fim;
			$clausula++;
		}else{
			$s_transferencia = "";
			$transferencia = "";
		}
	}else{
		$titulotrans = "";
		$transferencia = "";
	}

	$titulopre= "<p align='center'><b>DO PREÇO</b></p>";
	$preco = $_POST['preco'];
	$preco = $inicio."".$preco."".$fim;

	if(isset($_POST['s_condicao1']) || isset($_POST['s_condicao2'])){
		$titulocond = "<p align='center'><b>CONDIÇÕES GERAIS</b></p>";

		if(isset($_POST['s_condicao1'])){
			$s_condicao1 = $_POST['s_condicao1'];
			$condicao1 = $_POST['condicao1'];
			$condicao1 = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$condicao1."".$fim;
			$clausula++;
		}else{
			$s_condicao1= "";
			$condicao1= "";
		}

		if(isset($_POST['s_condicao2'])){
			$s_condicao2 = $_POST['s_condicao2'];
			$condicao2 = $_POST['condicao2'];
			$condicao2 = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$condicao2."".$fim;
			$clausula++;
		}else{
			$s_condicao2 = "";
			$condicao2 = "";
		}
	}else{
		$titulocond="";
		$condicao1="";
		$condicao2="";
	}

	if(isset($_POST['s_recisao1']) || isset($_POST['s_recisao2'])){
		$titulorec= "<p align='center'><b>DA RECISÃO DO CONTRATO</b></p>";

		if(isset($_POST['s_recisao1'])){
			$s_recisao1 = $_POST['s_recisao1'];
			$recisao1 = $_POST['recisao1'];
			$recisao1 = $inicio."<b>Cláusula ".$clausula."ª.</b>"."".$recisao1."".$fim;
			$clausula++;
		}else{
			$s_recisao1 = "";
			$recisao1 = "";
		}

		if(isset($_POST['s_recisao2'])){
			$s_recisao2 = $_POST['s_recisao2'];
			$recisao2 = $_POST['recisao2'];
			$recisao2 = $inicio."".$recisao2."".$fim;
		}else{
			$s_recisao2= "";
			$recisao2= "";
		}
	}else{
		$titulorec = "";
		$recisao1 = "";
		$recisao2 = "";
	}

	$tituloforo= "<p align='center'><b>DO FORO</b></p>";
	$foro = $_POST['foro'];
	$foro = $inicio."".$foro."".$fim;

	$localass = $_POST['localass'];
	$localass = $inicio."".$localass."".$fim;
	$id = $_POST['id'];

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
	<body style='margin:1cm 0.5cm 0.5cm 1cm;'>
	<div style='text-align: center;'>
	<div style='text-align: center;'>
		<p><b>CONTRATO DE COMPRA E VENDA DE VEÍCULO</b></p><br/>
		<p><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p>
		</div>
		<br/>";
	$assinaturas="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Vendedor)</p><br/>
	<p align='center'><b>".$nome."</b></p><br/><br/>";
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>(Nome e assinatura do Comprador)</p><br/>
	<p align='center'><b>".$nomec."</b></p><br/>";

	$assinaturas .="<p align='justify'>Testemunhas:</p><br/>";
	$nome1 = mb_strtoupper($row['NomeTestemunha1'], 'UTF-8');
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>".$nome1."</p>
	<p align='center'>RG ".$row['RGTestemunha1']."</p><br/><br/>";
	$nome2 = mb_strtoupper($row['NomeTestemunha2'], 'UTF-8');
	$assinaturas .="<p align='center'>__________________________________________</p><p align='center'>".$nome2."</p>
	<p align='center'>RG ".$row['RGTestemunha2']."</p><br/>";
	$final="</body></html>";

	//header_remove();
	$variavel =$inicial ."". $titulovend ."". $vendedor ."". $titulocomp ."". $comprador ."". $fixo ."". $tituloobj ."". $objeto ."". $objeto1 ."". $tituloresp ."". $responsabilidade1 ."". $responsabilidade2 ."". $titulotrans ."". $transferencia ."". $titulopre ."". $preco ."". $titulocond ."". $condicao1 ."". $condicao2 ."". $titulorec ."". $recisao1 ."". $recisao2 ."". $tituloforo ."". $foro ."".$localass ."". $assinaturas ."".$final;

	$variavel = str_replace("VENDEDOR","<b>VENDEDOR</b>",$variavel);
	$variavel = str_replace("COMPRADOR","<b>COMPRADOR</b>",$variavel);
	$variavel = str_replace("parágrafo primeiro:","<b>parágrafo primeiro:</b>",$variavel);
	$variavel = str_replace("parágrafo segundo:","<b>parágrafo segundo:</b>", $variavel);
	for ($i = 1; $i <15; $i++){
		$variavel = str_replace("Cláusula ".$i."ª.","<b>Cláusula ".$i."ª.</b>",$variavel);
	}

	//echo $variavel;
	$dompdf->loadHtml($variavel);
	$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	/*$dompdf->stream( "contrato_P".$placa."_ID".$id.".pdf",array(
		"Attachment" =>false //Para realizar o download somente alterar para true
	));*/

	$pdf = $dompdf->output();
	file_put_contents("../arquivos/contrato_P".$placa."_ID".$id.".pdf", $pdf);

	$fp = fopen("../arquivos/contrato_P".$placa."_ID".$id.".pdf", "rb");
	$conteudo = fread($fp,filesize("../arquivos/contrato_P".$placa."_ID".$id.".pdf"));
	$conteudo = addslashes($conteudo);

	$sql = "update contrato set Nome = 'contrato_P".$placa."_ID".$id."', Tamanho = '".filesize("../arquivos/contrato_P".$placa."_ID".$id.".pdf")."', Tipo = 'application/pdf', Arquivo = '$conteudo' where IdContrato = '".$id."';";
	//echo $sql;
	$res = mysqli_query($conexao,$sql) or die("Algo deu errado ao inserir o contrato no banco");
	if(mysqli_affected_rows($conexao) > 0){
		//print "O contrato foi salvo na base de dados.";
	}else{
		//print "Não foi possível salvar contrato na base de dados.";
	}
	//Exibibir a página
	$dompdf->stream( "contrato_P".$placa."_ID".$id.".pdf",array(
		"Attachment" =>false //Para realizar o download somente alterar para true
	));

}else{
	header('Location:../cadastros/cadastro_contrato.php');
}
?>
