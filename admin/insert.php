<!DOCTYPE html>
<?php 
	include("../functions/functions.php");

	
?>

<html>
<head>
	<meta charset='utf-8'>
	<title>INSERT PAGE</title>
	<meta name="description" content="TECHstore"> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles/admin_style.css">
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1><a href="../index.php">Insert product to table!</a></h1>
		<p>One morning, e his be size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
	    <div class="form-group">
	      	<label class="control-label col-sm-2">Názov produktu:</label>
	      	<div class="col-sm-4">
	        	<input type="text" class="form-control" name="pro_name"/>
	      	</div>
	    </div>

	    <div class="form-group">
	    	<label class="control-label col-sm-2">Kategória:</label>
	      	<div class="col-sm-4">
	        	<select class="form-control" name="pro_cat"/>
	        	<option>Vyber z kategorie</option>
	        	<?php 
	        		listData(category, cat_name, cat_id);
	        	?>
				</select>
	      	</div>
	    </div>



	    <div class="form-group">
	      	<label class="control-label col-sm-2">Značka:</label>
	      	<div class="col-sm-4">
	        	<select class="form-control" name="pro_brand"/>
	        	<option>Vyber znacku</option>
	        	<?php 
	        		listData(brands, brand_name, brand_id);
	        	?>
				</select>
	      	</div>
	    </div>

	    <div class="form-group">
		        <label class="control-label col-sm-2">Cena:</label>
		        <div class="col-sm-4">
		            <input type="number" class="form-control" min="0" step="1" name="pro_price"/>
		        </div>
    	</div>

	    <div class="form-group">
	    	<label class="control-label col-sm-2">Obrázok:</label>
	      	<div class="col-sm-4">
	        	<label class="file">
					<input type="file" id="file" name="pro_image"/>
				</label>
	      	</div>
	    </div>

	    <div class="form-group">
	    	<label class="control-label col-sm-2">Popis:</label>
	      	<div class="col-sm-4">
	      		<textarea class = "form-control" rows = "3" name="pro_desc"></textarea>
	      	</div>
	    </div>


	    <div class="form-group">
	      	<label class="control-label col-sm-2">Keywords:</label>
	      	<div class="col-sm-4">
	        	<input type="text" class="form-control" name="pro_keywords"/>
	      	</div>
	    </div>


	    <div class="form-group">
	      	<div class="col-sm-4">
	        	<input class=" btn btn-primary text-center" type="submit" name="submit" value="SEND" />
	      	</div>
	    </div>

  	</form>
</div>


 <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="../script.js"></script>
</body>
</html>
