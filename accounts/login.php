<?php 
	session_start();
	include ('../php/functions.php');

	if(isset($_POST['login_run'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){
			$get_username = mysqli_real_escape_string($con, $_POST['username']);
			$get_password = mysqli_real_escape_string($con, $_POST['password']);

			$sql = 'SELECT * FROM accounts WHERE acc_email="'.$get_username.'" AND acc_psswrd="'.$get_password.'"';
			echo $sql;
			


			
			if($handshake = mysqli_query($con, $sql)) {
				if( mysqli_num_rows($handshake) == 1) {
					$data = mysqli_fetch_assoc($handshake);

					$_SESSION['name']=$get_username;
					$_SESSION['psswrd']=$get_password;
					$_SESSION['account_role']=$data['acc_role'];
					$_SESSION['nick']=$data['acc_username'];
					$_SESSION['account_id']=$data['acc_id'];

					
					header('Location: ../admin/index.php'); 
					
				}
				else {
					header('Location: ../index.php?login_error=wrong_submit');
				}
			}

			else {
				header('Location: ../index.php?login_error=query_error');
			}
		}

		else {
			header('Location: ../index.php?login_error=empty_submit');
		}
	}
	else {

		print_r($_POST);
	}

?> 

<!DOCTYPE html>
<html>
<head>
	<title>BLA</title>
</head>
<body>
</body>
</html>