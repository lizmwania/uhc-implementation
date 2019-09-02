<?php
class Push{
private $host = 'localhost';
private $user = 'root';
private $password = '';
private $database = 'php_login_system';
private $notifTable = 'notif';
private $userTable = 'users';           
private $dbConnect = false;
public function __construct(){
    
  

if(!$this->dbConnect){ 
    $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
    if($conn->connect_error){
        die("Error failed to connect to MySQL: " . $conn->connect_error);
    }else{
        $this->dbConnect = $conn;
    }
}
}
private function getData($sqlQuery) {
$result = mysqli_query($this->dbConnect, $sqlQuery);
if(!$result){
    die('Error in query: '. mysql_error());
}
$data= array();
while ($row = mysqli_fetch_array($result)) {
    $data[]=$row;            
}
return $data;
}
public function listNotification(){
$sqlQuery = 'SELECT * FROM '.$this->notifTable;
return  $this->getData($sqlQuery);
}	
public function listNotificationUser($user){
$sqlQuery = "SELECT * FROM ".$this->notifTable." WHERE firstname='$user' AND notif_loop > 0 AND notif_time <= CURRENT_TIMESTAMP()";
return  $this->getData($sqlQuery);
}	
public function listUsers(){
$sqlQuery = "SELECT * FROM ".$this->userTable." WHERE firstname != 'admin'";
return  $this->getData($sqlQuery);
}	
public function loginUsers($username, $password){
$sqlQuery = "SELECT id as userid, firstname, password FROM ".$this->userTable." WHERE firstname='$username' AND password='$password'";
return  $this->getData($sqlQuery);
}	
public function saveNotification($title, $msg, $time, $loop, $loop_every, $user){
$sqlQuery = "INSERT INTO ".$this->notifTable."(title, notif_msg, notif_time, notif_repeat, notif_loop, firstname) VALUES('$title', '$msg', '$time', '$loop', '$loop_every', '$user')";
$result = mysqli_query($this->dbConnect, $sqlQuery);
if(!$result){
    return ('Error in query: '. mysql_error());
} else {
    return $result;
}
}	
public function updateNotification($id, $nextTime) {		
$sqlUpdate = "UPDATE ".$this->notifTable." SET notif_time = '$nextTime', publish_date=CURRENT_TIMESTAMP(), notif_loop = notif_loop-1 WHERE id='$id')";
mysqli_query($this->dbConnect, $sqlUpdate);
}	
}
?>