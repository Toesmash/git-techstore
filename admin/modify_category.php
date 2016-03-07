<?php 
  include("../functions/functions.php");
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
            <div class="panel panel-primary">
                <div class="panel panel-heading text-center"><h4>Modify category in database</h4></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                        adminCategory('category');
                    ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>


 <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="../script.js"></script>
</body>
</html>
