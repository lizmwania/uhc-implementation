<?php
$db = mysqli_connect("localhost","root","","php_login_system");
if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];

	$delsql="DELETE FROM `comments` WHERE id=$id";
	if(mysqli_query($db, $delsql)){
		header("Location: viewcomments.php");
	}
}else{
	
}
?>