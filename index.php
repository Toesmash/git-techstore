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
  <script src="script.js"></script>


</head>
<body>
  <div class="container-fluid">
  <?php include ("navbar.php"); ?>

    <!-- HEADER  -->
    <div class="row" id="header">
      <div class="col-md-2">
        <span class="glyphicon glyphicon-shopping-cart"></span>
      </div>
      <div class="col-md-4">
          <img src="img/logo-primary2.svg" class="img-header">
      </div>
      <div class="col-md-6 nopadding">
        <form  action="/" method="get">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Vyhladaj produkt">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </span>
          </div>
        </form>
      </div>    
    </div>

    <!-- CAROUSEL -->
    <div class="row">
      <div  class="col-md-12 nopadding">
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
      <div class="col-md-12">
        <h1>It Does More. It Costs Less. It’s that Simple.</h1>
      </div>
    </div>







    <div class="row">
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
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae eros sit amet lacus finibus lacinia non consectetur lectus. In hac habitasse platea dictumst. Ut posuere laoreet malesuada. Pellentesque varius, urna ut lobortis imperdiet, sem massa placerat leo, vel finibus mi mauris vel velit. In porttitor tellus imperdiet dolor pharetra iaculis. Donec auctor eu lorem at viverra. Vestibulum eget purus neque. Donec rutrum iaculis lectus et auctor. Vestibulum quis risus euismod, vestibulum magna quis, tristique justo. Sed quis ligula blandit, scelerisque dui sit amet, hendrerit quam. Nam dignissim dapibus eros non dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus.

        </p>
      </div>
      <div class="col-md-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae eros sit amet lacus finibus lacinia non consectetur lectus. In hac habitasse platea dictumst. Ut posuere laoreet malesuada. Pellentesque varius, urna ut lobortis imperdiet, sem massa placerat leo, vel finibus mi mauris vel velit. In porttitor tellus imperdiet dolor pharetra iaculis. Donec auctor eu lorem at viverra. Vestibulum eget purus neque. Donec rutrum iaculis lectus et auctor. Vestibulum quis risus euismod, vestibulum magna quis, tristique justo. Sed quis ligula blandit, scelerisque dui sit amet, hendrerit quam. Nam dignissim dapibus eros non dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus.

        </p>
      </div>
    </div>


   </div> <!--Container -->

  <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>



