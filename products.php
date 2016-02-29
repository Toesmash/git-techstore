<!DOCTYPE html>

<?php 
	include("functions/functions.php");
?>

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
	<link rel="stylesheet" href="styles/categories-style.css">

</head>
<body>
<div class="container-fluid">
	<!-- NAVBAR -->
	<?php include ("navbar.php"); ?>
	<header>
		<div class="jumbotron">
	        <h1>Bootstrap Affix</h1>
	        <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
	    </div>
    </header>



<div class="row">
	<div class="col-md-3">
		

		<div id="affix_sidebar">
		 	<div class="list-group panel" id="sidebar">
		  		<div class="list-group-item">
			      	<h4 class="list-group-item-heading">Categories</h4>
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

			else if(isset($_GET['everything'])){
				getProducts("SELECT * FROM products WHERE pro_category");
			}

			else {
					echo '<h1>You are not supposed to be here. A skillful monkey is working on fixing this "feature", so that this could not happen again. And go away now! Quickly</h1>';	
			}

		?>
	</div>

</div>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$('#sidebar').affix({
	      offset: {
	        top: $('header').height()
	      }
		});	
	</script>

</body>
</html>





