<?php 
	session_start();
	include("php/functions.php");

	if(isset($_GET['addproducttocart']) && $_GET['addproducttocart'] == 'true'){
		$product_id = $_GET['pro_id'];
		checkMyOrders($_SESSION['account_id'], $product_id);
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
	<?php 
		if(isset($_GET['errorcode']) && $_GET['errorcode']=='duplicate'){
			displayAlert('info', 'Info!','Product is already in your order. To edit quantity click on shopping cart!', 5);
		}
		else if(isset($_GET['errorcode']) && $_GET['errorcode']=='login'){
			displayAlert('info', 'Info!','Log in in order to start shopping or register <a href="registration.php">here</a>!',5);
		}
		else if(isset($_GET['errorcode']) && $_GET['errorcode']=='noorder'){
			displayAlert('danger', 'Error!','There are no products to display. You have no order in processing status.', 7);
		}
		else if(isset($_GET['errorcode']) && $_GET['errorcode']=='nohistoryorder'){
			displayAlert('danger', 'Error!','There is no history of orders to display. You have not disbursed any order yet', 7);
		}
  	?>
<div class="container-fluid">
    
	<header>
	    <div class="row text-center icon-row">
	    	<a href="products.php?category=2"><img src="img/icons/mobile4.svg" alt="mobile phone" class="product_icons"></a>
	    	<a href="products.php?category=5"><img src="img/icons/tablet3.svg" alt="mobile phone" class="product_icons"></a>
	    	<a href="products.php?category=1"><img src="img/icons/laptop7.svg" alt="mobile phone" class="product_icons"></a>
	    	<a href="products.php?category=3"><img src="img/icons/headphones4.svg" alt="mobile phone" class="product_icons"></a>
	    	<a href="products.php?category=6"><img src="img/icons/smartwatch3.svg" alt="mobile phone" class="product_icons"></a>
	    	<a href="products.php?category=4"><img src="img/icons/floppy.svg" alt="mobile phone" class="product_icons"></a>
	    </div>
		<div class="row text-center products-banner">
	        <h1>Every product you have ever wished for.</h1>
	       	<form  action="products.php" method="get" enctype="multipart/form-data">
		      	<div class="input-group text-center products-search">
		        	<input type="text" class="form-control" name="key" placeholder="Enter product, brand or keyboard for search">
		        	<i class="input-group-btn">
		          		<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		       		</i>
		      	</div>
		   	</form>
	    </div>
    </header>



<div class="row">
	<div class="col-md-3">
		

		<div id="affix_sidebar">
		 	<div class="list-group panel" id="sidebar">
		  		<div class="list-group-item">
			      	<h4 class="list-group-item-heading text-center">Categories</h4>
			    </div>
			    <?php 
					$rows = getRows('*', 'category');
					getCategory($rows);
 				?>
		    	
		  	</div>
		</div>



	</div>


	<div class="col-md-9">
		<?php 
			if(isset($_GET['category'])){
				$cat_id = $_GET['category'];
				getProducts("SELECT * FROM products WHERE pro_category like $cat_id");
			}
	
			else if(isset($_GET['brand'], $_GET['cat'])){
				$bra_id = $_GET['brand'];
				$cat_id = $_GET['cat'];
				getProducts("SELECT * FROM products JOIN brands ON products.pro_brand = brands.brand_id WHERE products.pro_category = $cat_id AND brands.brand_name = '$bra_id'");
			}

			else if(isset($_GET['all'])){
				getProducts("SELECT * FROM products");
			}

			else if(isset($_GET['key'])){
				$keywords = $_GET['key'];
				getProducts('SELECT * FROM products WHERE pro_keywords LIKE "%'.$keywords.'%"');
			}

			else {
					var_dump($_GET);
					var_dump($_POST);
					echo '<h1>You are not supposed to be here. A skillful monkey is working on fixing this "feature", so that this could not happen again. And go away now! Quickly</h1>';	
			}

		?>
	</div>

</div></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/internal/script.js"></script>
</body>
</html>





