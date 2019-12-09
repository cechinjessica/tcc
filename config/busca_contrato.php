<?php
require 'conexao.php';
$sql = "SELECT p.nome, pp.nome, v.nome, c.valortotal, c.datacriacao, c.idcontrato, v.placa FROM contrato c
inner join pessoa p on c.pessoa_idcomprador = p.idpessoa
inner join pessoa pp on c.pessoa_idvendedor = pp.idpessoa
inner join veiculo v on c.veiculo_idveiculo = v.idveiculo";

$vei=$_GET['q']; //recupera o parâmetro passado na visualização
if ($vei!='') {
  if ($vei!='') {
    $sql.=" WHERE UPPER(v.placa) LIKE UPPER('%$vei%')";
  }
}
$sql.=" ORDER BY idcontrato ASC";

$result=mysqli_query($conexao,$sql);

if (mysqli_affected_rows($conexao)>0) {
  echo "<div class='card-deck'>";
  while ($row=mysqli_fetch_row($result))
  {
    $ano = substr($row[4],0,4);
    $mes = substr($row[4],5,2);
    $dia = substr($row[4],8,2);
    $hora = substr($row[4], 11,5);
    $dt = $dia."/".$mes."/".$ano;

    $valor = number_format($row[3], 2, ',', '.');


    echo "<div class='custom-control custom-control-inline p-0 my-2'>";
    echo "<div class='card border-primary' style='width:18rem;'>";
    echo "<div class='card-header border-primary bg-transparent'><h5 class='text-uppercase'>$row[2] $row[6]</h5></div>";
    echo "<div class='card-body bg-transparent'><div class='card-text'>";
    echo "<p><b>Vendedor:</b> $row[1]</p>";
    echo "<p><b>Comprador:</b> $row[0]</p>";
    echo "<p class='text-success lead'>R$$valor</p> ";
    echo "<p class='text-ligth'> $dt $hora</p>";
    echo "<div class='d-flex justify-content-center'><a href=../contrato.php?id=$row[5]&op=A class='card-link text-info'><i class='material-icons' style='font-size: 24px;'>edit</i></a><a href=../contrato.php?id=$row[5]&op=D class='card-link text-danger'><i class='material-icons'>delete</i></a>";

    $querySelecao = "SELECT c.idcontrato as id
                FROM contrato c
inner join pessoa p on c.pessoa_idcomprador = p.idpessoa
inner join pessoa pp on c.pessoa_idvendedor = pp.idpessoa
inner join veiculo v on c.veiculo_idveiculo = v.idveiculo
where Arquivo is not null and IdContrato=".$row[5];
    $resultado = mysqli_query($conexao,$querySelecao);
    $rows=mysqli_fetch_row($resultado);
    if (mysqli_affected_rows($conexao) != '0') {
      echo "<a href='ver.php?id=".$rows[0]."' class='card-link text-secondary'><i class='material-icons'>remove_red_eye</i></a>";
    }
    echo "</div>";


    echo "<center><a href=../config/pdfcontrato.php?id=$row[5]><button type='button' class='btn btn-outline-info btn-sm w-100'>Imprimir</button></a></center>";
    echo "</div></div></div></div>";

  }
  echo "</div>";
}
mysqli_close($conexao);

?>
