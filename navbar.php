
<nav class="navbar navbar-fixed-top user_navbar" role="navigation">
    <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><strong>TECHstore</strong></a>
          </div>

        <div id="main_navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="products.php?all"><i class="glyphicon glyphicon-phone"></i></a></li>
                <!-- <li><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i></a></li> -->
            </ul>

            <?php  
              if(empty($_SESSION)){


                  echo '  
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="registration.php">Sign up</a></li>
                        <li><a id="sign_in_affix" href="javascript:;">Log in</a></li>
                    </ul>
                  ';
                include ("login_affix.php");
               }
               else{
                  $acc_id = $_SESSION['account_id'];
                  echo '
                    <ul class="nav navbar-nav navbar-right">
                        <li><p>Welcome, ';
                  echo $_SESSION['nick'];

                  //Ak ma user order v stave processing tak sa zobrazule tooltip
                  if (getOrderID($_SESSION['account_id'])==0){
                    $var = 'Shopping cart is empty';
                  }
                  else {
                    $var = getTooltip($_SESSION['account_id']);
                  }

                  echo '</p></li>
                        <li data-toggle="tooltip" title="'.$var.'" data-placement="bottom">
                          <a href="orders.php"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                        </li>

                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="glyphicon glyphicon-user"></i> <i class="caret"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="personal.php?acc_id='.$acc_id.'"><span class="glyphicon glyphicon-pencil"></span> Edit profile</a></li>
                            <li><a href="history.php"><span class="glyphicon glyphicon-tag"></span> History of orders</a></li>
                            <li><a href="accounts/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                          </ul>
                        </li>
                    </ul>
                    
                  ';
               }

            ?>

        </div>
      

    </div>

</nav>

