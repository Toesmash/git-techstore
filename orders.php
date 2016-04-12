<?php 
  session_start();
  include 'php/functions.php';

  if(isset($_GET['delete']) && $_GET['delete']=='true' && isset($_GET['order_id']) && isset($_GET['product_id'])){
    $acc_id = $_SESSION['account_id'];
    $order_id = $_GET['order_id'];
    $product_id = $_GET['product_id'];

    deleteFromOrderDetials($acc_id, $order_id, $product_id);
  }

  if(isset($_GET['update']) && $_GET['update']=='true'){
    update("5");
  }

?>



<!DOCTYPE html>
<html>
<head>
  	<meta charset='utf-8'>
  	<title>TechPoint</title>
  	<meta name="description" content="TechPoint">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="css/internal/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />


</head>
<body>
  <?php include ("navbar.php"); ?>
  <div class="container-fluid">
    <?php include ("header.php") ?>

      <div class="row">
        <div class="col-md-12">
        <?php  
          fetchOrderProducts($_SESSION['account_id']);
        ?>
        </div>
    </div>

    </div> <!--Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>