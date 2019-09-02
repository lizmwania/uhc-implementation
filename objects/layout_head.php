<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- set the page title, for seo purposes too -->
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Store Front"; ?></title>
 
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
 
    <!-- admin custom CSS -->
    <link href="<?php echo $home_url . "libs/css/admin.css" ?>" rel="stylesheet" />
    <link href="<?php echo $home_url . "libs/css/customer.css" ?>" rel="stylesheet" />
    
   

    <style>
   
    </style>
</head>
<body>
<div class='container'>
  <div class='content-wrapper'>
  
    <div class='row'>
      <div class='col-xs-12 col-sm-12 col-md-8 col-lg-8'>
       

      </div>
      <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4'>

        

      </div>
    </div>
  </div>
</div>
    <!-- include the navigation bar -->
   
 
    <!-- container -->
    <div class="container">
 
        <?php
        // if given page title is 'Login', do not display the title
        if($page_title!="Login"){
        ?>
        <div class='col-md-12'>
            <div class="page-header">
                <h1>Login or Sign Up to UHC Implementation</h1>
            </div>
        </div>
        <?php
        }
        ?>