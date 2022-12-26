<?php
header("Content-Type: application/json; utf-8;");
$tc = $_POST["tc"];

#error_reporting(E_ALL);
#ini_set("display_errors", 1);
function get_session(){
    include('bypass.php');
    $ch = curl_init('https://portal.magdeburger.com.tr/login/login_sfs');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // get headers too with this line
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "kullanici_adi=227008001&kullanici_sifre=123456&token=$captcha");
    $result = curl_exec($ch);
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
    $cookies = array();
    foreach($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }
    
    //var_dump($cookies);
    $json = json_encode($cookies);
    function Capture($str, $starting_word, $ending_word){
        $subtring_start  = strpos($str, $starting_word);
        $subtring_start += strlen($starting_word);
        $size            = strpos($str, $ending_word, $subtring_start) - $subtring_start;
        return substr($str, $subtring_start, $size);
      };
    $sesion = Capture($json, '{"ci_session":"','"}');
    unlink('kokie.txt');
    $dosya = fopen ("kokie.txt" , 'w'); //dosya oluşturma işlemi
    fwrite ($dosya, $sesion);
    fclose ($dosya);
}
function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
$numberPrefixes = ['(533)+', '(534)+', '(542)+', '(536)+', '(538)+', '(541)+', '(549)+', '(532)+', ',(535)+'];
for ($i = 0; $i < 21; ++$i) {
    $phone = $numberPrefixes[array_rand($numberPrefixes)] . rand(pow(10, 3 - 1), pow(10, 3) - 1) . "-" . rand(pow(10, 2 - 1), pow(10, 2) - 1) . "-" . rand(pow(10, 2 - 1), pow(10, 2) - 1);
}
$email = generateRandomString() . "@gmail.com";
// $phone = "(534)+432-23-43";
function getUnitToken($tc, $email, $phone, $sesion)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://portal.magdeburger.com.tr/ortak/search_entity');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_COOKIE, "ci_session=$sesion");
  curl_setopt($ch, CURLOPT_POSTFIELDS, "kimlik_no=$tc&kimlik_tipi=C&sigorta_tipi=sigortali&email=" . $email . "&tel=" . $phone . "&sigorta_durum=1");
  $response = curl_exec($ch);
  curl_close($ch);
  $fim = json_decode($response, true);
  $unit_token = $fim['unit_no'];
  if(empty($unit_token)){
  if($unit_token == "0")
  {
  $unit_token = save2021info($tc, $email, $phone, $sesion);
  return $unit_token;
  }
  else{
  $unit_result = $fim['result'];
  return $unit_result;
}
  }
  else{
    return $unit_token;
  }
}
function save2021info($tc, $email, $phone, $sesion)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://portal.magdeburger.com.tr/ortak/save_entity_sfs');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_COOKIE, "ci_session=$sesion");
  curl_setopt($ch, CURLOPT_POSTFIELDS, "kimlik_no=$tc&kimlik_tipi=C&sigorta_tipi=sigortali&sigorta_durum=1&email=$email&tel=$phone");
  $response = curl_exec($ch);
  $fim = json_decode($response, true);
  $unit_token = $fim['unit_no'];
  curl_close($ch);
  return $unit_token;
}
function get2021info($unit_token, $email, $phone, $sesion)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://portal.magdeburger.com.tr/ortak/entity_detail');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_COOKIE, "ci_session=$sesion");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "unit_no=" . $unit_token . "&kimlik_tipi=C&sigorta_tipi=sigortali&sigorta_durum=1&email=" . $email . "&tel=" . $phone);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "authority: portal.magdeburger.com.tr",
    "method: POST",
    "path: /ortak/entity_detail",
    "scheme: https",
    "origin: https://portal.magdeburger.com.tr",
    "referer: https://portal.magdeburger.com.tr/tss/index",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36"
  ));
  $fim = curl_exec($ch);
  curl_close($ch);
  $fim = json_decode($fim, true);
  return $fim;
}
$sonuc = file_exists('kokie.txt');
if($sonuc){
$dosyaAc = fOpen("kokie.txt" , "r"); 
$sesion = fRead ($dosyaAc , fileSize ("kokie.txt")); 
fClose($dosyaAc);
}
else{
    $dosya = fopen ("kokie.txt" , 'w'); //dosya oluşturma işlemi
    fwrite ( $dosya , '');
    fclose ($dosya);
    $getsesion = get_session();
}
$unit_token = getUnitToken($tc, $email, $phone, $sesion);
$res = get2021info($unit_token, $email, $phone, $sesion);

if (isset($res["unit_name"])) {
  $unit_tc = $tc;
  $unit_name = $res['unit_name'];
  $unit_surname = $res['unit_surname'];
  $unit_birthdate = $res["unit_birth_date"];
  $unit_address = $res['unit_adress'];
  $gender = $res["unit_gender"];
  $daire = $res["daire_no"];
  $unit_address = explode(" ", $unit_address);
  $il = $unit_address[count($unit_address) - 1];
  $ilce = $unit_address[count($unit_address) - 3];
  $mahalle = $unit_address["0"] . " " . $unit_address["1"];
  $caddesokak = $unit_address["2"] . " " . $unit_address["3"];
  $bina = $unit_address[array_search("BİNA", $unit_address) + 2];
  if ($daire === $ilce) {
    $daire = "Yok";
  }
  echo (json_encode([
    "success" => "true",
    "tc" => $tc,
    "name" => $unit_name,
    "surname" => $unit_surname,
    "birthdate" => $unit_birthdate,
    "gender" => $gender,
    "il" => $il,
    "ilce" => $ilce,
    "mahalle" => $mahalle,
    "caddesokak" => $caddesokak,
    "bina" => $bina,
    "daire" => $daire
  ]));
  die();
} 
else if(empty($unit_token))
{
  echo (json_encode(["success" => "false", "message" => "Invalid Cookie Geting Cookie..."]));
  $getsesion = get_session();
}
else if ($unit_token == "2") {
  echo (json_encode(["success" => "false", "message" => "undefined tc"]));
  die();
}
else {
  echo (json_encode(["success" => "false", "message" => "server error"]));
  die();
}
?>