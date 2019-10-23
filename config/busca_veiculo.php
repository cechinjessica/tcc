<?php
require 'conexao.php';
$sql = "SELECT * FROM veiculo";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
    if ($nm!='') {
        $sql.=" WHERE UPPER(Placa) LIKE UPPER('%$nm%')";
    }
}
$sql.=" ORDER BY Nome ASC";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
    echo "<div class='table-responsive'>
	<table class='table table-hover table-light table-sm'>
             <thead>
			  <tr>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Código</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Nome</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Marca</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Modelo</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Ano</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Chassi</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Cor</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Placa</th>
				<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Renavam</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Proprietário</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Valor</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Estado</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Combustível</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Tem Contrato?</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Operação</th>
			 <tr>
            </thead>";
    while ($row=mysqli_fetch_row($result))
    {
        $check="";
        $query = "SELECT * FROM veiculo v inner join contrato c on v.IdVeiculo = c.Veiculo_idVeiculo where v.IdVeiculo ='".$row[0]."'";
        $result1=mysqli_query($conexao,$query);
        if (mysqli_affected_rows($conexao) != '0') {
            $check = "✓";
        }



        if($row[12] == "gasolina"){
            $combustivel = "Gasolina";
        }else if($row[12] == "etanol"){
            $combustivel = "Etanol";
        }else if($row[12] == "diesel"){
            $combustivel = "Diesel";
        }else if($row[12] == "gasnatural"){
            $combustivel = "Gás natural";
        }else if($row[12] == "eletrico"){
            $combustivel = "Elétrico";
        }else if($row[12] == "flex"){
            $combustivel = "Flex";
        }

       // $valor = str_replace ( "." ,",", $row[10]);
        $valor = number_format($row[10], 2, ',', '.');

        echo " <tbody>";
        echo " <tr>";
        echo "<th scope='row' style='white-space: nowrap; text-align:center;'>".$row[0]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[1]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[2]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[3]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[4]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[5]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[6]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[7]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[8]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[9]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$valor."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$row[11]."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$combustivel."</td>";
        echo "<td style='white-space: nowrap; text-align:center;'>".$check."</td>";
        echo "<td> <a href=veiculo.php?id=".$row[0]."&op=A><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=veiculo.php?id=".$row[0]. "&op=D><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a></td>";
        echo " </tr>";
    }   echo " </tbody>";
    echo "</table></div>";
}
mysqli_close($conexao);

?>
