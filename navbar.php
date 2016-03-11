
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
                <li><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i></a></li>
            </ul>

            <?php  
              if(empty($_SESSION)){
                  echo '  
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="sign_in_affix" href="javascript:;" >Sign in</a></li>
                    </ul>
                  ';
                include ("login_affix.php");
               }
               else{
                  echo '
                    <ul class="nav navbar-nav navbar-right">
                        <li data-toggle="tooltip" title="FUNKCIA NA ZISKANIE POCTU POLOZIEK V OBJEDNAVKE + CENA" data-placement="bottom">
                          <a href="index.php"><i class="glyphicon glyphicon-shopping-cart"></i></a>

                        </li>

                        <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="glyphicon glyphicon-user"></i> <i class="caret"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Profile</a></li>
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



    <!-- NAVBAR -->
   <!--  <nav class="navbar navbar-fixed-top" id="my-navbar" role="navigation">
      <div class="collapse navbar-collapse" id="navbar-collapse navbar-header">
        <div class="navbar-header">
          <a href="index.php"><img src="img/logo-primary2.svg" class="navbar-brand"></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="products.php?everything">Ponuka</a>
        </ul> -->



      <!--   <?php  
           if(empty($_SESSION)){
              echo '  
                <ul class="nav navbar-nav" style="float: right">
                    <li><a id="sign_in_affix" href="javascript:;" class="navbar-nav pull-right">Sign in</a></li>
                </ul>
              ';
            include ("login_affix.php");
           }
           else{
              echo '
                <ul class="nav navbar-nav" style="float: right">
                  <li><a href="accounts/logout.php" class="navbar-nav pull-right" style="color: red;"><i class="glyphicon glyphicon-off"></i></a></li>
                </ul>
                
              ';
           }
        ?> -->

      <!-- </div>
    </nav> -->



