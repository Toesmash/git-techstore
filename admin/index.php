<?php 
	session_start();
	include("../php/functions.php");

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
	  	<title>Admin Panel</title>
	  	<meta name="description" content="TECHstore">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link href="../css/bootstrap.min.css" rel="stylesheet">
	  	<link rel="stylesheet" href="css/admin_style.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>
<body>

	<!-- NAVBAR -->
	<?php include ("admin_navbar.php"); ?>
	<div class="row">
		<div class="col-md-3">
			<?php include ("admin_sidebar.php"); ?>
		</div>
		<div class="col-md-8">
			<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading special-panel">
                            <div class="row">
                                <div class="row text-center">
                                    <i class="glyphicon glyphicon-phone dashboard"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="plussize">
                                        <?php getStats("*", "products"); ?>
                                    </div>
                                    <p>Products</p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading special-panel">
                            <div class="row">
                                <div class="row text-center">
                                    <i class="glyphicon glyphicon-user dashboard"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="plussize">
                                        <?php getStats("*", "accounts"); ?>
                                    </div>
                                    <p>Accounts</p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading special-panel">
                            <div class="row">
                                <div class="row text-center">
                                    <i class="glyphicon glyphicon-barcode dashboard"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="plussize">
                                        <?php getStats("*", "orders"); ?>
                                    </div>
                                    <p>Orders!</p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading special-panel">
                            <div class="row">
                                <div class="row text-center">
                                	<i class="glyphicon glyphicon-piggy-bank dashboard"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="moneysize">
                                        <?php getStats("SUM(order_totalprice)", "orders"); ?>
                                    </div>
                                    <p>Income</p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="row">
                <iframe width="100%" allowtransparency="true" frameborder="0" class="trelloFrame" src="https://trello.com/b/hlI8Nlif.html"></iframe>
            </div>


		</div>

        </div>

	</div>


  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/internal/script.js"></script>
    <!-- <script type="text/javascript" src="jquery.githubRepoWidget.min.js"></script> -->
</body>
</html>
