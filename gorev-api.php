<?php 

include_once 'baglan.php';
session_start();


if(isset($_SESSION['uid']) && isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
	 $username = $_SESSION['username'];
	 
	 $sql_account = "SELECT * FROM users WHERE uid = ? ";
     $stmt = $con->prepare($sql_account) or die ($con->error);
     $stmt->bind_param('s',$uid);
     $stmt->execute();
     $result_account = $stmt->get_result();
     $row = $result_account->fetch_assoc();


     $sql_count_users = "SELECT * FROM users";
     $query_count_users = $con->prepare($sql_count_users) or die ($con->error);
     $query_count_users->execute();
     $result_count_users = $query_count_users->get_result();
     $total_users = $result_count_users->num_rows;
     
     
}else{
    ?>
    <script>
        window.location.href="../auth/auth-login.php";
    </script>
    <?php
}

$bakiye = $row['bakiye'];
$id = $row['uid'];
$key = $_POST['key'];
$gorevid = $row['gorev'];
$satin = $row['pre'];


if($key == 1)
{
    if($satin != 0)
    {       
        if ($gorevid != 0){
            
            exit('gorevAlinmis');
        }
        else{
            $bakiye = $bakiye + 25;
            $sql = "UPDATE users SET gorev='1' WHERE uid=$id";
            $sqll = "UPDATE users SET bakiye= $bakiye WHERE uid=$id";
            $con->query($sql);
            $con->query($sqll);
            exit('succes');
        }
    }
    else{
        exit('gorevTamamlanmadi');
    }
}




?>
