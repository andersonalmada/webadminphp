<?php require_once 'functions.php'; 
session_start();
if (!isset($_SESSION['token'])) {
    header('location: login.php');  
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sistema de Administração - EMUFC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap-select.min.css">
    <style>
        body {
            padding-top: 80px;
            padding-bottom: 20px;
        }
        .navbar {
          background-color:#00629B;
          height: 75px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo BASEURL; ?>index.php" class="navbar-brand">
            <img src="img/Logo.png" alt="Equipamentos Multiusuário da UFC" height="50" width="54"/>
          </a>
        </div>
        <div class="collapse navbar-collapse">
            <p class="navbar-text navbar-right" style="color: #FFF">
                Versão: <?php echo getVersion(); ?>
            </p>
        </div>
      </div>
    </nav>

    <main class="container">

