<?php 
  $wrong_password = '';
  include("functions/functions.php");

  if(isset($_POST['reg_submit'])){

    if($_POST['reg_psswrd'] == $_POST['reg_psswrdchck']){
      insert("4");
    }
    else {
      $wrong_password ='<div class="alert alert-danger text-center" role="alert">
              <strong>Error!</strong> Passwords do not match!
            </div>
            <script>
              window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                      $(this).remove(); 
                  });
                }, 5000);
            </script>
      ';
    }
    
    
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>TECHstore</title>
	<meta name="description" content="TECHstore"> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">




</head>
<body>
  <div class="container-fluid">
    <?php include ("navbar.php"); ?>


    <!-- HEADER  -->
    <div class="row" id="header">
      <div class="jumbotron reg_jumb">
        <h1>Welcome</h1>
        <p>Only a few steps and you can start shopping!</p>
      </div>   
    </div>

    <?php if ($wrong_password != '')echo $wrong_password; ?>
    

    <div class="row reg_customer">
      <div class="col-md-push-0 col-md-10 col-md-push-2">
      <form class="form-horizontal" role="form" method="post" action="registration.php">
          <!-- USERNAME -->
          <div class="form-group">
            <label class="control-label col-sm-4" for="fusername">Username:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="fusername" placeholder="Enter username" name="reg_username" required>
            </div>
          </div>

          <!-- NAME -->
          <div class="form-group">
            <label class="control-label col-sm-4" for="fname">Name:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="fname" placeholder="Enter name" name="reg_name" required>
            </div>
        
          <!-- SURNAME -->
            <label class="control-label col-sm-2" for="fsurname">Surname:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="fsurname" placeholder="Enter surname" name="reg_surname" required>
            </div>
          </div>

          <!-- EMAIL -->
          <div class="form-group">
            <label class="control-label col-sm-4" for="femail">E-mail address:</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="femail" placeholder="Enter email" name="reg_email" required>
            </div>
          </div>

          <!-- PASSWORD -->
          <div class="form-group">
              <label class="control-label col-sm-4" for="fpsswrd">Password:</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="fpsswrd" name="reg_psswrd" required>
              </div>
          </div>

          <!-- PASSWORD CHECK -->
          <div class="form-group">
              <label class="control-label col-sm-4" for="fpsswrdchck">Password Check:</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="fpsswrdchck" name="reg_psswrdchck" required>
              </div>
          </div>

          <!-- PHONE -->
          <div class="form-group">
              <label class="control-label col-sm-4" for="fphone">Phone number:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="fphone" placeholder="Enter phone number" name="reg_phone">
              </div>
          </div>

           <!-- CITY -->
          <div class="form-group">
            <label class="control-label col-sm-4" for="fcity">City:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="fcity" placeholder="Enter city" name="reg_city">
            </div>
        
          <!-- COUNTRY -->
            <label class="control-label col-sm-2" for="disabledTextInput">Country:</label>
            <div class="col-sm-3">
              <input class="form-control" id="disabledTextInput" type="text" value="Slovakia" readOnly="true" placeholder="Slovakia" name="reg_country">
            </div>
          </div>

          <!-- STREET -->
          <div class="form-group">
            
            <label class="control-label col-sm-4" for="fstreet">Street:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="fstreet" placeholder="Enter street name" name="reg_street">
            </div>

          <!-- PSC -->
            <label class="control-label col-sm-2" for="fpsc">Postal code:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="fpsc" type="text" placeholder="Enter psc" name="reg_psc">
            </div>
          </div>
          <div class="row">
            <div class="col-md-push-4 col-md-8">
            <button type="submit" id="fsubmit" name="reg_submit"  class="btn btn-primary btn-block">Submit</button>
            <!-- <input class=" btn btn-primary btn-block text-center" type="submit" name="reg_submit" value="Submit"/> -->
            </div>
          </div>
      </form>
      </div>
    </div>
   </div> <!--Container -->

  <script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>
</html>



