    <!-- NAVBAR -->
    <nav class="navbar navbar-fixed-top " id="my-navbar" role="navigation">
      <div class="collapse navbar-collapse" id="navbar-collapse navbar-header">
        <div class="navbar-header">
          <a href="index.php"><img src="img/logo-primary2.svg" class="navbar-brand"></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="products.php?everything">Ponuka</a>
          <li><a href="#contact"></a>
        </ul>
        <?php  
           if(empty($_SESSION)){
              echo '  
                <ul class="nav navbar-nav" style="float: right">
                    <li><a id="sign_in_affix" href="javascript:;" class="navbar-nav pull-right">Sign in</a></li>
                </ul>
              ';
           }
           else{
              echo '
                <ul class="nav navbar-nav" style="float: right">
                  <li><a href="accounts/logout.php" class="navbar-nav pull-right" style="color: red;"><i class="glyphicon glyphicon-off"></i></a></li>
                </ul>
                
              ';
           }
        ?>

      </div>
    </nav>
<?php include ("login_affix.php"); ?>