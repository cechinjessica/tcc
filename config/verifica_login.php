<?php
//session_start();
if(!$_SESSION['usuario']) {
  header('Location: ../index.php');
  $_SESSION['msg'] = "Não foi realizado o login!";
  exit();
}
?>
