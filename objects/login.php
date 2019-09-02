<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- set the page title, for seo purposes too -->
    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Login or Sign Up"; ?></title>
 
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
 
    <!-- admin custom CSS -->
    <link href="<?php echo $home_url . "../libs/css/admin.css" ?>" rel="stylesheet" />
    <link href="<?php echo $home_url . "../libs/css/customer.css" ?>" rel="stylesheet" />
    
   

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
        $page_title=''
;        // if given page title is 'Login', do not display the title
        if($page_title!="Login"){
        ?>
        <div class='col-md-12'>
            <div class="page-header">
                <h1 style= "color:silver; text-align:center;">Login to UHC Implementation </h1>
            </div>
        </div>
        <?php
        }
        ?>




<?php
// core configuration
include_once "../config/core.php";
 



// set page title
$page_title = "Login";
 
// include login checker
$require_login=false;
include_once "./login_checker.php";
 
// default to false
$access_denied=false;
 
// if the login form was submitted
if($_POST){
   // include classes
include_once "../config/database.php";
include_once "./user.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$user = new User($db);
 
// check if email and password are in the database
$user->email=$_POST['email'];
 
// check if email exists, also get user details using this emailExists() method
$email_exists = $user->emailExists();
 
// validate login
if ($email_exists && $_POST['password']&& $user->password && $user->status==1){
 
    // if it is, set the session value to true
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user->id;
    $_SESSION['access_level'] = $user->access_level;
    $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
    $_SESSION['lastname'] = $user->lastname;
 
    // if access level is 'Admin',redirect to admin section
    if($user->access_level=='Admin'){
        header("Location: {$home_url}/admin/dashboard.php?action=login_success");
    }
 
    // else, redirect only to 'Customer' section
    else{
        header("Location: {$home_url}/objects/testindex.php?action=login_success");
    }
}
 
// if username does not exist or password is wrong
else{
    $access_denied=true;
}
}
 
// include page header HTML
include_once "./layout_head.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
   // get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";
 
// tell the user he is not yet logged in
if($action =='not_yet_logged_in'){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
}
 
// tell the user to login
else if($action=='please_login'){
    echo "<div class='alert alert-info'>
        <strong>Please login to access that page.</strong>
    </div>";
}
 
// tell the user email is verified
else if($action=='email_verified'){
    echo "<div class='alert alert-success'>
        <strong>Your email address have been validated.</strong>
    </div>";
}
 
// tell the user if access denied
if($access_denied){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>
        Access Denied.<br /><br />
        Your username or password maybe incorrect
    </div>";
}
 
    // actual HTML login form
    echo "<div class='account-wall'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";
                echo "<img class='profile-img' src='../images/login-icon.png'>";
                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<input type='text' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='password' class='form-control' placeholder='Password' required />";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                    echo "<div class='margin-1em-zero text-align-center'>
    <a href='forgot_password.php'>Forgot Password?</a><br>
    <a href='register.php'>Sign Up?</a>
</div>";
                echo "</form>";

            echo "</div>";
        echo "</div>";
    echo "</div>";
 
echo "</div>";
 

?>