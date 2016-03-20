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
    <div class="row checkout">

      <div class="col-md-4 checkout_first">
        <h3 class="text-center text-danger">Order detials</h3>
        <?php  
          getOrdersCheckout($_GET['acc_id'], $_GET['order_id']);
        ?>

        <a href="orders.php" class="btn btn-warning btn-block">Modify</a>
      </div>


      <div class="col-md-4 checkout_second">
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
        <a href="#" class="btn btn-primary btn-block">Edit</a>
      </div>

      <div class="col-md-4 checkout_third">
        <h3 class="text-center text-success">Shipping and payment</h3>
        <form class="form-horizontal" role="form" method="post" action="index.php">
          
          <div class="form-group">
            <label class="control-label custom-label col-sm-3" for="faddress">Address:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="faddress" placeholder="Enter username" name="reg_username" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label custom-label col-sm-3" for="fpayment">Payment:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="fpayment" placeholder="Enter username" name="reg_username" required>
            </div>
          </div>

        </form>

        <a href="index.php?disburse=true&acc_id=<?php echo $acc_id; ?>&order_id=<?php echo $order_id; ?>" class="btn btn-success btn-block">Disburse</a>
      </div>

    </div>
   </div> <!--Container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>



