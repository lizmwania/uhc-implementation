<?php
include_once "../config/database.php";
include_once "./login_checker.php";

?>

<!DOCTYPE html>
<html>
<head>
<title>Newsportal | Add Category</title>
	
	
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
		* { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 60%;
	margin: 0px auto;
	padding: 20px;
	
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}


		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

<!-- Top Bar Start -->
 <?php include('includes/topheader.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->





            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Users </a>
                                        </li>
                                        <li class="active">
                                            Add User
                                        </li>
                                    </ol>
                                  
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        


									<?php 
// include classes
include_once '../config/database.php';
include_once '../objects/user.php';
include_once "../libs/php/utils.php";
 

 
echo "<div class='col-md-12'>";
 
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
            echo "The email you specified is already registered. Please try again ";
        echo "</div>";
    }
 
    else{
        // set values to object properties
$user->firstname=$_POST['firstname'];
$user->lastname=$_POST['lastname'];


$user->gender=$_POST['gender'];
$user->password=$_POST['password'];
$user->access_level=$_POST['user_type'];
$user->status=1;
$user->Is_Active=1;
// access code for email verification
$access_code=$utils->getToken();
$user->access_code=$access_code;

// create the user
if($user->create()){
 
    echo "<div class='alert alert-info'>";
        echo "Successfully registered the user can now log in.";
    echo "</div>";
 
    // empty posted values
    $_POST=array();
 
}else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
    }
}
?>
	<form method="post" action="add-user.php">

		

<div class="input-group">
	<label>Firstname</label>
	<input type="text" name="firstname" value="" required>
</div>
<div class="input-group">
	<label>Lastname</label>
	<input type="text" name="lastname" value="" required>
</div>
<div class="input-group">
	<label>Email</label>
	<input type="email" name="email" value=""  required>
</div>
<div class="input-group">
<label for="=gender">Gender: </label>
				<select class="form-control" name="gender">
					<option value=""></option>
					<option value="m">Male</option>
					<option value="f">Female</option>
				</select>
</div>
<div class="input-group">
	<label>User type</label>
	<select  name="user_type" id="user_type" required>
		<option value=""></option>
		<option value="Admin">Admin</option>
		<option value="Customer">Customer</option>
	</select>
</div>
<div class="input-group">
	<label>Password</label>
	<input type="password" name="password" required>
</div>

<div class="input-group">
	<button type="submit" class="btn" name="register_btn"> + Add user</button>
</div>
</form>
<?php
 

 
// include page footer HTML
include_once "layout_foot.php";
?>






        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>


	
