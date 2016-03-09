<?php 
	session_start();
	include("../functions/functions.php");

	if(isset($_SESSION['name']) && isset($_SESSION['psswrd'])){
		$sql = 'SELECT * FROM accounts WHERE acc_email = "'.$_SESSION['name'].'"  AND acc_psswrd = "'.$_SESSION['psswrd'].'"';

		if ($run_data = mysqli_query($con, $sql)){
			$data = mysqli_fetch_assoc($run_data);

			if(mysqli_num_rows($run_data)==1){
				if($data['acc_role']=='admin'){
					
				}
				else {
					header('Location: ../index.php');
				}
			}
			else {
					header('Location: ../index.php');
			}
		}
		else {
			header('Location: ../index.php');
		}
	}
	else {
		header('Location: ../index.php');
	}

	$status;
	
	if($_GET['action'] =='addproduct'){
		$status=1;
	}

	else if($_GET['action']=='addcategory'){
	    $status=2;
	}

	else if($_GET['action']=='addbrand'){
	    $status=3;
	}

	if(isset($_POST['insertproduct'])){
		insert("1");
	}

	else if(isset($_POST['insertcategory'])){
		insert("2");
	}
	else if(isset($_POST['insertbrand'])){
		insert("3");
	}

?>
<!DOCTYPE html>
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
	<script src="script.js"></script>

</head>
<body>

	<!-- NAVBAR -->
	<?php include ("admin_navbar.php"); ?>
	<div class="row">
		<div class="col-md-3">
			<?php include ("admin_sidebar.php"); ?>
		</div>
	<div class="col-md-8">

	<?php  
		if($status==1){
			echo'
				<div class="page-header"><h1>Add new product to the database!</h1></div>
					<form class="form-horizontal" method="post" enctype="multipart/form-data">
					    <div class="form-group">
					      	<label class="control-label col-sm-2">Product name:</label>
					      	<div class="col-sm-8">
					        	<input type="text" class="form-control" name="pro_name" required>
					      	</div>
					    </div>

					    <div class="form-group">
					    	<label class="control-label col-sm-2">Category:</label>
					      	<div class="col-sm-8">
					        	<select class="form-control" name="pro_cat">
					        	<option>Select category</option>
					        	';
					        		listData(category, cat_name, cat_id);
					        	echo '
								</select>
					      	</div>
					    </div>

					    <div class="form-group">
					      	<label class="control-label col-sm-2">Brand:</label>
					      	<div class="col-sm-8">
					        	<select class="form-control" name="pro_brand" required>
					        	<option>Select brand</option>
					        	';
					        		listData(brands, brand_name, brand_id);
					        	echo '
								</select>
					      	</div>
					    </div>

					    <div class="form-group">
						        <label class="control-label col-sm-2">Price (with tax):</label>
						        <div class="col-sm-8">
						            <input type="number" class="form-control" min="0" step="1" name="pro_price" required>
						        </div>
				    	</div>

					    <div class="form-group">
					    	<label class="control-label col-sm-2">Picture:</label>
					      	<div class="col-sm-8">
					        	<label class="file">
									<input type="file" id="file" name="pro_image">
								</label>
					      	</div>
					    </div>

					    <div class="form-group">
					    	<label class="control-label col-sm-2">Description:</label>
					      	<div class="col-sm-8">
					      		<textarea class = "form-control" rows = "3" name="pro_desc"></textarea>
					      	</div>
					    </div>

					    <div class="form-group">
					      	<label class="control-label col-sm-2">Keywords:</label>
					      	<div class="col-sm-8">
					        	<input type="text" class="form-control" name="pro_keywords"/>
					      	</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-sm-2"></div>
					      		<div class="col-sm-8">
					        		<input class=" btn btn-primary btn-block text-center" type="submit" name="insertproduct" value="Submit" />
					      		</div>
					      	</div>
					    </div>

				 </form>
			';

		}

		else if($status==2){
			echo '
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
					        		<input class=" btn btn-primary btn-block text-center" type="submit" name="insertcategory" value="Submit" />
					      		</div>
					      	</div>
					    </div>

				 	</form>
			';

		}

		else if($status==3){
			echo '
				<div class="page-header"><h1>Add new brand!</h1></div>
					<form class="form-horizontal" method="post" enctype="multipart/form-data">
					    <div class="form-group">
					      	<label class="control-label col-sm-2">Brand name:</label>
					      	<div class="col-sm-8">
					        	<input type="text" class="form-control" name="brand_name" required>
					      	</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-sm-2"></div>
					      		<div class="col-sm-8">
					        		<input class=" btn btn-primary btn-block text-center" type="submit" name="insertbrand" value="Submit" />
					      		</div>
					      	</div>
					    </div>

				 </form>
			';


		}

	?>

		
	
	</div>
</div>

 <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="../script.js"></script>
</body>
</html>