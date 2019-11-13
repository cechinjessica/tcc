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
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cod'>Código</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='tipo'>Pessoa</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='nome'>Nome</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='origem'>Origem</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='profissao'>Profissão</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='ecivil'>Est. Cívil</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='rg'>RG</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cpf'>CPF</th>
				<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='sexo'>Sexo</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='endereco'>Endereço</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='numero'>Número</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cidade'>Cidade</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cep'>CEP</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cargo'>Cargo</th>
				<th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='empresa'>Empresa</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cnpj'>CNPJ</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='enderecoempresa'>Endereço</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='tipoempresa'>Tipo</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='cidadeempresa'>Cidade</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='numeroempresa'>Número</th>
                <th scope='col' style='white-space: nowrap; text-align:center; text-transform: uppercase;' id='operacao'>Operação</th>
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
    echo "<th scope='row' id='cod'>".$row[0]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='tipo'>".$pessoa."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='nome'>".$row[2]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='origem'>".$row[3]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='profissao'>".$row[4]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='ecivil'>".$estcivil."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='rg'>".$row[6]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='cpf'>".$row[7]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='sexo'>".$sexo."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='endereco'>".$row[8]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='numero'>".$row[10]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='cidade'>".$row[11]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='cep'>".$row[12]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='cargo'>".$row[15]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='empresa'>".$row[19]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='cnpj'>".$row[13]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='enderecoempresa'>".$row[14]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='tipoempresa'>".$tipoempresa."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='cidadeempresa'>".$row[17]."</td>";
    echo "<td style='white-space: nowrap; text-align:center;' id='numeroempresa'>".$row[18]."</td>";
    echo "<td id='operacao'> <a href=vendedor.php?id=".$row[0]."&op=A><button type='button' class='btn btn-info btn-sm w-100'>Atualizar</button></a><a href=vendedor.php?id=".$row[0]. "&op=D><button type='button' class='btn btn-danger btn-sm w-100'>Deletar</button></a></td>";
    echo " </tr>";
  }   echo " </tbody>";
  echo "</table></div>";
}
mysqli_close($conexao);

?>
