<?php 

include_once '../includes/baglan.php';
session_start();


$username = $con->real_escape_string($_POST['username']);
$password = $con->real_escape_string($_POST['password']);



$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $con->prepare($sql) or die ($con->error);
$stmt->bind_param('s',$username);
$stmt->execute();
$result_username = $stmt->get_result();
$row = $result_username->fetch_assoc();
$count_username = $result_username->num_rows;
$yourbrowser="Chrome";
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Europe/Istanbul');
$tarih = date("j, M Y G:i"); 

if($count_username > 0 ){
	
	$uid = $row['uid'];
	$username = $row['username'];
	$password_db = $row['password'];
	if($row['status'] == 'INACTIVE')
	{
	exit('errorBanned');
	}
	if(password_verify($password, $password_db)){
		$null = 0;
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $username;
		$sql_insert = "INSERT INTO user_log (`uid`,`ip_adress`,`browser`,`device`,`activity_date`)VALUES(?,?,?,?,?)";
		$stmt_insert = $con->prepare($sql_insert) or die ($con->error);
		$stmt_insert->bind_param('sssss',$uid,$ip,$yourbrowser,$null,$tarih);
		$stmt_insert->execute();
		$stmt_insert->close();
		exit('success');
	}else{
			exit('errorPassword');
		
	}
	

}else{
	
		exit('errorUsername');
}



 ?>