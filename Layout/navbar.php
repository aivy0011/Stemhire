<?php 
  $alogin = "<a href='/Stemhire/Account/logoff.php'>Log Off</a>";
  $anot = "<a href='/Stemhire/Account/login.php'>Login</a>";
  
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/Stemhire/index.php">BDPA Offer Tracking System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/Stemhire/about.php">About</a></li>
        <li><?php if(isset($_SESSION["user"])){
          echo $alogin;
          } else{
            echo $anot;
            } ?></li>
      </ul>
  </div><!-- /.container-fluid -->
</nav>