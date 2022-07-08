<?php
include('backand\conexao.php');
include('./home.php');
if (!isset($_SESSION)) {
    session_start();
  }


  $sql = "DELETE FROM remedios WHERE idremedios=2;";
?>