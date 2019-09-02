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
        $page_title='';
        // if given page title is 'Login', do not display the title
        if($page_title!="Login"){
        ?>
        <div class='col-md-12'>
            <div class="page-header">
                <h1 style= "color:silver; text-align:center;">Sign Up to UHC Implementation </h1>
            </div>
        </div>
        <?php
        }
        ?>


<?php
// core configuration
include_once "../config/core.php";
 
// set page title
$page_title = "Register";
 
// include login checker
include_once "./login_checker.php";
 
// include classes
include_once '../config/database.php';
include_once 'user.php';
include_once "../libs/php/utils.php";
 

 
echo "<div class='col-md-3'></div><div class='col-md-6'>";
 
   // if form was posted
if($_POST){

    
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $user = new User($db);
    $utils = new Utils();
 
    // set user email to detect if it already exists
    $user->email=$_POST['email'];
 
    // check if email already exists
    if($user->emailExists()){
        echo "<div class='alert alert-danger'>";
            echo "The email you specified is already registered. Please try again or <a href='{$home_url}/objects/login.php'>login.</a>";
        echo "</div>";
    }
 
    else{
        // set values to object properties
$user->firstname=$_POST['firstname'];
$user->lastname=$_POST['lastname'];
$user->gender=$_POST['gender'];

$user->password=$_POST['password'];
$user->access_level='Customer';
$user->status=1;
$user->Is_Active=1;
// access code for email verification
$access_code=$utils->getToken();
$user->access_code=$access_code;
/*function getToken($length=32){
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for($i=0;$i<$length;$i++){
        $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
    }
    return $token;
}
 
function valid_email($email) {
    return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}$/i', $email);
}
// Example
if( valid_email("nobody@example.com") ) echo "Valid"; else echo "Invalid";
function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 0) return $min; // not so random...
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}*/


// create the user
//if($user->create()){
 
    // send confimation email
 /*   $send_to_email=$_POST['email'];
    $body="Hi {$send_to_email}.<br /><br />";
    $body.="Please click the following link to verify your email and login: {$home_url}verify/?access_code={$access_code}";
    $subject="Verification Email";
 
    if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
        echo "<div class='alert alert-success'>
            Verification link was sent to your email. Click that link to login.
        </div>";
    }
 
    else{
        echo "<div class='alert alert-danger'>
            User was created but unable to send verification email. Please contact admin.
        </div>";
    }
 
    // empty posted values
    $_POST=array();
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}*/
// create the user
if($user->create()){
 
    echo "<div class='alert alert-success'>";
        echo "Successfully registered. <a href='{$home_url}/objects/login.php'>Please login</a>.";
    echo "</div>";
 
    // empty posted values
    $_POST=array();
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
    }
}
?>
<form action='register.php' method='post' id='register'>
 
    <table class='table table-responsive'>
 
        <tr>
            <td class='width-30-percent'>Firstname</td>
            <td><input type='text' name='firstname'placeholder="Enter Firstname" class='form-control' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td>Lastname</td>
            <td><input type='text' name='lastname' placeholder="Enter Lastname" class='form-control' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>

        <tr>
    <td>Gender</td>
    <td>
    <select class='form-control' required name="gender">
    <option selected='selected' disabled>Choose one</option>
    <option value="f" > Female</option>
    <option value="m">Male</option>
     
      </select>
    </td>
  </tr>
       
        <tr>
            <td>Email</td>
            <td><input type='email' name='email' placeholder="your@email.com" class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' placeholder="Enter Password" class='form-control' required id='passwordInput'></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
            <div style="text-align:left; margin-top:20px;">
    <p>By signing up to UHC Implementation, you agree the<a href="terms.php"> Terms of Sevice.</a></p>
    <p>To learn more how UHC Implementation  collects, uses, shares and protects your data <br/>please read UHC's <a href="policy.php">Privacy Policy</a></p>
</div>
                <button type="submit" class="btn btn-primary">
                    <span class=""></span> Sign Up 
                </button>
                <div style="margin-top:30px;">
               <p><a href="login.php"> I am already member</a></p>
                </div>
            </td>
        </tr>
 
    </table>
</form>

<?php

 
echo "</div>";
 

?>