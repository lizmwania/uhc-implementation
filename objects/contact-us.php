<?php
include_once "../config/database.php";

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UHC | Contact us</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">

<?php 
$pagetype='contactus';
$conn= mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
      <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
  
      </h1>

    

      <!-- Intro Content -->
      <div class="row">

        <div class="col-lg-12">

          <p><?php echo $row['Description'];?></p>
        </div>
      </div>
      <!-- /.row -->
<?php } ?>
    
    </div>
    <!-- /.container -->

    <!-- Footer -->
 

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
