<?php

if(isset($_GET['q'])){
    $id=$_GET['q'];
    $conn = new mysqli("den1.mysql6.gear.host","uhcimplem","Og047!5M4g!9","uhcimplem");
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