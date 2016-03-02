<!DOCTYPE html>
<?php 
	include("../functions/functions.php");
	
	if(isset($_POST['submit'])){
		insert("2");
	}

?>
<html>
<head>
	<meta charset='utf-8'>
	<title>TECHstore - Admin</title>
	<meta name="description" content="TECHstore"> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<link rel="stylesheet" href="styles/admin_style.css">

</head>
<body>

	<!-- NAVBAR -->
	<?php include ("admin_navbar.php"); ?>
	<div class="row">
		<div class="col-md-3">
			<?php include ("admin_sidebar.php"); ?>
		</div>
	<div class="col-md-8">
		<div class="page-header"><h1>Add new category!</h1></div>
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
			    <div class="form-group">
			      	<label class="control-label col-sm-2">Category name:</label>
			      	<div class="col-sm-8">
			        	<input type="text" class="form-control" name="cat_name" required>
			      	</div>
			    </div>

			    <div class="form-group">
			    	<div class="row">
			    		<div class="col-sm-2"></div>
			      		<div class="col-sm-8">
			        		<input class=" btn btn-primary btn-block text-center" type="submit" name="submit" value="Submit" />
			      		</div>
			      	</div>
			    </div>

		 </form>
	
	</div>
</div>

  <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>