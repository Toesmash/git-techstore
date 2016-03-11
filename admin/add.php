<?php 
	session_start();
	include("../php/functions.php");

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
	  	<title>Admin Panel</title>
	  	<meta name="description" content="TECHstore">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link href="../css/bootstrap.min.css" rel="stylesheet">
	  	<link rel="stylesheet" href="css/admin_style.css">
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

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/internal/script.js"></script>
</body>
</html>