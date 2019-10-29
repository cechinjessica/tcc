<?php
require 'conexao.php';

$sql_rel = "SELECT p.nome, pp.nome, v.nome, c.valortotal, c.datacriacao, c.idcontrato, v.placa FROM contrato c
INNER JOIN pessoa p ON c.pessoa_idcomprador = p.idpessoa
INNER JOIN pessoa pp ON c.pessoa_idvendedor = pp.idpessoa
INNER JOIN veiculo v ON c.veiculo_idveiculo = v.idveiculo";

$dinicial = $_POST['dinicial'];
$dfinal = $_POST['dfinal'];
$comprador = $_POST['comprador'];
$vendedor = $_POST['vendedor'];
$ulogado = $_POST['ulogado'];
$foro = $_POST['foro'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];

//echo $dfinal."A".$dinicial."A".$comprador."A".$vendedor."A".$ulogado."A".$foro."A".$modelo."A".$ano;
if($_POST['dinicial'] != "" || $_POST['dfinal'] != "" || $_POST['comprador'] != "" || $_POST['vendedor'] != "" || $_POST['ulogado'] != "" || $_POST['foro'] != "" || $_POST['modelo'] != "" || $_POST['ano'] != ""){
  $sql_rel .=" where";

  //echo "AAA".strlen($sql_rel); //281
  if($dinicial != "" & $dfinal != ""){
    $sql_rel .= " c.DataCriacao BETWEEN '".$dinicial."' AND '".$dfinal."'";

  }else if($dfinal == "" & $dinicial != ""){
    $sql_rel .= " c.DataCriacao <= '".$dinicial."'";

  }else if($dfinal != "" & $dinicial == ""){
    $sql_rel .= " c.DataCriacao >= '".$dfinal."'";
  }

  if($comprador != ""){
    if(strlen($sql_rel) > 281){
      $sql_rel .= " AND";
    }
    $sql_rel .= " c.Pessoa_IdComprador ='".$comprador."'";
  }

  if($vendedor != ""){
    if(strlen($sql_rel) > 281){
      $sql_rel .= " AND";
    }
    $sql_rel .= " c.Pessoa_IdVendedor ='".$vendedor."'";
  }

  if($ulogado != ""){
    if(strlen($sql_rel) > 281){
      $sql_rel .= " AND";
    }
    $sql_rel .= " c.Login_IdUsuario ='".$ulogado."'";
  }

  if($foro != ""){
    if(strlen($sql_rel) > 281){
      $sql_rel .= " AND";
    }
    $sql_rel .= " c.Foro ='".$foro."'";
  }

  if($modelo != ""){
    if(strlen($sql_rel) > 281){
      $sql_rel .= " AND";
    }
    $sql_rel .= " v.Nome ='".$modelo."'";
  }

  if($ano != ""){
    if(strlen($sql_rel) > 281){
      $sql_rel .= " AND";
    }
    $sql_rel .= " v.Modelo ='".$ano."'";
  }

}
$sql_rel .= ";";
echo $sql_rel;

////////////////////////////Gerar cards
$result=mysqli_query($conexao,$sql_rel);
if (mysqli_affected_rows($conexao)>0) {
  echo "<div class='card-deck my-2'>";
  while ($row=mysqli_fetch_row($result))
  {

    $ano = substr($row[4],0,4);
    $mes = substr($row[4],5,2);
    $dia = substr($row[4],8,2);
    $hora = substr($row[4], 11,5);
    $dt = $dia."/".$mes."/".$ano;

    echo "<div class='custom-control custom-control p-0 my-1'>";
    echo "<div class='card border-primary' style='width:16rem; '>";//height:19rem;
    echo "<div class='card-header border-primary bg-transparent'><h5 class='text-uppercase'>$row[2] $row[6]</h5></div>";
    echo "<div class='card-body bg-transparent'><div class='card-text'>";
    echo "<p><b>Vendedor:</b> $row[1]</p>";
    echo "<p><b>Comprador:</b> $row[0]</p>";
    echo "<p class='text-success lead'>R$$row[3]</p> ";
    echo "<p class='text-ligth'> $dt $hora</p>";
    $querySelecao = "SELECT c.idcontrato as id
                FROM contrato c
inner join pessoa p on c.pessoa_idcomprador = p.idpessoa
inner join pessoa pp on c.pessoa_idvendedor = pp.idpessoa
inner join veiculo v on c.veiculo_idveiculo = v.idveiculo
where Arquivo is not null and IdContrato=".$row[5];
    $resultado = mysqli_query($conexao,$querySelecao);
    $rows=mysqli_fetch_row($resultado);
    if (mysqli_affected_rows($conexao) != '0') {
      echo "<div class='d-flex justify-content-center'>";
      echo "<a href='cadastros/ver.php?id=".$rows[0]."' class='card-link text-secondary'><i class='material-icons'>remove_red_eye</i></a>";
      echo "</div>";
    }
    echo "</div></div></div></div>";

  }
  echo "</div>";
}
mysqli_close($conexao);

?>
