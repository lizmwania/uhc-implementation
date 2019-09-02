<?php
include_once "../config/database.php";
include_once "./login_checker.php";




?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Newsportal | Edit Sub Category</title>

        <!-- App css -->
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
                                    <h4 class="page-title">Add Sub-Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Category </a>
                                        </li>
                                        <li class="active">
                                            Add Sub-Category
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add Sub-Category </b></h4>
                                    <hr />
                        		


<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php
$showMessage='';
if(isset($_POST['sucatdescription']))
{
$subcatid=intval($_GET['scid']);    
$categoryid=$_POST['category'];
$subcatname=$_POST['subcategory'];
$subcatdescription=$_POST['sucatdescription'];
$conn = mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"update tblsubcategory set CategoryId='$categoryid',Subcategory='$subcatname',SubCatDescription='$subcatdescription' where SubCategoryId='$subcatid'");
if($query)
{
    $msg="SubCategory edited ";
    $showMessage = '<div class="alert alert-success" role="alert">
    <strong>Well done!</strong>.'.htmlentities($msg).'
    </div>';
}
else{
    $error="Something went wrong . Please try again.";
    $showMessage = '<div class="alert alert-success" role="alert">
    <div class="alert alert-danger" role="alert">
    <strong>Oh snap!</strong>'.htmlentities($error).'</div>';
    } 
    }
    echo $showMessage;
?>
</div>
</div>

<?php 
//fetching Category details
$subcatid=intval($_GET['scid']);
$conn = mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"Select tblcategory.CategoryName as catname,tblcategory.id as catid,tblsubcategory.Subcategory as subcatname,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=1 and  SubCategoryId='$subcatid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{

?>



                        			<div class="row">
                        				<div class="col-md-6">
                        					<form class="form-horizontal" name="category" method="post">
	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Category</label>
	                                                <div class="col-md-10">
	                                                  <select class="form-control" name="category" required>
                                                   <option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['catname']);?></option>
<?php
// Feching active categories
$conn = mysqli_connect("localhost","root","","php_login_system");
$ret=mysqli_query($conn,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
<?php } ?>

                                                        </select> 
	                                                </div>
	                                            </div>
	                                     



    <div class="form-group">
                                                    <label class="col-md-2 control-label">Sub-Category</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo htmlentities($row['subcatname']);?>" name="subcategory" required>
                                                    </div>
                                                </div>
                                         





	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Sub-Category Description</label>
	                                                <div class="col-md-10">
	                                   <textarea class="form-control" rows="5" name="sucatdescription" required><?php echo htmlentities($row['SubCatDescription']);?></textarea>
	                                                </div>
	                                            </div>

<?php } ?>                                                

        <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
                                                    Submit
                                                </button>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>


                        			</div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

<?php include_once 'layout_foot.php'; ?>

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
