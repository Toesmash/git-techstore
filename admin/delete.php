<?php 
  include("../functions/functions.php");
    $id;
    $db;
    $name_of_id;
    $status;

  if(isset($_GET['id']) && isset($_GET['db']) && isset($_GET['idname'])){
    $id = mysql_real_escape_string($_GET['id']);
    $db = mysql_real_escape_string($_GET['db']);
    $name_of_id = mysql_real_escape_string($_GET['idname']);

  }

  if(isset($_GET['delete'])){
    deleteAdmin($db,$name_of_id, $id);
  }

  if($_GET['action'] =='deleteproduct'){
    $category_id = $_GET['category_id'];
    $status=1;
  }

  else if($_GET['action']=='deletecategory'){
    $status=2;
  }

  else if($_GET['action']=='deletebrand'){
    $status=3;
  }
  
 ?>
 

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>TECHstore - Admin</title>
    <meta name="description" content="TECHstore"> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
          <!-- <div class="page-header"><h1>Delete record from database!</h1></div> -->
          
           <?php 
          if($status == 1){
            echo '
            <div class="panel panel-danger">
                <div class="panel panel-heading text-center"><h3 style="color: red;">Are you sure you want to delete this item?</h3><p><strong>DANGER!</strong> This action is irreversible!!!</p></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody>
                    ';
                        adminFetchTable($category_id, $db, $id);
                      
                    echo '
                    </tbody>
                  </table>
                </div>
            </div>
            ';

          }

          else if($status == 2){
            echo '
              <div class="panel panel-danger">
                <div class="panel panel-heading text-center"><h3 style="color: red;">Are you sure you want to delete this category?</h3><p><strong>DANGER!</strong> This action is irreversible!!!</p></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Category ID</th>
                        <th>Name</th>
                      </tr>
                    </thead>
                    <tbody>
                    ';  
                      adminFetchTable(0, $db, $id);
            echo '
                    </tbody>
                  </table>
                </div>
              </div>
            ';
            
          }

          else if($status == 3){
            echo '
              <div class="panel panel-danger">
                <div class="panel panel-heading text-center"><h3 style="color: red;">Are you sure you want to delete this brand?</h3><p><strong>DANGER!</strong> This action is irreversible!!!</p></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Brand ID</th>
                        <th>Brand name</th>
                      </tr>
                    </thead>
                    <tbody>
                    '; 
                      adminFetchTable(0, $db, $id);
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


  <script src="../script.js"></script>
</body>
</html>
