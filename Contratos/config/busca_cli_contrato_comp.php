<?php
require 'conexao.php';
$sql = "SELECT * FROM pessoa";

$nm=$_GET['q']; //recupera o parâmetro passado na visualização
if ($nm!='') {
    if ($nm!='') {
        $sql.=" WHERE UPPER(NOME) LIKE UPPER('%$nm%')";
    }
}
$sql.=" ORDER BY idpessoa";

$result=mysqli_query($conexao,$sql);
if (mysqli_affected_rows($conexao)>0) {
    echo "<div class='table-responsive'>
        <table class='table table-hover table-light table-sm' >
                 <thead>
                  <tr>
                    <th scope='col'>Código</th>
                    <th scope='col'>Tipo de pessoa</th>
                    <th scope='col'>Nome Completo</th>
                    <th scope='col'>Nacionalidade</th>
                    <th scope='col'>Profissao</th>
                    <th scope='col'>Estado Cívil</th>
                    <th scope='col'>RG</th>
                    <th scope='col'>CPF</th>
                    <th scope='col'>Sexo</th>
                    <th scope='col'>Endereço</th>
                    <th scope='col'>Número</th>
                    <th scope='col'>Cidade</th>
                    <th scope='col'>CEP</th>
                    <th scope='col'>Nome da Empresa</th>
                    <th scope='col'>CNPJ</th>
                    <th scope='col'>Enderço da Empresa</th>
                    <th scope='col'>Cargo</th>
                    <th scope='col'>Tipo da Empresa</th>
                    <th scope='col'>Cidade da Empresa</th>
                    <th scope='col'>Número da Empresa</th>
                    <th scope='col'>Operação</th>
                 <tr>
                </thead>";
    while ($row=mysqli_fetch_row($result))
    {

        echo " <tbody class='table-striped'>";
        echo " <tr>";
        echo "<th scope='row' id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."') >".$row[0]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[1]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[2]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[3]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[4]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[5]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[6]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[7]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[9]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[8]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[10]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[11]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[12]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[19]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[13]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[14]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[15]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[16]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[17]."</td>";
        echo "<td id=".$row[0]." onclick=getidcomp(".$row[0].",'".$row[7]."')>".$row[18]."</td>";
        echo "<td> <a href=cadastros/vendedor.php?id=".$row[0]."&op=A".">Editar". "|" ."<a href=cadastros/vendedor.php?id=".$row[0]. "&op=D" . ">Apagar" . "</td>" ; echo " </tr>" ; } echo " </tbody>" ; echo "</table></div>" ; } mysqli_close($conexao); ?>
