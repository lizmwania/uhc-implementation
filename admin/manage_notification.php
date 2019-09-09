
<!DOCTYPE html>
<html lang="en">

<?php 

include_once "../config/database.php";

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>UHCNEWS | Notificatios</title>

        <!-- Summernote css -->
        <link href="./plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="./plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="./plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="./plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
                                    <h4 class="page-title">Manage Notifications</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Notifications </a>
                                        </li>
                                        <li class="active">
                                          Send notification
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

if(isset($_POST['submit']))
{
  //Verifying CSRF Token

$subject=$_POST['subject'];
$email=$_POST['email'];
$notification=$_POST['notification'];


$st1='1';
$conn= mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"insert into comments(comment_subject,comment_text,email,comment_status) values('$subject','$notification','$email','$st1')");

  if($query){
    $msg="notification sent successfully ";
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
                           <div class="row">        
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                  
<form name="notification" method="post" enctype="multipart/form-data">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1"> Notification Title</label>
   
     <input type="text" name="subject" id="subject" class="form-control" required>
    </div>

    <div class="form-group">
 
 <label for="exampleInputEmail1">Enter Email: (you can choose single or multiple)</label>
<select class="form-control" name="email" id="email" multiple size="5" required>
<option value=""></option>
 <?php
// Feching active categories
$conn = mysqli_connect("localhost","root","","php_login_system");
$ret=mysqli_query($conn,"select id,email from  users where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['email']);?></option>
<?php } ?>

</select> 
 </div>

    <div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Enter Notification</b></h4>
<textarea class="summernote" id="notification" name="notification"  required></textarea>
</div>
</div>
</div>


<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Send</button>
 <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        
                        
   

</div>
</div>
 
  </div>
 </body>

 <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"../objects/fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
   alert("notification send successfully");
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

<?php include('layout_foot.php');?>

<script>
var resizefunc = [];
</script>
<script language="JavaScript">
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
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

<!--Summernote js-->
<script src="./plugins/summernote/summernote.min.js"></script>
<!-- Select 2 -->
<script src="./plugins/select2/js/select2.min.js"></script>
<!-- Jquery filer js -->
<script src="./plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- page specific js -->
<script src="assets/pages/jquery.blog-add.init.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>

jQuery(document).ready(function(){

    $('.summernote').summernote({
        height: 240,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
    });
    // Select2
    $(".select2").select2();

    $(".select2-limiting").select2({
        maximumSelectionLength: 2
    });
});
</script>
<script src="./plugins/switchery/switchery.min.js"></script>

<!--Summernote js-->
<script src="./plugins/summernote/summernote.min.js"></script>




</html>





