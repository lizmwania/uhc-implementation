<?php
include_once "../config/database.php";
class sql extends Database {
	public function __construct()
	{
		$this->getConnection();
	}

public function saveNotif($msg,$time,$loop,$loop_every,$user){
    $db = new Database();
    $db_con = $db->getConnection();
    try
    {
        $stmt = $db_con->prepare("insert into notif(notif_msg, notif_time, notif_repeat, notif_loop,firstname) values(:msg , :bctime , :repeat , :loop,:user) ");

        $stmt->bindParam("msg", $msg);
        $stmt->bindParam("bctime", $time);
        $stmt->bindParam("loop", $loop);
        $stmt->bindParam("repeat", $loop_every);
        $stmt->bindParam("user", $user);
        $stmt->execute();
        $stat[0] = true;
        $stat[1] = 'sukses';
        return $stat;
    }
    catch(PDOException $ex)
    {
        $stat[0] = false;
        $stat[1] = $ex->getMessage();
        return $stat;
    }
}
public function updateNotif($id,$nextime)
{
    $db = new Database();
    $db_con = $db->getConnection();
    try
    {
        
        $stmt = $db_con->prepare("update notif set notif_time = :nextime, publish_date=CURRENT_TIMESTAMP(), notif_loop = notif_loop-1 where id=:id ");
        $stmt->bindParam("id", $id);
        $stmt->bindParam("nextime", $nextime);
        $stmt->execute();
        $stat[0] = true;
        $stat[1] = 'sukses';
        return $stat;
    }
    catch(PDOException $ex)
    {
        $stat[0] = false;
        $stat[1] = $ex->getMessage();
        return $stat;
    }
}

public function listNotifUser($user){
    $db = new Database(); 
    $db_con = $db->getConnection();
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM notif
            WHERE firstname= :user
            AND notif_loop > 0
            AND notif_time <= CURRENT_TIMESTAMP()");
        $stmt->bindParam("user", $user);
        $stmt->execute();
        $stat[0] = true;
        $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stat[2] = $stmt->rowCount();

        return $stat;
    }
    catch(PDOException $ex)
    {
        $stat[0] = false;
        $stat[1] = $ex->getMessage();
        return $stat;
    }
}
public function getLogin($user,$pass){
    $db = new Database();
    $db_con = $db->getConnection();
    try
    {
        $stmt = $db_con->prepare("select * from user where firstname = :user and password = :pass");
        $stmt->bindParam("user", $user);
        $stmt->bindParam("pass", $pass);
        $stmt->execute();
        $stat[0] = true;
        $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stat[2] = $stmt->rowCount();
        return $stat;
    }
    catch(PDOException $ex)
    {
        $stat[0] = false;
        $stat[1] = $ex->getMessage();
        return $stat;
    }
}

public function listUser(){
    $db = new Database();
    $db_con = $db->getConnection();

    //$db = $this->dblocal;
    try
    {
        $stmt = $db_con->prepare("select * from users");
        $stmt->execute();
        $stat[0] = true;
        $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stat[2] = $stmt->rowCount();
        
        return $stat;
    }
    catch(PDOException $ex)
    {
        $stat[0] = false;
        $stat[1] = $ex->getMessage();
        return $stat;
    }
}
public function listNotif(){
    $db = new Database();
    $db_con = $db->getConnection();
    try
    {
        $stmt = $db_con->prepare("select * from notif");
        $stmt->execute();
        $stat[0] = true;
        $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stat[2] = $stmt->rowCount();
        return $stat;
    }
    catch(PDOException $ex)
    {
        $stat[0] = false;
        $stat[1] = $ex->getMessage();
        return $stat;
    }
}
}
?>





<script>

$(document).ready(function () {
    var badge = $(this).find(".badge");
    var count = <?php echo $notification_count; ?>;

    if (count > 0) {
        badge.text(count);
    } else {
        badge.hide();
    }
});
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        var url = "../inc/delete_msg.php?msg_id="+id;
        $(this).closest('.msg-content').next('hr').remove();
        $(this).closest('.msg-content').remove();

        $.ajax({
            type: "GET",
            url: url,
            success: success,
            error: function () {
                alert('Failed to Delete');
            }
        });
    });
function success() {
    $(".badge").text(<?php echo $notification_count - 1;?>);
    $('.modal-title').after(
        '<div class="alert alert-success delete-success-alert text-center" role="alert" id="delete_success_alert">' +
        'Message Deleted</div>');
    $('#delete_success_alert').fadeTo(3000, 500).slideUp(500, function () {
        $('#delete_success_alert').slideUp(500);
    });
}
What can I do to fix this? The database updates both times, the div is removed both times. It's just this badge that I can't figure out.

php jquery ajax twitter-bootst