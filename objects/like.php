<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
// if user clicks like or dislike button
//$nid = isset($_GET['nid']) ? $_GET['nid'] : header("location:testindex.php");
	if (isset($_POST['action'])) {
        $user_id= $_SESSION['user_id'] ;
		$post_id = $_POST['post_id'];
		//$post_id=intval($_GET['nid']);
		$action = $_POST['action'];
		switch ($action) {
			case 'like':
				$sql = "INSERT INTO rating_info (user_id, post_id, rating_action) 
					 		VALUES ($user_id, $post_id, 'like') 
					 		ON DUPLICATE KEY UPDATE rating_action='like'";
				break;
			case 'dislike':
				$sql  = "INSERT INTO rating_info (user_id, post_id, rating_action) 
					 		VALUES ($user_id, $post_id, 'dislike') 
					 		ON DUPLICATE KEY UPDATE rating_action='dislike'";
				break;
			case 'unlike':
				$sql = "DELETE FROM rating_info 
							WHERE user_id=$user_id 
							AND post_id=$post_id";
				break;
			case 'undislike':
				$sql = "DELETE FROM rating_info 
							WHERE user_id=$user_id 
							AND post_id=$post_id";
				break;
			default:
				break;
		}
        // execute query to effect changes in the database ...
        $conn= mysqli_connect("localhost","root","","php_login_system");
		mysqli_query($conn, $sql);
		echo getRating($post_id);
		exit(0);
	}
	$sql = "SELECT * FROM tblposts";
	$conn= mysqli_connect("localhost","root","","php_login_system");
	$result = mysqli_query($conn, $sql);
	// fetch all posts from database
	// return them as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	function getLikes($post_id)
	{
		$conn= mysqli_connect("localhost","root","","php_login_system");
		$sql = "SELECT COUNT(*) as counted
					FROM rating_info 
					WHERE post_id = $post_id 
					 AND rating_action='like'";
		$rs = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($rs);
		if (userLiked($post_id)){
			echo '<i class="fa fa-2x fa-thumbs-up like-btn" data-id="'.$post_id.'"></i>&nbsp;';
		 
		}
		else{
			echo '<i class="fa fa-2x fa-thumbs-o-up like-btn" data-id="'.$post_id.'"></i>&nbsp;';
		}
		echo "<span class='likes'>".$result['counted']."</span>";
	}
	function getDislikes($post_id)
	{
		$conn= mysqli_connect("localhost","root","","php_login_system");
		$sql = "SELECT COUNT(*) 
					FROM rating_info 
					WHERE post_id = $post_id 
					 AND rating_action='dislike'";
		$rs = mysqli_query($conn, $sql);
		$result = mysqli_fetch_array($rs);
		if (userDisliked($post_id)){
			echo '<i class="fa fa-2x fa-thumbs-down dislike-btn" data-id="'.$post_id.'"></i>&nbsp;';
		 
		}
		else{
			echo '<i class="fa fa-2x fa-thumbs-o-down dislike-btn" data-id="'.$post_id.'"></i>&nbsp;';
		}
		echo "<span class='dislikes'>".$result[0]."</span>";
	}
	//get total number of likes and likes in a particular post
	function getRating($post_id)
	{
		$conn= mysqli_connect("localhost","root","","php_login_system");
		$rating = array();
		$likes_query = "SELECT COUNT(*) 
					FROM rating_info 
					WHERE post_id = $post_id 
					 AND rating_action='like'";
		$dislikes_query = "SELECT COUNT(*) 
					FROM rating_info 
					WHERE post_id = $post_id 
					 AND rating_action='dislike'";
		$likes_rs = mysqli_query($conn, $likes_query);
		$dislikes_rs = mysqli_query($conn, $dislikes_query);
		$likes = mysqli_fetch_array($likes_rs);
		$dislikes = mysqli_fetch_array($dislikes_rs);
		$rating = [
			'likes' => $likes[0],
			'dislikes' => $dislikes[0]
		];
		return json_encode($rating);
	}
	// check if user already likes post or not
	function userLiked($post_id)
	{
		$conn= mysqli_connect("localhost","root","","php_login_system");
        $user_id= $_SESSION['user_id'] ;
			$sql = "SELECT * FROM rating_info 
					WHERE user_id=$user_id AND post_id=$post_id AND rating_action='like'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			return true;
		}else{
			return false;
		}
	}
	// ckeck if theuser already dislikes the post or not
	function userDisliked($post_id)
	{
		$conn= mysqli_connect("localhost","root","","php_login_system");
        
        $user_id= $_SESSION['user_id'] ;
			$sql = "SELECT * FROM rating_info 
					WHERE user_id=$user_id AND post_id=$post_id AND rating_action='dislike'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {

			return true;
		}else{
			return false;
		}
	}
?>

