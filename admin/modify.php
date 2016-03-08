<?php 
  include("../functions/functions.php");
    $category_id = -1;
    $status;

  if($_GET['action'] =='changeproduct'){

    $status=1;
  }

  else if($_GET['action']=='changecategory'){
    $status=2;
  }

  else if($_GET['action']=='changebrand'){
    $status=3;
  }

  if(isset($_POST['ctgry'])){
    $category_id = $_POST['ctgry_id'];
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
        <div class="col-md-8 ">
          
        <?php 
          if($status == 1){
            echo '
              <div class="row selectCategory">
                <form class="form" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="col-md-4">
                      <select class="form-control" name="ctgry_id">
                      <option>Vyber z kategorie</option>
                      '; 
                        listData(category, cat_name, cat_id);
                      echo '
                      </select>
                    </div>
                    <div class="col-md-2">
                      <input class=" btn btn-primary btn-block text-center" type="submit" name="ctgry" value="Submit">
                    </div>
                  </div>
                </form>
              </div>


            <div class="panel panel-primary">
                <div class="panel panel-heading text-center"><h4>Modify products in database</h4></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    ';
                      if ($category_id > 0) {
                        adminFetchTable($category_id, 'products', 0);
                      }
                    echo '
                    </tbody>
                  </table>
                </div>
            </div>
            ';

          }

          else if($status == 2){
            echo '
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
                    ';  
                      adminFetchTable(0,'category', 0);
            echo '
                    </tbody>
                  </table>
                </div>
              </div>
            ';
            
          }

          else if($status == 3){
            echo '
              <div class="panel panel-primary">
                <div class="panel panel-heading text-center"><h4>Modify brands in the database content</h4></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Brand ID</th>
                        <th>Brand name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    '; 
                      adminFetchTable(0,'brands', 0);
            echo'
                    </tbody>
                  </table>
                </div>
              </div>
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
