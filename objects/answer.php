<?php 
include_once "../config/database.php";
include_once "./login_checker.php";
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="./css/modern-business.css" rel="stylesheet">
<style>
h3 {
  background-color: powderblue;
  font-family: courier;
  font-size: 160%;
}




</style>
  </head>

  <body>

    <!-- Navigation -->
   <?php //include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->

	  
<!---question Section --->

 <div class="row" style="margin-top: -8%">
   <div class="col-md-8">
<div class="card my-4">
            <h5 class="card-header">post answer:</h5>
            <div class="card-body">
              <form name="Question" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>


<div class="form-group">
                  <textarea class="form-control" name="question" rows="3" placeholder="Ask your Question" required></textarea>
                </div>



         <div class="form-group">

                  <textarea class="form-control" name="question" rows="3" placeholder="Ask your Question" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </div>

  <!---question Display Section --->