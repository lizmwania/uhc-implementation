

<?php
include_once "../objects/user.php";
include_once "../config/core.php";
 
// check if logged in as admin
include_once "login_checker.php";
 
// include classes
include_once '../config/database.php';
// include page header HTML

 
$db = mysqli_connect("localhost","root","","php_login_system");

$sql = "SELECT * FROM comments";
$res = mysqli_query($db, $sql);
$page_title= '';

// include page header HTML
include_once "layout_head.php";

// set page title
$page_title = "View Comments";

$r = mysqli_fetch_assoc($res);

$id = $r['id'];
$name = $r['name'];
$subject = $r['subject'];
$submittime = $r['submittime'];

$status = $r['status'];

echo "<table class='table table-hover table-responsive table-bordered'>";

?>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="panel panel-default">
	<div class="panel-heading">Comments</div>
	<table class="table table-striped"> 
		<thead> 
			<tr> 
				<th scope="row">Comment ID</th> 
				<th>Name</th> 
				<th>Comment</th> 
				<th>Time</th> 
				<th>Status</th> 
				<th>Operations</th> 
			</tr> 
		</thead> 
		<tbody> 
			<tr> 
				
			
			</tr>

			<?php
while ( $r = mysqli_fetch_assoc($res)) {
	extract($r);	

?>
	<tr> 
		<td><?php echo $r['id']; ?></td> 
		<td><?php echo $r['name'] ?></td> 
		<td><?php echo $r['subject']; ?></td> 
		<td><?php echo $r['submittime']; ?></td> 
		<td><?php if(isset($r['status']) & !empty($r['status'])){echo $r['status'];}else{echo "NA";} ?></td> 
		<td><a href="editcomment.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="commentstatus.php?id=<?php echo $r['id']; ?>&status=publish">App</a> <a href="commentstatus.php?id=<?php echo $r['id']; ?>&status=draft">Dis</a> <a href="delcomment.php?id=<?php echo $r['id']; ?>">Del</a></td> 
	</tr>
	 
<?php } ?>

<?php
if(isset($_GET) & !empty($_GET)){
	if((isset($_GET['id']) & !empty($_GET['id'])) & (isset($_GET['status']) & !empty($_GET['status']))){
		$id = $_GET['id'];
		$status = $_GET['status'];
 
		$sql = "UPDATE comments SET status='$status' WHERE id=$id";
		$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
		if($res){
			header("location: viewcomments.php");
		}else{
		header("location: viewcomments.php");
		}
	}
}else{
	/*header('location: activities.php');*/
}
?>
		</tbody> 
	</table>
</div>
