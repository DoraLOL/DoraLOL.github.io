<?php
if($_GET)
{
    $response=$_GET["g-recaptcha-response"];
    $secret="6LfqxjwfAAAAAIlxUoX-xhaod7TTgKESdMvJmupa";
    echo "$response <br>";
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
    echo "$result2 <br>";
    $captcha = Capture($result2, '{ "success":":',',');
    echo $captcha;
    if(strpos('false',$captcha)){
        exit('errorCaptcha');
    }
}
?>