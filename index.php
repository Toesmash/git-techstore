<?php 
  session_start();
  include("php/functions.php");
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />


</head>
<body>
  <?php include ("navbar.php"); ?>
  <?php 
    if(isset($_GET['disburse']) && $_GET['disburse']=='completed'){
        displayAlert('success', 'Success!', 'Your order has been disbursed!', 5);

    }

    if(isset($_GET['disburse']) && $_GET['disburse']=='true'){
        disburseOrder($_GET['acc_id'], $_GET['order_id']);
        header('Location: index.php?disburse=completed');

    }

    if(isset($_GET['login_error'])){
      if($_GET['login_error']=='empty_submit'){
        displayAlert('danger', 'Error!', 'Password or Username was empty!', 5);
      }
      else if($_GET['login_error'] == 'wrong_submit') {
        displayAlert('danger', 'Error!', 'Wrong Username or Password! Please enter correct information!', 5);
      }

      else if($_GET['login_error'] == 'query_error') {
        displayAlert('info', 'Info!','Product is already in your order. To edit quantity click on shopping cart!', 5);

      }
    }
  ?>
  <div class="container-fluid">
  <?php include ("header.php") ?>
    <!-- CAROUSEL -->
    <div class="row carousel-wrapper">
      <div  class="col-md-12 ">
        <div class="carousel slide" id="my-carousel">

          <ol class="carousel-indicators">
            <li data-target="#my-carousel" data-slide-to = "0" class="active"></li>
            <li data-target="#my-carousel" data-slide-to = "1"></li>
            <li data-target="#my-carousel" data-slide-to = "2"></li>
            <li data-target="#my-carousel" data-slide-to = "3"></li>
            <li data-target="#my-carousel" data-slide-to = "4"></li>
          </ol>

          <div class="carousel-inner">
            <div class="item active cared">
              <img src="img/carousel/ipad.jpg" alt="iPad tablet with mac keyboard" class="img-responsive">
              <div class="carousel-caption caption-right">
                <h1>iPad</h1>
                <p>Lorem Ipsum</p>
              </div>
            </div>
            <div class="item cared">
              <img src="img/carousel/macbook.jpg" alt="Macbook laptop by Apple" class="img-responsive">
              <div class="carousel-caption">
                <h1>Macbook</h1>
                <p>Lorem Ipsum</p>
              </div>
            </div>
            <div class="item cared">
              <img src="img/carousel/philips.jpg" alt="Headphones by Philips" class="img-responsive">
              <div class="carousel-caption">
                <h1>Philips</h1>
                <p>Lorem Ipsum</p>
              </div>
            </div>
            <div class="item cared">
              <img src="img/carousel/watch.jpg" alt="Apple watch" class="img-responsive">
              <div class="carousel-caption">
                <h1>Apple watch</h1>
                <p>Lorem Ipsum</p>
              </div>
            </div>
            <div class="item cared">
              <img src="img/carousel/razer.jpg" alt="Gaming headphones razer" class="img-responsive">
              <div class="carousel-caption">
                <h1>Razer</h1>
                <p>Lorem Ipsum</p>
              </div>
            </div>
            <a href="#my-carousel" class="carousel-control left" data-slide="prev">
              <span class="icon-prev"></span>
            </a>
            <a href="#my-carousel" class="carousel-control right" data-slide="next">
              <span class="icon-next"></span>
            </a>
          </div>
        </div>   
      </div>
    </div>

    <!-- INFO -->
    <div class="row">
      <div class="col-md-12 text-center section-top">
        <h1>It Does More. It Costs Less. It’s that Simple.</h1>
      </div>
    </div>

    <div class="row section-middle">
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae eros sit amet lacus finibus lacinia non consectetur lectus. In hac habitasse platea dictumst. Ut posuere laoreet malesuada. Pellentesque varius, urna ut lobortis imperdiet, sem massa placerat leo, vel finibus mi mauris vel velit. In porttitor tellus imperdiet dolor pharetra iaculis. Donec auctor eu lorem at viverra. Vestibulum eget purus neque. Donec rutrum iaculis lectus et auctor. Vestibulum quis risus euismod, vestibulum magna quis, tristique justo. Sed quis ligula blandit, scelerisque dui sit amet, hendrerit quam. Nam dignissim dapibus eros non dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus.

        </p>
      </div>
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae eros sit amet lacus finibus lacinia non consectetur lectus. In hac habitasse platea dictumst. Ut posuere laoreet malesuada. Pellentesque varius, urna ut lobortis imperdiet, sem massa placerat leo, vel finibus mi mauris vel velit. In porttitor tellus imperdiet dolor pharetra iaculis. Donec auctor eu lorem at viverra. Vestibulum eget purus neque. Donec rutrum iaculis lectus et auctor. Vestibulum quis risus euismod, vestibulum magna quis, tristique justo. Sed quis ligula blandit, scelerisque dui sit amet, hendrerit quam. Nam dignissim dapibus eros non dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus.

        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 mockup">
        <img src="img/mockup2.png" alt="Responsive mockup">
      </div>
        <div class="col-md-4 mockup-info">
          <h2>Built for any device.</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>


    <div class="row section-bottom">
      <div class="col-md-4">
        <h2>Made with awesome technology!</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="col-md-8 text-center made-with-area">
        <img src="img/icons/html-logo.png" alt="html icon" class="made-with">
        <img src="img/icons/css-logo.svg" alt="css icon" class="made-with">
        <img src="img/icons/php-logo.svg" alt="php icon" class="made-with">
        <img src="img/icons/js-logo.jpg" alt="js icon" class="made-with">
        <img src="img/icons/bootstrap-logo.svg" alt="Bootstrap icon" class="made-with">
        <img src="img/icons/sql-logo.png" alt="MySql icon" class="made-with">
      </div>
    </div>
    </div> <!--Container -->
    <?php 
      include('footer.php');
    ?>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>