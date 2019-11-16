<?php
$s_outro = "off";
require 'conexao.php';
$sql_soma ="";
$descricao="";

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
			if(strlen($descricao) > 2){
				$descricao .=",";
			}
			$descricao .= " vendedor";
		}

		if($s_comprador == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" p.Nome as C_Nome, p.CPF as C_CPF, p.TipoPessoa as C_Tipo, p.NomeEmpresa as C_NomeEmpresa";
			if(strlen($descricao) > 2){
				$descricao .=",";
			}
			$descricao .= " comprador";
		}

		if($s_veiculo == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" v.Nome as Vei_Nome, v.Cor as Vei_Cor, v.Placa as Vei_Placa";
			if(strlen($descricao) > 2){
				$descricao .=",";
			}
			$descricao .= " veículo";
		}

		if($s_contrato == "on"){
			if(strlen($sql_rel) > 7){
				$sql_rel .=",";
			}
			$sql_rel .=" c.ValorTotal as C_ValorTotal, c.NumeroParcelas as C_NumeroParcelas, c.ValorParcela as C_ValorParcela, l.Nome as U_Nome";
			if(strlen($descricao) > 2){
				$descricao .=",";
			}
			$descricao .= " contrato";
		}

		if($s_soma == "on"){
			$sql_soma .="SELECT sum(ValorTotal) FROM contrato where IdContrato in ($id);";
			if(strlen($descricao) > 2){
				$descricao .=",";
			}
			$descricao .= " soma";
		}

	}else{
		$s_outro = "on";
		$sql_rel .= " p.Nome as Comprador, pp.Nome as Vendedor, v.Nome as Veiculo, v.Placa as Placa, c.ValorTotal as ValorTotal, l.Nome as U_Nome";
		$descricao .= " padrão";
	}

	$sql_rel .= " FROM contrato c
INNER JOIN pessoa p ON c.pessoa_idcomprador = p.idpessoa
INNER JOIN pessoa pp ON c.pessoa_idvendedor = pp.idpessoa
INNER JOIN veiculo v ON c.veiculo_idveiculo = v.idveiculo
INNER JOIN login l ON c.Login_IdUsuario = l.IdUsuario";
	$sql_rel .= " where c.IdContrato in($id)";
	$sql_rel .= ";";
	//echo $sql_rel;

	$result1=mysqli_query($conexao,$sql_rel);

	if($row=mysqli_fetch_assoc($result1)){
		echo "<!DOCTYPE html><html><head>
		<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
  <style>
  body {
    font-family: 'arial';
    font-size:15px;
	margin:1cm;
padding:0;
}
  </style>
 <script>
 $(document).ready(function () {
$('#botao').click(function(){
     window.print();
});
})


</script>

<style>
@media print{
body{
-webkit-print-color-adjust:exact;
}
#botao, #botao1{
display:none;
}
}

