<?php
session_start();

if(session_destroy()){
    $_SESSION = array();
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['nome']);
    unset($_SESSION['idusuario']);
    header("Location: ../index.php");
}

?>
