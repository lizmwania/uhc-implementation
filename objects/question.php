<?php 
include_once "../config/database.php";
include_once "./login_checker.php";
//Genrating CSRF Token
$catid = isset($_GET['catid']) ? $_GET['catid'] : '1=1' ;

if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$question=$_POST['question'];
$categoryid=$_POST['category'];

$st1='0';
$conn= mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"insert into question(CategoryId,name,email,QuestionDetail,status) values('$categoryid','$name','$email','$question','$st1')");

  if($query){
    echo "<script>alert('question successfully submit. question will be display after admin review ');</script>";
    header('location:question.php?catid='.$categoryid);
    unset($_SESSION['token']);
  }
  else{
   echo  "<script>alert('Something went wrong. Please try again.');</script>";
  }
  

}
}
}
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="./css/modern-business.css" rel="stylesheet">
<style>
h3 {
  border-radius: 25px;
  
  background-position: left top;
  background-color:white;
  padding: 20px; 
  width: 300px;
  height: 90px;
  margin-top:-15%;
  margin-bottom: 40px;
}
body {
  background-color:whitesmoke;
}

</style>
  </head>

  <body>

    <!-- Navigation -->
   <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8" style="margin-top:10%;" >

          <!-- Blog Post -->

	  

  <!---question Display Section --->

 <?php 
 //Display of Category name
if($catid !=="1=1"){
$conn= mysqli_connect("localhost","root","","php_login_system");

$query=mysqli_query($conn,"select CategoryName from
tblcategory where id='$catid'");

while ($row=mysqli_fetch_array($query)) {
echo "<h3 >".$row['CategoryName']."</h3>";
}
}	

 // end of display of category name
 
 $sts=1;
$conn= mysqli_connect("localhost","root","","php_login_system");
 $query=mysqli_query($conn,"select name,QuestionDetail,datetime,question_id from  question where CategoryId='$catid' AND status='$sts'");
if($query->num_rows<1){
  echo "There is no questions";
}

 while ($row=mysqli_fetch_assoc($query)) {
	echo ' <h4>Question:</h4>
<div class="media mb-4" style="background-color:#D8D8D8; ">
<i class="fa fa-question-circle-o" aria-hidden="true" style="font-size:40px; color:blue;"></i>
            <div class="media-body"> &nbsp 
            <h6 class="mt-0">'. htmlentities($row['name']).' <br />
                  <span style="font-size:12px;"><b>at</b> &nbsp'.htmlentities($row['datetime']).'</span>
            </h6>'.htmlentities($row['QuestionDetail']).'
            </div></div>
            <div style=" border-bottom: 1px solid black; padding-bottom:20px; margin-bottom:20px">
          <h4>Answer:</h4> <br/>';
          
  $que_id = $row['question_id'];        
$conn2= mysqli_connect("localhost","root","","php_login_system");
$query2=mysqli_query($conn2,"SELECT * FROM answer WHERE question_id='$que_id'");
if($query2->num_rows<1){
 echo "<h4>" ."There is no questions, Post Your Question".  "</h4>";
}
else{
  while ($rowans=mysqli_fetch_assoc($query2)) {
    echo "<strong>".$rowans['name']."</strong><br/>";
    echo $rowans['answer_detail'];
  }
} 
 echo '</div>';
 
 
}
//$countAns = $row['answer_id'];        
//$conn2= mysqli_connect("localhost","root","","php_login_system");
//$query2=mysqli_query($conn2,"SELECT * FROM answer WHERE answer_id='$que_id'");

 ?>

        
    

<!---question Section --->

<div class="row" style="margin-top: 4%">
   <div class="col-md-8">
<div class="card my-4">
            <h5 class="card-header">Ask Question:</h5>
            <div class="card-body">
              <form name="Question" method="post">
      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
 <div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
</div>

 <div class="form-group">
 <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
 </div>

 <div class= "form-group" style="select.form-control:not([size]):not([multiple]) {
     height: none; 
}" >

<select class="form-control" name="category" id="category" required>
<option value="">Select Category </option>
<?php 
$conn = mysqli_connect("localhost","root","","php_login_system");
$ret=mysqli_query($conn,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
<option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>

	
<?php } ?>

</select>
</div>
                <div class="form-group">
                  <textarea class="form-control" name="question" rows="3" placeholder="Ask your Question" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
            </div>
          </div>

</div>
	</div>
</div>

	<div class="col-md-4" style= " float:right; margin-right:0px; " >

<!-- Search Widget -->
<div class="card mb-4" >
  <h5 class="card-header">Search</h5>
  <div class="card-body">
		 <form name="search" action="search.php" method="post">
	<div class="input-group">
 
<input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
	  <span class="input-group-btn">
		<button class="btn btn-secondary" type="submit">Go!</button>
	  </span>
	</form>
	</div>
  </div>

  

</div>

<div class="card my-4">
            <h5 class="card-header">FAQs</h5>
            <div class="card-body">
                      <ul class="mb-0">
<?php
$conn= mysqli_connect("localhost","root","","php_login_system");
$query=mysqli_query($conn,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
while ($row=mysqli_fetch_array($query)) {

?>

  <li>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                    </li>

                    
          

            <?php } ?>
          </ul>
    
      
            </div>
          </div>
</div >
    </div>
  
     
    <?php include('layout_foot.php');?>

  </body>

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
});
</script>
</html>
  