
<?php
//fetch.php;
//include("../config/database.php");
//if(isset($_POST["view"]))
 //if($_POST["view"] != '')
 //{
  // $update_query = "UPDATE comments SET comment_status=1 WHERE comment_status=0";
 // mysqli_query($connect, $update_query);
 // }
 
 $storeNotifs = array();

 $connect = mysqli_connect("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
 $query = "SELECT * FROM comments WHERE comment_status = 1 ORDER BY comment_id DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 $count = mysqli_num_rows($result);
 
 if(mysqli_num_rows($result) > 0)
 {
     
  while($row = mysqli_fetch_array($result))
  {
    array_push($storeNotifs,$row['comment_id']);
   $output .= '
   <li id="notif-'.$row['comment_id'].'" >
   
    <a href="#">
   
     <strong>'.$row["comment_subject"].'</strong><br />
     <span class="fa fa-times float-right text-danger" onclick="dismiss('.$row["comment_id"].')"></span>
     <small><em>'.$row["comment_text"].'</em></small>
    </a>
    
   </li>
   <li class="divider"></li>            
   ';
  }
 }
 else
 {
   
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 

echo '<li class="dropdown" >
       <a href="#" class="" data-toggle="dropdown"><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span><span class="label label-pill label-danger count" style="border-radius:10px;">'.$count.'</span> </a>
       
       <ul class="dropdown-menu" style="width:500%;">
   '.$output.'
   </ul>
      </li>';

?>








