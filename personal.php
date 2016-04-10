<?php 
  session_start();
  include("php/functions.php");

  if(isset($_GET['acc_id'])){
      $acc_id = $_GET['acc_id'];
  }

  if(isset($_POST['edit_submit'])){
      update("4");
  }
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
    <!-- HEADER  -->
    <div class="row" id="header">
        <img src="img/icons/edit.svg" alt="edit" class="img-icons">
        <h2>Edit your personal information.</h2>
    </div>


    <?php  
      editPersonal($acc_id);


      if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        echo'
          <div class="col-md-12 text-center">
            <a href="checkout.php?acc_id='.$acc_id.'&order_id='.$order_id.'" class="btn btn-lg btn-success btn-shop btn-block"><span class="glyphicon glyphicon-shopping-cart"></span> Continue shopping</a>
          </div>
        ';

      }
    ?>
    
    
   </div> <!--Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>
