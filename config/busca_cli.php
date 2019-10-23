<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
  if ($nm!='') {
    $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";
  }
}
$sql.=" ORDER BY Nome ASC";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
  echo "
    <div class='table-responsive'>
	<table class='table table-hover table-light table-sm table-bordered'>
             <thead>
			  <tr>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Código</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Pessoa</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Nome</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Origem</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Profissão</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Est. Cívil</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>RG</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>CPF</th>
				<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Sexo</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Endereço</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Número</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Cidade</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>CEP</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Cargo</th>
				<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Empresa</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>CNPJ</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Enderço</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Tipo</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Cidade</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Número</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;'>Operação</th>
			 <tr>
            </thead>";
  while ($row=mysqli_fetch_row($result))
  {
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
    if($row[16] == "pr"){
      $tipoempresa = "Privada";
    }else if($row[16] == "pu") {
      $tipoempresa = "Pública";
    }else{
      $tipoempresa = "";
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
    echo "<td style='white-space: nowrap; text-align:center;'>".$row[18]."</td>";
    echo "<td> <a href=vendedor.php?id=".$row[0]."&op=A><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=vendedor.php?id=".$row[0]. "&op=D><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a></td>";
    echo " </tr>";
  }   echo " </tbody>";
  echo "</table></div>";
}
mysqli_close($conexao);

?>
