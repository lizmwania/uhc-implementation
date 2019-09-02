<?php 

include_once '../config/core.php';

?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" style="position:fixed;" style=" display:block;">
      <div class="container">
        <a class="navbar-brand" href="./testindex.php"><img src="images/logos.png" height="42"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href=""></a>
            </li>
                 <li class="nav-item">
              <a class="nav-link" href=""></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href=""></a>
            </li>
  
  
          </ul>

          <ul class="nav navbar-nav navbar-right">
          <?php
 include_once "./fetch.php";
 ?> 
<li>
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
    &nbsp;&nbsp;
</a>


<ul class="dropdown-menu" role="menu">

    <li><a href="./logout.php">Logout</a></li>
</ul>
</li>
</ul>
        </div>
      </div>
    

    </nav>