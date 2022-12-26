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
$checkedid = $_POST['checkedid'];
$perm = $row['pre'];
$trh = $row['bitis'];
if ($checkedid == "1"){
    $tarih = date('Y-m-d', strtotime('+1 year'));

    switch($key){
        case "1":
        $ucret =  250;
        break;
        case "2":
        $ucret = 500;
        break;
        case "3":
        $ucret = 750;
        break;
    }
}
else
{
    $tarih = date('Y-m-d', strtotime('+1 month'));
    switch($key){
        case "1":
        $ucret =  100;
        break;
        case "2":
        $ucret = 200;
        break;
        case "3":
        $ucret = 300;
        break;
    }
}


if ($perm == 0)
{
if($key == 1)
{
    if ($bakiye >= $ucret){
        $bakiye = $bakiye - $ucret;
        $sql = "UPDATE users SET pre='1' WHERE uid=$id";
        $sqll = "UPDATE users SET bakiye= $bakiye WHERE uid=$id";
        $sqlll = "UPDATE users SET bitis='$tarih' WHERE uid =$id";
        $con->query($sql);
        $con->query($sqll);
        $con->query($sqlll);
        exit('succes');
    }
    else{
        exit('yetersizBakiye');
    }
}
else if ($key == 2){
    if ($bakiye >= $ucret){
        $bakiye = $bakiye - $ucret;
        $sql = "UPDATE users SET pre='2' WHERE uid=$id";
        $sqll = "UPDATE users SET bakiye=$bakiye WHERE uid=$id";
        $sqlll = "UPDATE users SET bitis='$tarih' WHERE uid =$id";
        $con->query($sql);
        $con->query($sqll);
        $con->query($sqlll);
        exit('succes');
    }
    else{
        exit('yetersizBakiye');
    }
}
else if ($key == 3){
    if ($bakiye >= $ucret){
        $bakiye = $bakiye - $ucret;
        $sql = "UPDATE users SET pre='3' WHERE uid=$id";
        $sqll = "UPDATE users SET bakiye= $bakiye WHERE uid=$id";
        $sqlll = "UPDATE users SET bitis='$tarih' WHERE uid =$id";
        $con->query($sql);
        $con->query($sqll);
        $con->query($sqlll);
        exit('succes');
    }
    else{
        exit('yetersizBakiye');
    }    
}
}
else
{
    exit('paketVar');
}

?>
