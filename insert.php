<!DOCTYPE html>
<?php 
	include("functions/functions.php");
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
	<link rel="stylesheet" href="styles/admin_style.css">
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1>Insert product to table!</h1>
		<p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought.</p>
	</div>
	<form class="form-horizontal" role="form">
	    <div class="form-group">
	      <label class="control-label col-sm-2">Meno produktu:</label>
	      <div class="col-sm-4">
	        <input type="text" class="form-control">
	      </div>
	    </div>

	    <div class="form-group">
	      <label class="control-label col-sm-2">Kategoria:</label>
	      <div class="col-sm-4">
	        <select class="form-control">
	        <option>Vyber z kategorie</option>
	        	<?php 
	        		listCategory();
	        	?>
			</select>
	      </div>
	    </div>



	    <div class="form-group">
	      <label class="control-label col-sm-2">Znacka:</label>
	      <div class="col-sm-4">
	        <input type="text" class="form-control">
	      </div>
	    </div>

	    <div class="form-group">
	        <label class="control-label col-sm-2">Cena produktu</label>
	        <div class="col-sm-4">
	            <input type="number" class="form-control" min="0" step="1">
	        </div>
    	</div>

	    <div class="form-group">
	      <label class="control-label col-sm-2">Popisny obrazok:</label>
	      <div class="col-sm-4">
	        <label class="file">
				<input type="file" id="file">
			  	<span class="file-custom"></span>
			</label>
	      </div>
	    </div>
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-primary">Pridaj produkt do ponuky</button>
	      </div>
	    </div>
  	</form>
</div>


<script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/admin_js.js"></script>

</body>
</html>