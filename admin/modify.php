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
                        
                        <th>ID</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Keywords</th>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/internal/script.js"></script>
</body>
</html>
