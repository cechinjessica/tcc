<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
    $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";
}
$sql.=" ORDER BY Nome ASC";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
  echo "<div class='table-responsive'>
	<table class='table table-hover table-light table-sm' >
             <thead>
			  <tr>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Código</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Pessoa</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Nome</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Origem</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Profissão</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Est. Cívil</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>RG</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>CPF</th>
				<th scope='col' style='white-space: nowrap; text-align:center;'>Sexo</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Endereço</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Número</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Cidade</th>
				<th scope='col' style='white-space: nowrap; text-align:center;'>Empresa</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>CNPJ</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Cargo</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Cidade</th>
                <th scope='col' style='white-space: nowrap; text-align:center;'>Operação</th>
			 <tr>
            </thead>";
  echo " <tbody>";
  while ($row=mysqli_fetch_row($result))
  {
    $nome = str_replace(' ', '+', $row[2]);

    if($row[1] == "f"){
      $pessoa = "Física";
    }else{
      $pessoa = "Jurídica";
    }

    if($row[9] == "f"){
      $sexo = "Feminino";
    }else{
      $sexo = "Masculino";
    }

    if($row[5]=="separado"){
      $estcivil="Separado(a)";
    }else if($row[5]=="casado"){
      $estcivil="Casado(a)";
    }else if($row[5]=="solteiro"){
      $estcivil="Solteiro(a)";
    }else if($row[5]=="divorciado"){
      $estcivil="Divorciado(a)";
    }else if($row[5]=="viuvo"){
      $estcivil="Viúvo(a)";
    }

    echo " <tr>";
    echo "<th scope='row' id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[0]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$pessoa."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[2]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[3]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[4]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$estcivil."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[6]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[7]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$sexo."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[8]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[10]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[11]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[19]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[13]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[15]."</td>";
    echo "<td id=".$row[0]." onclick=getid(".$row[0].",'".$row[7]."','".$nome."') style='white-space: nowrap; ' >".$row[17]."</td>";
    echo "<td> <a href=cadastros/vendedor.php?id=".$row[0]."&op=A"."><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=cadastros/vendedor.php?id=".$row[0]. "&op=D" . "><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a>" . "</td>" ;
    echo " </tr>" ;
  }
  echo " </tbody>" ;
  echo "</table></div>" ;
} mysqli_close($conexao);
?>
