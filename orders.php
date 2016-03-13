<?php 
  session_start();
  
  $alert_error = '';
  if(isset($_GET['login_error'])){
    if($_GET['login_error']=='empty_submit'){
      $alert_error = '<div class="alert alert-danger text-center">Password or Username was empty!</div>
        <script>window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
          }, 5000);
        </script>';
    }
    else if($_GET['login_error'] == 'wrong_submit') {
      $alert_error = '<div class="alert alert-danger text-center">Wrong Username or Password! Please enter correct information.</div>
        <script>window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
          }, 5000);
        </script>
      ';
    }

    else if($_GET['login_error'] == 'query_error') {
      $alert_error = '<div class="alert alert-danger text-center">Query error, please contact us!</div>
        <script>window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
          }, 5000);
        </script>
      ';
    }

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
      <div class="col-md-2">
        <span class="glyphicon glyphicon-shopping-cart"></span>
      </div>
      <div class="col-md-4">
          <img src="img/logo-primary2.svg" class="img-header">
      </div>
      <div class="col-md-6 ">
        <form  action="products.php" method="get" enctype="multipart/form-data">
          <div class="input-group">
            <input type="text" class="form-control" name="key" placeholder="Vyhladaj produkt">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </span>
          </div>
        </form>
      </div>    
    </div>

    </div> <!--Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>