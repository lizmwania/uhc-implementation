<?php
// check if logged in as admin
include_once "login_checker.php";
 
// include classes
include_once '../config/database.php';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title> | Manage Users</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="./plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
<?php include('includes/topheader.php');?>

    <!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php');?>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Manage Users</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="#">Admin</a>
                                </li>
                                <li>
                                    <a href="#">Users </a>
                                </li>
                                <li class="active">
                                   Manage Users
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


<div class="row">
<div class="col-sm-6">  



<?php


// to prevent undefined index notice
$showMessage='';
$action = isset($_GET['action']) ? $_GET['action'] : "";
$usid = isset($_GET['usid']) ? $_GET['usid'] : "";
$resid = isset($_GET['resid']) ? $_GET['resid'] : "";

if($action=='del' && 'usid' )
{

    $id=intval($_GET['usid']);
    $conn = mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
	$query=mysqli_query($conn,"update users set Is_Active='0' where id='$id'");
    $msg="user deleted ";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($msg).'
</div>';
}
// Code for restore
if($resid)
{
    $id=intval($_GET['resid']);
    $conn = mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
	$query=mysqli_query($conn,"update users set Is_Active='1' where id='$id'");
    $msg="user restored successfully";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($msg).'
</div>';
}

// Code for Forever deletionparmdel
if($action=='parmdel' && $_GET['usid'])
{
    $id=intval($_GET['usid']);
    $conn = mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
	$query=mysqli_query($conn,"delete from  users  where id='$id'");
    $delmsg="User deleted forever";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($delmsg).'
</div>';
}

echo $showMessage;
?>
</div>
                           
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="demo-box m-t-20">
<div class="m-b-30">
<a href="add-user.php">
<button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
</a>
</div>

                                       <div class="table-responsive">
                                           <table class="table m-0 table-colored-bordered table-bordered-primary">
                                               <thead>
                                                   <tr>
                                                       <th>#</th>
                                                       <th> Name</th>
                                                       <th>Email</th>
                                                 
                                                       <th>Gender</th>
                                                         <th>Access Level</th>
                                                       <th>Action</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
<?php 
$conn = mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
$query=mysqli_query($conn,"Select id,firstname,email,gender,access_level from  users where Is_Active=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

<tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['firstname']);?></td>
<td><?php echo htmlentities($row['email']);?></td>
<td><?php echo htmlentities($row['gender']);?></td>
<td><?php echo htmlentities($row['access_level']);?></td>
<td><a href="edit-user.php?cid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
&nbsp;<a href="read_users.php?usid=<?php echo htmlentities($row['id']);?>&&action=del"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
</tr>
<?php
$cnt++;
} 
// to identify page for paging
$page_url="read_users.php?";



?>
</tbody>
                                         
                                           </table>
                                       </div>




                                   </div>

                               </div>

                   
                           </div>
                           <!--- end row -->



                           
<div class="row">
<div class="col-md-12">
<div class="demo-box m-t-20">
<div class="m-b-30">

<h4><i class="fa fa-trash-o" ></i> Deleted Users</h4>

</div>

<div class="table-responsive">
<table class="table m-0 table-colored-bordered table-bordered-danger">
                                               <thead>
                                                   <tr>
                                                       <th>#</th>
                                                       <th> Firstname</th>
                                                       <th>Email</th>
                                                 
                                                       <th>Gender</th>
                                                         <th>Access Level</th>
                                                       <th>Action</th>
                                                   </tr>
                                               </thead>
                                               <tbody>
<?php 
$conn = mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
$query=mysqli_query($conn,"Select id,firstname,email,gender,access_level from  users where Is_Active=0 ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

<tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['firstname']);?></td>
<td><?php echo htmlentities($row['email']);?></td>
<td><?php echo htmlentities($row['gender']);?></td>
<td><?php echo htmlentities($row['access_level']);?></td>
<td><a href="read_users.php?resid=<?php echo htmlentities($row['id']);?>"><i class="ion-arrow-return-right" title="Restore this category"></i></a> 
&nbsp;<a href="read_users.php?usid=<?php echo htmlentities($row['id']);?>&&action=parmdel" title="Delete forever"> <i class="fa fa-trash-o" style="color: #f05050"></i> </td>
</tr>
<?php
$cnt++;
} ?>
</tbody>
                                         
                                           </table>
                                       </div>



                                       
                                   </div>

                               </div>

                   
                           </div>                  
                   

           </div> <!-- container -->

       </div> <!-- content -->
<?php include_once "layout_foot.php";?>
   </div>

</div>
<!-- END wrapper -->




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
        <script src="./plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


                                                        
</body>
</html>