<!DOCTYPE html>
<html lang="en">

<?php
// core configuration
include_once '../config/core.php';
 
// include login checker
$require_login=true;
include_once "login_checker.php";


include_once "../config/database.php";
 
include_once "../objects/notif_function.php";
$page_title="actvities";
?>

<head>


 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bogetConnection()otstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/> 
  <title>activities</title> 
  <link rel="stylesheet" href="./libs/css/customer.css">
  <script src="../libs/css/comments.js"></script>
  <script src="notification.js"></script>
  <style> 
  body, html {  
width: 100%;   height:100%;    margin: 0px; padding:10px;
   padding-bottom:60px;
    
}

.container {   width: 100%;   height: 100%; 
  
   }
.leftpane {
    width: 15%;
    height: 100%;
    float: left;
    background-color:#BBB6B5 
    border-right:2px solid #F25738;
     text-align: center; }

.middlepane {
    width: 50%;
    height: 100%;
    float: left;
    background-color:white;
    border-collapse: collapse;
     text-align: left;
     margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
      }

.rightpane {   width: 20%;  
 height: 100%;   
 position: relative;  
float: right;  
 background-color: #BBB6B5;   
 border-collapse:
collapse;   
text-align: center; }

.toppane {   width: 100%;   
height: 100px; 
border-bottom:2px solid #F25738;  
   background-color:#061D25;  
    text-align: center; 
   }

  .container {
	width: 100%;
  height:100%
	margin: 0px;
	
  padding-right: 0px;
  padding-left: 0px;
  
 }

header{
  background-color: #f8f8f8;
    border-color: #e7e7e7;
    
    height: 50px;
    width:100%;
    display: flex;
    
}

.sidenav {
  width: 150px;
  height:250px;
  position: fixed;
  z-index: 1;
  top: 150px;
  left: 10px;
  background: white;
  overflow-x: hidden;
  padding: 8px 0;
  margin-bottom: 300px;
 
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #2196F3;
  display: block;
}

.sidenav a:hover {
  color: #064579;
}
.pageContentWrapper{
  margin-bottom:100px;/* Height of footer*/
  height: auto !important;
}
</style>

</head> 
<body>
<div class="pageContentWrapper"> 
<header>
            <div class="logo">
                <img src="../images/logo.png" height="80px" width="80px" />
                <aside> UHC</aside>
            </div>
</header>
<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
 
        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
 
            <!-- Change "Your Site" to your site name -->
            
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li>
                <!-- link to the "Cart" page, highlight if current page is cart.php -->
                
                    <a href="<?php echo $home_url; ?>">Home</a>
                </li>
                <li >
                    <a href="./activities.php">Activities</a>
                </li>
                <li >
                    <a href="./abouts.php">About us</a>
                </li>
 
  
            </ul>
            <ul><form class='navbar-form'>
          <div class='form-group'>
            <input class='form-control' type='text' name='search' placeholder='Search...'>

          </div>
          <button type='submit' class='btn btn-default'><span class='glyphicon glyphicon-search'></button>
        </form>
</ul>
 
            <?php
            // check if users / customer was logged in
// if user was logged in, show "Edit Profile", "Orders" and "Logout" options
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
    ?>
    <ul class="nav navbar-nav navbar-right">


        <ul <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                &nbsp;&nbsp;<span class="caret"></span>
            </a>
            
        
  
       

            <ul class="dropdown-menu" role="menu">
                <li><a href="./logout.php">Logout</a></li>
            </ul>
</ul>
    </ul>
    <?php
    }
     
  

            ?>
             
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->
 <!--<div class="container"> 

 <div class="toppane">
 <h2>ACTIVITIES</h2>
 </div>-->

  <div class="leftpane">
  
    <div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
 

  
    </div>
    </div>

     <div class="middlepane">
     <h2>Middle View</h2>
     <div class="news">our currents activities</div>

<p style="text-color:black;">A basic understanding of JavaScript, HTML and CSS are needed to follow this tutorial.
These days Social has become the buzzword and we all want our apps to be the centre of these amazing social conversations. Comments on a post, video, update or any feature of your new app is a great way to add fun and enriching social conversations to your app.

