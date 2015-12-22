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

    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top " id="my-navbar" role="navigation">
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
    </nav>


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




<!-- 
<div class="col-md-6 pull-right">
            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control input-md" placeholder="Vyhladaj produkt" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-md" type="submit"><i class="glyphicon glyphicon-search">HLADAJ</i></button>
                    </div>
                </div>
            </form>
      </div>  -->



    <!-- CAROUSEL -->
    <div class="row">
      <div  class="col-md- nopadding">
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
              <img src="img/carousel/apple-products.jpg" alt="Apple products" class="img-responsive">
            </div>
            <div class="item cared">
              <img src="img/carousel/watch.jpg" alt="Apple watch" class="img-responsive">
            </div>
            <div class="item cared">
              <img src="img/carousel/headphones.jpg" alt="Headphones" class="img-responsive">
            </div>
            <div class="item cared">
              <img src="img/carousel/headphones-2.jpg" alt="Headphones" class="img-responsive">
            </div>
            <div class="item cared">
              <img src="img/carousel/watch-2.jpg" alt="Watch" class="img-responsive">
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
