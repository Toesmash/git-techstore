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

    $id = $db = $name_of_id = '';

	if(isset($_GET['id']) && isset($_GET['db']) && isset($_GET['idname'])){
		$id = mysql_real_escape_string($_GET['id']);
		$db = mysql_real_escape_string($_GET['db']);
		$name_of_id = mysql_real_escape_string($_GET['idname']);

	}


  	if(isset($_POST['update_product'])){
  		update("1");
	}

	if(isset($_POST['update_category'])){
  		update("2");
	}

	if(isset($_POST['update_brand'])){
  		update("3");
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
    	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	</head>
<body>

	<!-- NAVBAR -->
	<?php include ("admin_navbar.php"); ?>
	<div class="row">
		<div class="col-md-3">
			<?php include ("admin_sidebar.php"); ?>
		</div>
		<div class="col-md-8">
			<div class="page-header"><h1>Update record in database!</h1></div>
			<?php  
				// kedze tu sa to lisi len v $name_of_id tak nemusim ani if-else statementy davat.
				updateAdmin($db,$name_of_id, $id);
			?>
			
		</div>
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/internal/script.js"></script>
</body>
</html>
