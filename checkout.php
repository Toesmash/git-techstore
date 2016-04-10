<?php
  session_start();
  include("php/functions.php");

  if(isset($_GET['acc_id']) && isset($_GET['order_id'])){
      $order_id = $_GET['order_id'];
      $acc_id = $_GET['acc_id'];
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
    <div class="checkout">

      <div class="checkout_first">
        <h3 class="text-center text-warning">Order detials</h3>
        <?php  
          getOrdersCheckout($_GET['acc_id'], $_GET['order_id']);
        ?>
      </div>


      <div class="checkout_second">
      <?php $info = getPersonalInfo($_GET['acc_id']) ?>

        <h3 class="text-center text-primary">Personal detials</h3>
        <div class="row user_info">
          <label class="control-label custom-label col-sm-3" for="fname">Name:</label>
          <p><?php echo $info[0] ?></p>
        </div>

        <div class="row user_info">
          <label class="control-label custom-label col-sm-3" for="fname">Surname:</label>
          <p><?php echo $info[1] ?></p>
          
        </div>

        <div class="row user_info">
          <label class="control-label custom-label col-sm-3" for="fname">E-mail:</label>
          <p><?php echo $info[2] ?></p>
          
        </div>

        <div class="row user_info">
          <label class="control-label custom-label col-sm-3" for="fname">Phone:</label>
          <p><?php echo $info[3] ?></p>
        </div>

        <div class="row user_info">
          <label class="control-label custom-label col-sm-3" for="faddress">Address:</label>
          <p><?php echo $info[4] ?></p>
        </div>
        
      </div>

      <div class="checkout_third">
        <h3 class="text-center text-success">Complete and disburse order</h3>
        <p>Make sure your contact details are correct!</p>
        <img src="img/green_tick.png" alt="green tick" class="img-checkout img-responsive">
      </div>

    </div>
    
   </div> <!--Container -->
   <div class="row checkout-buttons">
      <div class="col-sm-4">
        <a href="orders.php" class="btn btn-warning btn-block btn-top-mar">Modify</a>

      </div>
      <div class="col-sm-4">
        <a href="personal.php?acc_id=<?php echo $acc_id; ?>&order_id=<?php echo $order_id; ?>" class="btn btn-primary btn-block btn-top-mar">Edit</a>

      </div>
      <div class="col-sm-4">
        <a href="index.php?disburse=true&acc_id=<?php echo $acc_id; ?>&order_id=<?php echo $order_id; ?>" class="btn btn-success btn-block btn-top-mar">Disburse</a>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>



