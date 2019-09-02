<?php

if(isset($_GET['q'])){
    $id=$_GET['q'];
    $conn = new mysqli("localhost","root","","php_login_system");
    $sql = "Update comments set comment_status='0' where comment_id='$id'";
    if($conn->query($sql)===TRUE){
        echo "Marked Read!";
    }
    else{
        echo "Unable to mark Read!";
    }
    
}
else{
    echo "Cannot Mark Read: No id selected";
}