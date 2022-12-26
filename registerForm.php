<?php

$ip = $_SERVER['REMOTE_ADDR'];
$tarih = date('d.m.Y H:i:s');

include_once '../includes/baglan.php';


$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sql = "SELECT username FROM users WHERE username = ?";
$stmt = $con->prepare($sql) or die ($con->error);
$stmt->bind_param('s',$username);
$stmt->execute();
$result = $stmt->get_result();
$count = $result->num_rows;

if($_POST)
{   
    $response=$_POST["g-recaptcha-response"];
    $secret="6LfqxjwfAAAAAIlxUoX-xhaod7TTgKESdMvJmupa";
    function Capture($str, $starting_word, $ending_word)
    {
        $subtring_start  = strpos($str, $starting_word);
        $subtring_start += strlen($starting_word);
        $size            = strpos($str, $ending_word, $subtring_start) - $subtring_start;
        return substr($str, $subtring_start, $size);
    };
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $result2=curl_exec($curl);
    curl_close($curl);
    $captcha = Capture($result2, '{ "success":":',',');
    if($captcha == " false"){
        exit('errorCaptcha');
    }
if($count > 0){
    exit('error1');
}


if(strlen($_POST['password']) < 5){
    exit('error2');
}

if($_POST['password'] != $_POST['confirmPassword']){
    exit('error3');
}
if(strlen($_POST['username']) > 16){
    exit('error4');
}
if(preg_match("/^[a-zA-Z0-9]+$/", $username) != 1) {
    exit('error5');
}



$sql_insert  = "INSERT INTO users (`username`,`password`,`ip`,`ulke`,`ot`,`pre`,`bakiye`,`gi`,`ai`,`status`,`bitis`,`gorev`)VALUES('$username','$password','$ip','','$tarih','0','0.00','50','300','ACTIVE','','0')";
if ($con->query($sql_insert) === TRUE) {
  exit('succsess');
}

$conn->close();
}
?>