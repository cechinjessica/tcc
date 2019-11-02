<?php
$s_outro = "off";
require 'conexao.php';

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';
//Criando a Instancia

$dompdf = new Dompdf();
// some options...
//$dompdf->getOptions()->setLogOutputFile('dompdf.log');
$dompdf->set_option('isHtml5ParserEnabled', true);

if (isset($_POST['imprimir_rel'])){
	if (isset($_POST['s_vendedor'])){
		$s_vendedor = "on";
	}else{
		$s_vendedor="off";
	}

	if (isset($_POST['s_comprador'])){
		$s_comprador ="on";
	}else{
		$s_comprador ="off";
	}

	if (isset($_POST['s_veiculo'])){
		$s_veiculo = "on";
	}else{
		$s_veiculo="off";
	}

	if (isset($_POST['s_contrato'])){
		$s_contrato = "on";
	}else{
		$s_contrato ="off";
	}

	if (isset($_POST['s_soma'])){
		$s_soma = "on";
	}else{
		$s_soma ="off";
	}

	$ids = $_POST['ids'];
	$id = substr ( $ids, 1 );
	/*$array_ids = explode ( "," , $ids);
	for($i=0; count($array_ids) > $i; $i++){
		echo $array_ids[$i]." ";
	}*/


	$sql_rel = 'SELECT';
	if($s_vendedor == "on" || $s_comprador == "on" || $s_veiculo == "on" || $s_contrato == "on" || $s_soma == "on"){
		$sql_rel .=' ';

		//echo 'AAA'.strlen($sql_rel); //7
		if($s_vendedor == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" pp.Nome as V_Nome, pp.CPF as V_CPF, pp.TipoPessoa as V_Tipo, pp.NomeEmpresa as V_NomeEmpresa";
		}

		if($s_comprador == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" p.Nome as C_Nome, p.CPF as C_CPF, p.TipoPessoa as C_Tipo, p.NomeEmpresa as C_NomeEmpresa";
		}

		if($s_veiculo == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" v.Nome as Vei_Nome, v.Cor as Vei_Cor, v.Placa as Vei_Placa";
		}

		if($s_contrato == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" c.ValorTotal as C_ValorTotal, c.Entrada as C_Entrada, c.NumeroParcelas as C_NumeroParcelas, c.ValorParcela as C_ValorParcela, l.Nome as U_Nome";
		}

		if($s_soma == "on"){
			$sql_soma .="SELECT sum(ValorTotal) FROM contrato where IdContrato in ($id);";
		}

	}else{
		$s_outro = "on";
		$sql_rel .= " p.Nome as Comprador, pp.Nome as Vendedor, v.Nome as Veiculo, v.Placa as Placa, c.ValorTotal as ValorTotal, l.Nome as U_Nome";
	}
	$sql_rel .= " FROM contrato c
INNER JOIN pessoa p ON c.pessoa_idcomprador = p.idpessoa
INNER JOIN pessoa pp ON c.pessoa_idvendedor = pp.idpessoa
INNER JOIN veiculo v ON c.veiculo_idveiculo = v.idveiculo
INNER JOIN login l ON c.Login_IdUsuario = l.IdUsuario";
	$sql_rel .= " where c.IdContrato in($id)";
	$sql_rel .= ";";
	echo $sql_rel;

	$result=mysqli_query($conexao,$sql_rel);
	$rows=mysqli_fetch_assoc($result);
	if (mysqli_affected_rows($conexao)>0) {

		$inicial = "<!DOCTYPE html><html><head>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
			</head><body>";

		$titulo = "<center><h5>Relatório</h5></center>";

		$cabecalho = "<table class='table table-hover table-light table-sm table-bordered'>
			<thead>
			<tr>";
		if($s_vendedor == "on"){
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Vendedor</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>CPF</th>";
			if($rows['V_Tipo'] == "j"){
				$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Empresa</th>";
			}
		}

		if($s_comprador == "on"){
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Comprador</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>CPF</th>";
			if($rows['C_Tipo'] == "j"){
				$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Empresa</th>";
			}
		}

		if($s_veiculo == "on"){
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Veículo</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Cor</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Placa</th>";
		}

		if($s_contrato == "on"){
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Valor Total</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Entrada</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Qtd. Parcelas</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Vlr. Parcela</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Usuário</th>";

		}

		if($s_soma){
			/*
			$result=mysqli_query($conexao,$sql_soma);
			$row=mysqli_fetch_row($result);
			*/
		}

		if($s_outro == "on"){
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Comprador</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Vendedor</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Veículo</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Placa</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Valor Total</th>";
			$cabecalho .= "<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Usuário</th>";
		}

		$cabecalho.= "<tr>
			</thead>";








		echo " <tbody>";
		echo " <tr>";
		echo "<th scope='row'>".$row[0]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$pessoa."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[2]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[3]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[4]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$estcivil."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[6]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[7]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$sexo."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[8]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[10]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[11]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[12]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[15]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[19]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[13]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[14]."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$tipoempresa."</td>";
		echo "<td style='white-space: nowrap; text-align:center;'>".$row[17]."</td>";
		echo " </tr>";
	}   echo " </tbody>";
	echo "</table>";

	$final="</body></html>";
	echo $inicial ."".$titulo."".$cabecalho."".$final;
	$dompdf->loadHtml($inicial ."".$titulo."".$cabecalho."".$final);
	$dompdf -> setPaper ( ' A4 ' , ' landscape ' );

	//Renderizar o html
	//$dompdf->render();

	//Exibir a página
	//$dompdf->stream( "Relatorio.pdf",array("Attachment" =>false //Para realizar o download somente alterar para true ));
}
}else{
	header('Location:../relatorio.php');
}
?>
