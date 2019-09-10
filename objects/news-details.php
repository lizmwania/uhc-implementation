

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UHC | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Navigation -->
   <?php include('includes/header.php');?>

    <!-- Custom styles for this template -->
    <link href="./css/modern-business.css" rel="stylesheet">
     <style>
     
     </style>
  </head>

  <body>

  <?php 
include_once "../config/database.php";
include_once "./login_checker.php";

?>

    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php
$nid = isset($_GET['nid']) ? $_GET['nid'] : "";
if('nid'){
$_SESSION['nid']=intval($_GET['nid']);
}
//Get the Current Page Number

if (isset($_GET['nid']) && $_GET['nid']!="") {
  $page_no = $_GET['nid'];
  } else {
      $page_no = $_GET['nid'];
  }
  	//SET Total Records Per Page Value
    $total_records_per_page = 1;
    //Calculate OFFSET Value and SET other Variables
   // $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
   // $adjacents = "1";

    
 $total_pages_sql = "SELECT id FROM tblposts WHERE Is_Active=1 ORDER BY id DESC LIMIT 1 ";
  $conn= mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
   $result_count = mysqli_query($conn,$total_pages_sql);
   $total_records = mysqli_fetch_array($result_count);
   $total_records = $total_records['id'];
   //$total_no_of_pages =$total_records['id'];
   $total_sql = "SELECT id FROM tblposts WHERE Is_Active=1 ORDER BY id ASC LIMIT 1 ";
   $result = mysqli_query($conn,$total_sql);
   $records = mysqli_fetch_array($result);
   $records = $records['id'];



$pid=$nid;
$conn= mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
 $query=mysqli_query($conn,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid' and tblposts.Is_Active=1 LIMIT 1");
while ($row=mysqli_fetch_array($query)) {
?>

          <div class="card mb-4">
      
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> |
                <b>Sub Category : </b><?php echo htmlentities($row['subcategory']);?> <b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>
                <hr />

 <img class="img-fluid rounded" src="../admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
  
              <p class="card-text"><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>
     
            <div class="card-footer text-muted">
             
           
            </div>
          </div>
          </div>
 
<?php } ?>
<div style="align-items:center">

   <ul class="pagination">

   
<li style= "float:left; margin-left:20px; " >
<a style="background-color:#337ab7;width:300px: height:250px;border-radius:25px;border:none;color:white;"<?php if($page_no > $records ){
echo "href='?nid= $previous_page'";
} ?>>Previous</a>

</li>
&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
<li style="float:right; margin-left:300px; ">

<a style="background-color:#337ab7;width:300px: height:250px;border-radius:25px;border:none;color:white; position:relative;"
<?php if($page_no < $total_records) {
echo "href='?nid=$next_page'";
} ?>>Next</a>

</li>


</ul>
</div>
<!--
  //Previous post
SELECT id FROM `tblposts` WHERE id<19 ORDER BY id DESC LIMIT 1;
//current page === $_GET[nid];
//next post id
SELECT id FROM tblposts WHERE id>19 LIMIT 1;
-->
      



        </div>

        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
     
      <!-- /.row -->
<!---Comment Section --->
<div class="mb-4" style= "background-color:whitesmoke;margin-right:34%; margin-top:20px;margin-bottom:30px;">
<div class="card-body">

  <?php 
 $sts=1;
 $conn= mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
 $query=mysqli_query($conn,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
while ($row=mysqli_fetch_array($query)) {
?>

<div class="panel " style="margin-bottom:0px; background-color:whitesmoke;">

          

<?php } ?>
<div>



 <div class="row" style="margin-top:8%">
  

   
  <!---Comment Display Section --->
</div>
      </div>
    </div>
</div>
</div>
<div class='col-sm-8'>
    <div id="disqus_thread"></div>
</div>
<script>


var disqus_config = function () {
 // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = <?php echo $_GET['nid']; ?>// Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://uhc-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
</div>

</div>

    </div> 


      <?php include('layout_foot.php');?>


    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
 function showModal(id='',index='',title="Hello title", body= " this is the body ")
    {
        var fullTitle='';  
        var fullBody='';
        if (id>0 && id != null)
        { 
           //fullTitle +=id;            
        }
        fullTitle +=title;
        document.getElementById("divmssagesDismissAllCheckBox").checked = false;
        document.getElementById("divmodalheader").innerHTML=fullTitle;

        
        currentNotificationIndex = index;
        currentNotificationId = id;
        
        
        $('#divmessageModel').modal("show");
       
    } 

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

    function dismiss (id){
   
      var xmlhttp = new XMLHttpRequest();
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("notif-"+id).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "markRead.php?q=" + id, true);
        xmlhttp.send();
    

    }
       
    </script>
  </body>

</html>
