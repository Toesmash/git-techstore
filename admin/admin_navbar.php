    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin_navbar" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-cog"></span><strong> Admin Panel</strong></a>
        </div>


        <div id="admin_navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="../accounts/logout.php"><i class="glyphicon glyphicon-home"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../accounts/logout.php">Log Out</a></li>
            </ul>
        </div>



      </div>
    </div>

<?php include ("../login_affix.php"); ?>