<?php
  require_once('functions.php');
  if (isset($_GET['table']) && isset($_GET['id'])){
    delete($_GET['table'], $_GET['id']);
  } else {
    die("ERRO: Tabela ou ID não definido.");
  }
?>
