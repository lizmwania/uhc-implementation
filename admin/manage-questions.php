<?php
include_once "../config/database.php";
include_once "./login_checker.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title> | Manage Comments</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="./plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

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
                                    <h4 class="page-title">Manage Question</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Questions </a>
                                        </li>
                                        <li class="active">
                                          Approved 
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
$showMessage='';
$action = isset($_GET['action']) ? $_GET['action'] : "";
$appid = isset($_GET['appid']) ? $_GET['appid'] : "";
$dsid = isset($_GET['dsid']) ? $_GET['dsid'] : "";
$rid = isset($_GET['rid']) ? $_GET['rid'] : "";
if($dsid)
{
    $id=intval($_GET['disid']);
    $conn = mysqli_connect("localhost","root","","php_login_system");
	$query=mysqli_query($conn,"update question set status='1' where question_id='$id'");
    $msg="question approved ";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($msg).'
</div>';
}
// Code for restore
if($appid)
{
    $id=intval($_GET['appid']);
    $conn = mysqli_connect("localhost","root","","php_login_system");
	$query=mysqli_query($conn,"update question set status='0' where question_id='$id'");
    $msg="question unapproved";
    $showMessage = '<div class="alert alert-success" role="alert">
<strong>Well done!</strong>.'.htmlentities($msg).'
</div>';
}

// Code for deletion
if($action=='rep' && $rid)
{
    $id=intval($_GET['rid']);
    $conn = mysqli_connect("localhost","root","","php_login_system");
	$query=mysqli_query($conn,"insert into question  where question_id='$id'");
    $delmsg="question deleted forever";
    
}
echo $showMessage;
 ?>

</div>

  <div class="row">
										<div class="col-md-12">
											<div class="demo-box m-t-20">

												<div class="table-responsive">
                                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> Name</th>
                                                                <th>Email Id</th>
                                                                <th width="300">Question</th>
                                                                 <th>Status</th>
                                                                <th>Category</th>
                                                                <th>Posting Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$conn = mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"Select question.status, question.question_id,  question.name,question.email,question.datetime,question.QuestionDetail,question.question_id as postid,tblcategory.CategoryName from  question join tblcategory on tblcategory.id=question.CategoryId where question.status=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['name']);?></td>
<td><?php echo htmlentities($row['email']);?></td>
<td><?php echo htmlentities($row['QuestionDetail']);?></td>
<td>
    <?php
$st = isset($_GET['status']) ? $_GET['status'] : "";


$st=$row['status'];
if($st=='0'):
echo "Wating for approval";
else:
echo "Approved";
endif;
?></td>


<td><a href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>"><?php echo htmlentities($row['CategoryName']);?></a> </td>
<td><?php echo htmlentities($row['datetime']);?></td>
<td>
<?php if($st==0):?>
    <a href="manage-questions.php?disid=<?php echo htmlentities($row['question_id']);?>" title="Disapprove this question"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a> 
<?php else :?>
  <a href="manage-questions.php?appid=<?php echo htmlentities($row['question_id']);?>" title="Disapprove this question"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a> 
<?php endif;?>
&nbsp;<a href="manage-answers.php?rid=<?php echo htmlentities($row['question_id']);?>&action=rep"> <i class="fa fa-reply" style="font-size:24px; color: blue;"></i></a> </td>



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
                                    <!--- end row -->
                 
<div class="row">
<div class="col-md-12">
<div class="demo-box m-t-20">
<div class="m-b-30">


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
