<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "php_login_system";
$link = mysqli_connect($host, $user, $pass);


$postid=$_POST['nid'];


//create current page constant
$curPage = "news-details.php?nid=$postid";
 
//set number of clicks variable to 0
$clicks = 0;
 
//do not recount if page currently loaded
if($curPage = "news-details.php?nid=$postid"){
 
   //try to connect to MySQL server
   if(!$link = mysqli_connect($host, $user, $pass)) {
      echo "Could not connect to MySQL server. Check your login information; the MySQL server may also be offline or temporarily overloaded.";
   }
   //try to select database
   elseif(!mysqli_select_db($link,$dbname)) {
      echo "Cannot select database.";
   }
   else {
      //get current click count for page from database;
      //output error message on failure
      if(!$rs = mysqli_query($link,"SELECT page_count FROM click_count WHERE page_url = '$curPage' and pid= '$postid' ")) {
         echo "Could not parse click counting query.";
      }
      //if no record for this page found,
      elseif(mysqli_num_rows($rs) == 0) {
         //try to create new record and set count for new page to 1;
         //output error message if problem encountered
         if(!$rs = mysqli_query($link,"INSERT INTO click_count (pid,page_url, page_count) VALUES ('$postid','$curPage', 1)")) {
            echo "Could not create new click counter for this page.";
         }
         else {
            $clicks = 0;
         }
      }
      else {
         //get number of clicks for page and add 1
         $rowclick = mysqli_fetch_array($rs);
         $clicks = $rowclick['page_count'] + 1;
         //update click count in database;
         //report error if not updated
         if(!$rs = mysqli_query($link,"UPDATE click_count SET page_count = $clicks WHERE page_url = '$curPage'and tblposts.id=page_count.pid")) {
            echo "Could not save new click count for this page.";
         }
      }
   }
}
?>