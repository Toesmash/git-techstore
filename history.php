<?php 
  session_start();
  include("php/functions.php");
?>



<!DOCTYPE html>
<html>
<head>
  	<meta charset='utf-8'>
  	<title>TECHstore</title>
  	<meta name="description" content="TECHstore">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="css/internal/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
  <?php include ("navbar.php"); ?>
  <div class="container-fluid">
    <?php include ("header.php") ?>

    <?php  
      historyFetch($_SESSION['account_id']);
    ?>


    </div> <!--Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>