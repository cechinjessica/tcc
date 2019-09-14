<?php

//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';

	include_once("conexao.php");
	$html = "<div class='table-responsive'>
	<table class='table table-sm table-bordered'>";
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th >Nome Comprador</th>';
	$html .= '<th >Nome Vendedor</th>';
	$html .= '<th >Veículo</th>';
	$html .= '<th >Placa</th>';
	$html .= '<th >Valor</th>';
	$html .= '<th >Quant. Parc.</th>';
	$html .= '<th >Valor Parc.</th>';
	$html .= '<th >Nome 1ª Testemunha </th>';
	$html .= '<th >Nome 2ª Testemunha </th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$sql = "SELECT p.nome as NomeComp, pp.nome as NomeVend, v.nome as NomeVei, v.placa, v.valor, c.numeroparcelas, c.valorparcela, c.nometestemunha1, c.nometestemunha2 FROM contrato c
	inner join pessoa p on c.Pessoa_IdComprador = p.idpessoa
	inner join pessoa pp on c.Pessoa_IdVendedor = pp.idpessoa
	inner join veiculo v on c.Veiculo_IdVeiculo = v.idveiculo";
	$result = mysqli_query($conexao, $sql);
	while($row = mysqli_fetch_array($result)){
		$html .= '<tr><td>'.$row['NomeComp'] . "</td>";
		$html .= '<td>'.$row['NomeVend'] . "</td>";
		$html .= '<td>'.$row['NomeVei'] . "</td>";
		$html .= '<td>'.$row[3] . "</td>";
		$html .= '<td>'.$row[4] . "</td>";
		$html .= '<td>'.$row[5] . "</td>";
		$html .= '<td>'.$row[6] . "</td>";
		$html .= '<td>'.$row[7] . "</td>";
		$html .= '<td>'.$row[8] . "</td></tr>";
	}

	$html .= '</tbody>';
	$html .= '</table></div>';


	//Criando a Instancia
	$dompdf = new DOMPDF();
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Celke - Relatório de Transações</h1>
			'. $html .'
		');


$dompdf -> set_option ( ' defaultFont ' , 'sanserif' );
$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf",
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
