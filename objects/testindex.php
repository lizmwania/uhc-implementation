<!DOCTYPE html>
<html lang="en">

  <head>
   <!-- Bootstrap CSS -->
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UHC | NEWS</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
    <style>

.fa {
  font-size: 1.2em;
}
.fa-thumbs-down, .fa-thumbs-o-down {
  transform:rotateY(180deg);
}
i {
  color: blue;
}   
</style>
</head>

<body>


    <!-- Navigation -->
   <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">
    <?php 
include_once "../config/database.php";
include_once "login_checker.php";

 

 
    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : ""; 
     // if login was successful
     if($action==='login_success'){
      echo "<div class='alert alert-info' style= 'margin-top:2%;' >";
          echo "<strong>Hi " . $_SESSION['firstname'] . ", Welcome back!</strong>";
      echo "</div>";
  }


  // if user is already logged in, shown when user tries to access the login page
  else if($action==='already_logged_in'){
      echo "<div class='alert alert-info'style= 'margin-top:2%;'>";
          echo "<strong>Hi"  . $_SESSION['firstname'] . ", Welcome.</strong>";
      echo "</div>";
  }
 ?>
  
     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php 
      if (isset($_GET['pageno'])) {
             $pageno = $_GET['pageno'];
         } else {
             $pageno = 1;
         }
         $no_of_records_per_page = 3;
         $offset = ($pageno-1) * $no_of_records_per_page;


       $total_pages_sql = "SELECT COUNT(*) FROM tblposts WHERE Is_Active=1";
        $conn= mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
         $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

         $conn= mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");      
 $query=mysqli_query($conn,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
 while ($row=mysqli_fetch_array($query)) {
 ?>

  <div class="card mb-4">
  <img class="card-img-top" src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
    <!-- start test here for likes and dislikes -->
 
  
       <div class="posts-wrapper" style="margin:20px 10px 0px 10px;" >
       <!-- <?php //include_once "count.php"; ?>
       <p style="float:right; font-size:20px;">Views <?php //echo $clicks; ?> &nbsp;&nbsp;&nbsp;</p> -->
    <?php include_once "like.php"; 
      getLikes($row['pid']);
      echo '&nbsp;&nbsp;&nbsp;&nbsp;';
      getDislikes  ($row['pid']);
    ?>
  
  </div>
   
  
<!-- end here -->
  <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
                 <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>
       
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo htmlentities($row['postingdate']);?>
           
            </div>
          </div>
<?php } ?>
       

    

          <!-- Pagination -->


    <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>

        </div>

        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>
      <!-- /.row -->
      
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('layout_foot.php');?> 
</body>

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   
 

  
  <script>
	$(document).ready(function(){
		// if the user clicks on the like button ...
		$('.like-btn').on('click', function(){
			var post_id = $(this).data('id');
			$clicked_btn = $(this);
      //for the like btn the user can only like and unlike. no dislike
			if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
				action = 'like';
			} else if($clicked_btn.hasClass('fa-thumbs-up')){
				action = 'unlike';
			}
			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'action': action,
					'post_id': post_id
				},
				success: function(data){
					res = JSON.parse(data);
					if (action == "like") {
						$clicked_btn.removeClass('fa-thumbs-o-up');
						$clicked_btn.addClass('fa-thumbs-up');
					} else if(action == "unlike") {
						$clicked_btn.removeClass('fa-thumbs-up');
						$clicked_btn.addClass('fa-thumbs-o-up');
					}
          // display number of likes and dislikes
					$clicked_btn.siblings('span.likes').text(res.likes);
					$clicked_btn.siblings('span.dislikes').text(res.dislikes);
          // if the user previously disliked this post, change dislike button accordingly
					$clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
        }
			});		
		});
		// if the user clicks on the dislike button ...
		$('.dislike-btn').on('click', function(){
			var post_id = $(this).data('id');
			$clicked_btn = $(this);
       //for the like btn the user can only like and unlike. no dislike
			if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
				action = 'dislike';
			} else if($clicked_btn.hasClass('fa-thumbs-down')){
				action = 'undislike';
			}
			
			$.ajax({
				url: 'like.php',
				type: 'post',
				data: {
					'action': action,
					'post_id': post_id
				},
				success: function(data){
					res = JSON.parse(data);
					if (action == "dislike") {
						$clicked_btn.removeClass('fa-thumbs-o-down');
						$clicked_btn.addClass('fa-thumbs-down');
					} else if(action == "undislike") {
						$clicked_btn.removeClass('fa-thumbs-down');
						$clicked_btn.addClass('fa-thumbs-o-down');
					}
					$clicked_btn.siblings('span.likes').text(res.likes);
					$clicked_btn.siblings('span.dislikes').text(res.dislikes);
					$clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
				}
			});	
		});
	});
</script>

</html>