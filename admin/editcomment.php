<!DOCTYPE html>
<html lang="en">
<head> 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include_once "../config/database.php";
?>

<?php
if(isset($_GET['id']) & !empty($_GET['id'])){
	//select query
	$id = $_GET['id'];
	$selsql = "SELECT * FROM comments WHERE id=$id";
	$selres = mysqli_query($connection, $selsql);
	$selr = mysqli_fetch_assoc($selres);
	if(mysqli_num_rows($selres) <= 1){
		//redirect to main comments page
	}
}else{
	//redirect to main comments page
}
?>

<div class="panel panel-default">
  <div class="panel-body">
  	<form method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Name</label>
		
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Title">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">EMail</label>
	    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Comment</label>
	    <textarea name="subject" class="form-control" rows="6"></textarea>
	  </div>
	  <div class="form-group">
		  <div class="row">
				<div class="col-md-6">
				<label>Post Status</label>
					<select name="status" multiple class="form-control">
					  <option value="draft">Draft</option>
					  <option value="published">Published</option>
					</select>
				</div>
			  </div>
		  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
  </div>
  <?php
 if(isset($_POST) & !empty($_POST)){
	//print_r($_POST);
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$subject = mysqli_real_escape_string($connection, $_POST['subject']);
	$status = $_POST['status'];
 
	$sql = "UPDATE comments SET name='$name', email='$email', subject='$subject', status='$status' WHERE id=$id";
	$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
	//$lid = mysqli_insert_id($connection);
	if($res){
		$smsg = "Comment updated Successfully";
		header("location: editcomment.php?id=$id");
	}else{
		$fmsg = "Failed to update Comment";
	}
} 
 
 ?>
 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
</div>
</body>
</html>