</style>
			</head>
			<body id='body'>";

		echo "<center><h5>Relatório</h5><p style='color: dark gray;'>(".$descricao.")</p></center>";

		echo "<table class='table table-sm'>
			<tr>";
		if($s_vendedor == "on"){
			echo "<th scope='col' style='text-align:center; '>Vendedor</th>";
			echo "<th scope='col' style='text-align:center; '>CPF</th>";
			echo "<th scope='col' style='text-align:center; '>Empresa</th>";
		}

		if($s_comprador == "on"){
			echo "<th scope='col' style='text-align:center; '>Comprador</th>";
			echo "<th scope='col' style='text-align:center; '>CPF</th>";
			echo "<th scope='col' style='text-align:center; '>Empresa</th>";
		}

		if($s_veiculo == "on"){
			echo "<th scope='col' style='text-align:center; '>Veículo</th>";
			echo "<th scope='col' style='text-align:center; '>Cor</th>";
			echo "<th scope='col' style='text-align:center; '>Placa</th>";
		}

		if($s_contrato == "on"){
			echo "<th scope='col' style='text-align:center; '>Vlr. Total</th>";
			echo "<th scope='col' style='text-align:center; '>Nº Parc.</th>";
			echo "<th scope='col' style='text-align:center; '>Vlr. Parc.</th>";
			echo "<th scope='col' style='text-align:center; '>Usuário</th>";

		}

		if($s_soma){

		}

		if($s_outro == "on"){
			echo "<th scope='col' style='text-align:center; '>Comprador</th>";
			echo "<th scope='col' style='text-align:center; '>Vendedor</th>";
			echo "<th scope='col' style='text-align:center; '>Veículo</th>";
			echo "<th scope='col' style='text-align:center; '>Placa</th>";
			echo "<th scope='col' style='text-align:center; '>Valor Total</th>";
			echo "<th scope='col' style='text-align:center; '>Usuário</th>";
		}

		echo "</tr>";

		echo " <tr>";	
	}

	$result=mysqli_query($conexao,$sql_rel);
	while($rows=mysqli_fetch_assoc($result)){
		echo " <tr>";
		if($s_vendedor == "on"){
			echo "<td style='text-align:center;'>".$rows['V_Nome']."</td>";
			echo "<td style='text-align:center;'>".$rows['V_CPF']."</td>";
			echo "<td style='text-align:center;'>".$rows['V_NomeEmpresa']."</td>";
		}

		if($s_comprador == "on"){
			echo "<td style='text-align:center;'>".$rows['C_Nome']."</td>";
			echo "<td style='text-align:center;'>".$rows['C_CPF']."</td>";
			echo "<td style='text-align:center;'>".$rows['C_NomeEmpresa']."</td>";
		}

		if($s_veiculo == "on"){
			echo "<td style='text-align:center;'>".$rows['Vei_Nome']."</td>";
			echo "<td style='text-align:center;'>".$rows['Vei_Cor']."</td>";
			echo "<td style='text-align:center;'>".$rows['Vei_Placa']."</td>";
		}

		if($s_contrato == "on"){
			$valortotal = number_format($rows['C_ValorTotal'], 2, ',', '.');
			echo "<td style='text-align:center;'>".$valortotal."</td>";
			echo "<td style='text-align:center;'>".$rows['C_NumeroParcelas']."</td>";
			$valorparcela = number_format($rows['C_ValorParcela'], 2, ',', '.');
			echo "<td style='text-align:center;'>".$valorparcela."</td>";
			echo "<td style='text-align:center;'>".$rows['U_Nome']."</td>";
		}

		if($s_outro == "on"){
			echo "<td style='text-align:center;'>".$rows['Comprador']."</td>";
			echo "<td style='text-align:center;'>".$rows['Vendedor']."</td>";
			echo "<td style='text-align:center;'>".$rows['Veiculo']."</td>";
			echo "<td style='text-align:center;'>".$rows['Placa']."</td>";
			$valortotal = number_format($rows['ValorTotal'], 2, ',', '.');
			echo "<td style='text-align:center;'>".$valortotal."</td>";	
			echo "<td style='text-align:center;'>".$rows['U_Nome']."</td>";	
		}
		echo " 
		</tr>";

	}   
	if($s_soma){
		echo "<hr width = 100% style='color: grey;'>";
		echo "<tr>";
		echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Soma:</td>";
		$result=mysqli_query($conexao,$sql_soma);
		$soma=mysqli_fetch_row($result);
		$soma[0] = number_format($soma[0], 2, ',', '.');
		if(mysqli_affected_rows($conexao) != '0'){
			echo "<td style='border: 1px solid green;'>".$soma[0]."</td>";
		}
		echo "<td></td><td></td><td></td>";
		echo "</tr>";
	}
	echo "</table>";
?>
<input class="btn btn-md btn-primary text-uppercase" type="button" name="botao" value="Imprimir" id="botao">
<a href="../relatorio.php"> <input class="btn btn-md btn-primary text-uppercase" type="button" name="botao1" value="Voltar" id="botao1"> </a>
<?php
	echo "</body></html>";


}else{
	header('Location:../relatorio.php');
}
?>