If these conversations can be Realtime, then it's even better, so in this blog post we will be discussing how we can create a realtime comment feature for our web apps using Pusher with Vanilla JavaScript on frontend and Node.js on the backend.

We will call this realtime comment system Flash Comments, which can be re-used for multiple posts/features in your app and can generate amazing conversations in real time. Our app will look something like this:



Skip the next section, if you have already signed up with Pusher.

Signing up with Pusher
You can create a free account in Pusher here. After you signup and login for the first time, you will be asked to create a new app as seen in the picture below. You will have to fill in some information about your project and also the frontend library or backend language you will be building your app with. You also have an option to select the cluster of Pusher based on your users location distribution, I have chosen ap2 (Mumbai, India) as I may be building an app for the India region.</p>


<?php
$db = mysqli_connect("localhost","root","","php_login_system");
?>
<div class="panel panel-default" style="border-color:#fff; boder: none;">
<div class="panel-heading">Comments</div>
  <div class="panel-body">
  <?php 
  	$comsql = "SELECT * FROM comments";
  	$comres = mysqli_query($db, $comsql);
  	while($comr = mysqli_fetch_assoc($comres)){
  		$hash = md5( strtolower( trim( $comr['email'] ) ) );
		$size = 100;
  		$grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
  ?>
  
  
  	<div class="row">
  		<div class="col-md-3">
  			<img src="../images/avatar.png" height="80px" width="80px" >
  		</div>
  		<div class="col-md-9" >
  			<p><strong><?php echo $comr['name']; ?></strong> </p>
  			<p><?php echo $comr['submittime'] ?></p>
  			<p><?php echo $comr['subject']; ?></p>
        <form method="post" action="reply.php?id=5">
    <textarea name="reply-content"></textarea>
    <input  type='button' name='reply' id='reply' value='Reply' onclick='replyComment("<?php echo $comment_id?>")' />
</form>
             
  		</div>
  	</div>
  	<br>
  	<?php } ?>
  </div>
</div>

<?php 
 //$database = new Database();
 $db = mysqli_connect("localhost","root","","php_login_system");
if(isset($_POST) & !empty($_POST) && isset($_SESSION['access_level'])){
	$name = mysqli_real_escape_string($db, ($_POST['name']));
	$email = mysqli_real_escape_string($db, trim($_POST['email']));
	$subject = mysqli_real_escape_string($db,trim($_POST['subject']));
 
	$isql = "INSERT INTO comments (name, email, subject, status) VALUES ('$name', '$email', '$subject', 'draft')";
	$ires = mysqli_query($db, $isql) or die(mysqli_error($db));
	if($ires){
		$smsg = "Your Comment Submitted Successfully";
	}else{
		$fmsg = "Failed to Submit Your Comment";
	}
 
}
?>

<div class="panel panel-default">
<div class="panel-heading" style="">Post Your Comments</div>
  <div class="panel-body">
  	<form method="post">
  	  <div class="form-group">
	    <label for="exampleInputEmail1">Name</label>
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Subject</label>
	    <textarea name="subject" class="form-control" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</div>

<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
     </div>  
     
      <div class="rightpane">
      <P>Your notify will be here</P>
      <?php
      $sql = new sql();
      $user = $sql->listUser();
      $array=array();
$rows=array();
$listnotif = $sql->listNotifUser($_SESSION['username']);
foreach ($listnotif[1] as $key) {
	$data['title'] = 'Notification Title';
	$data['msg'] = $key['notif_msg'];
	$data['icon'] = 'http://localhost/notification/avatar2.png';
	
	$rows[] = $data;
	// update notification database
	$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
	$sql->updateNotif($key['id'],$nextime);
}
$array['notif'] = $rows;
$array['count'] = $listnotif[2];
$array['result'] = $listnotif[0];
echo json_encode($array);
 ?>
 </div> 
</div>
<?php include 'layout_foot.php';   ?>
</div>
</body>

 <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
