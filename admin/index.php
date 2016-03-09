<?php 
	session_start();
	include("../functions/functions.php");

	if(isset($_SESSION['name']) && isset($_SESSION['psswrd'])){
		$sql = 'SELECT * FROM accounts WHERE acc_email = "'.$_SESSION['name'].'"  AND acc_psswrd = "'.$_SESSION['psswrd'].'"';

		if ($run_data = mysqli_query($con, $sql)){
			$data = mysqli_fetch_assoc($run_data);

			if(mysqli_num_rows($run_data)==1){
				if($data['acc_role']=='admin'){
					// LOGGED IN AS ADMIN
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



    $id = $db = $name_of_id = $status = '';

	if(isset($_GET['id']) && isset($_GET['db']) && isset($_GET['idname']) && isset($_GET['delete'])){
	    $id = mysql_real_escape_string($_GET['id']);
	    $db = mysql_real_escape_string($_GET['db']);
		$name_of_id = mysql_real_escape_string($_GET['idname']);

		deleteAdmin($db,$name_of_id, $id);
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

				echo $_SESSION['name'];
				echo '<br>';
				echo $_SESSION['psswrd'];
				echo '<br>';
				echo $_SESSION['account_role'];
				echo '<br>';

			?>

		</div>
	</div>


  <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="../script.js"></script>
</body>
</html>
