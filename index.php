<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>TECHstore</title>
	<meta name="description" content="TECHstore"> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">


</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-default navbar-fixed-top " id="my-navbar" role="navigation">
      <div class="container-fluid">
        <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="glyphicon glyphicon-tasks"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbar-collapse navbar-header">
          <div class="navbar-header">
            <a href="#domov"><img src="img/logo-primary2.svg" class="navbar-brand"></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="#ponuka">Ponuka</a> 
            <li><a href="#mojucet">Moj ucet</a> 
            <li><a href="#signin">Prihlas sa</a> 
            <li><a href="#contact">Kontakt</a> 
          </ul>
        </div>
      </div>
    </nav>

    <div class="jumbotron">
      <div class="row">
        <div class="col-md-2">
          <img src="img/logo.svg" class="img-logo">
        </div>
        <div class="col-md-4" id="jumbos">
            <img src="img/logo-primary2.svg" class="img-main">
        </div>
      </div>
    </div>
    <div class="row">
      <div  class="col-md-8">
        <div class="carousel slide" id="my-carousel">

          <ol class="carousel-indicators">
            <li data-target="#my-carousel" data-slide-to = "0" class="active"></li>
            <li data-target="#my-carousel" data-slide-to = "1"></li>
            <li data-target="#my-carousel" data-slide-to = "2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="item active cared">
              <img src="img/carousel/apple-products.jpg" alt="Apple products" class="img-responsive">
            </div>
            <div class="item cared">
              <img src="img/carousel/watch.jpg" alt="Apple watch" class="img-responsive">
            </div>
            <div class="item cared">
              <img src="img/carousel/headphones.jpg" alt="Headphones" class="img-responsive">
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



   </div> <!--Container -->
  <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
