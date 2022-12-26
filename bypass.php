<?php

error_reporting(0);

//////////////////////////////=================[Join @TechHacksBySoham For More Stuff]=================/////////////////////////

function Soham_Capture($str, $starting_word, $ending_word){
$subtring_start  = strpos($str, $starting_word);
$subtring_start += strlen($starting_word);
$size            = strpos($str, $ending_word, $subtring_start) - $subtring_start;
return substr($str, $subtring_start, $size);
};


$anchor_link = 'https://www.google.com/recaptcha/api2/anchor?ar=1&k=6LcSHNoaAAAAAPE3sXoZbB25etyDYXYDK207H6qJ&co=aHR0cHM6Ly9wb3J0YWwubWFnZGVidXJnZXIuY29tLnRyOjQ0Mw..&hl=tr&v=VZKEDW9wslPbEc9RmzMqaOAP&size=invisible&cb=z99hr4rgdznj';
$anchor_ref  = 'https://portal.magdeburger.com.tr/';

$reload_link = 'https://www.google.com/recaptcha/api2/reload?k=6LcSHNoaAAAAAPE3sXoZbB25etyDYXYDK207H6qJ';
$reload_ref = 'https://www.google.com/recaptcha/api2/anchor?ar=1&k=6LcSHNoaAAAAAPE3sXoZbB25etyDYXYDK207H6qJ&co=aHR0cHM6Ly9wb3J0YWwubWFnZGVidXJnZXIuY29tLnRyOjQ0Mw..&hl=tr&v=VZKEDW9wslPbEc9RmzMqaOAP&size=invisible&cb=z99hr4rgdznj';
$v   = 'VZKEDW9wslPbEc9RmzMqaOAP';
$k   = '6LcSHNoaAAAAAPE3sXoZbB25etyDYXYDK207H6qJ';
$co  = 'aHR0cHM6Ly9wb3J0YWwubWFnZGVidXJnZXIuY29tLnRyOjQ0Mw..';
$chr = urlencode('[25,95,11]');
$bg  = '!i42gjYgKAAQeDj2hbQEHDwKM8oRnafQlhBxTh9hfSbuKzETKwgUJMtUO1UPbJEKwfMbnGg_psQZsUM-BwXlU11nY8oHMi5tfOSN5etxLU4TxgtG4d1_EX3_AAlhW9aK9T7AaMImE6s-UM4WDNSch2-QWKC-Weps5r2-nKjn9WhGm89zcAHeUXQAx_eDoq1GggxfnzfK-LJ7lpQowmRRm2YaAwBhOI6dmaiLzFkzifIqYrRxSyUEfusTvBczbgHUYCfvdCYPfs2sctZDxmc3QbLkwawbZ6QLcW7m5PS6PObe9bbf-8PWu2edICl-GQn5wkOWtEsCbvK1nh-0pWqRSH45O1Jyu9YV6B-sXis_uwT9rsseKKbATglToonIqfnaVkeppLTmH0PV7TUJx-873_E2-5cc8o1nQZNwkHS_O25MHhZ116pl9AtTUgoJQXvOTIEE9ccJNPfiEN1l2KXsZ3Z8iO9NdVS2lY2y68HQo3DE-F5vo826ougCbEJGmrNdIM9FXpRGeKi26Eea4MM0IsJM1-SgqDioTfiUxQ_V1kefMEitjkW5qmgz3fPdkinnG1NuZk-556_TFtC7Til0WBA_IdpJxzcOxhk8ByFcUR8Q9ehMRbrJ09aVrGhnl-yhQTK6LQ03lacznZAzmZQMQbyKgr3A2P3GeWQPFESEv56Q31BEvI3VCYhE5lL-MvzDK_A7QhBrYprWouhn57p1RFpvNCfmH8TjOZgm_03wHeyRAEEkn4oYA0mDwKdU9Sz42EZ7Xc-5vUszOXEj7QFLWpAp79PbNbFiWWwdi-XAnA3I9OaTUbtmrq3ioP1gG0TOPEdEklEFRFXUc0dZxDExFgBNdPuwrpwUYeOORY47EB-DMiir0fbw11Z3ZRHtQcJwAHN28Ml_HgappdKaQsPXgH7TTW3xAoL6c00RWC-U';
$vh  = '191731505';

//////////////////=================[Anchor Named Req]=================//////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $anchor_link);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: www.google.com',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: en-US,en;q=0.9',
'referer: '.$anchor_ref.'',
'sec-fetch-dest: iframe',
'sec-fetch-mode: navigate',
'sec-fetch-site: cross-site',
'upgrade-insecure-requests: 1',
'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).''));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

if (!strpos($result, "recaptcha-token")){
echo '<span class="badge badge-warning">#DEAD</span></br><span class="badge badge-danger">『 ★ Page not loaded !! ★ 』</span></br><span class="new badge badge-warning">Api Made By ♛ Soham ♛</span></br>';
return;
};

$rtk = Soham_Capture($result, '<input type="hidden" id="recaptcha-token" value="', '"');

//////////////////=================[Reload Named Req]=================//////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $reload_link);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: www.google.com',
'accept: */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://www.google.com',
'referer: '.$reload_ref.'',
'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).''));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'v='.$v.'&reason=q&c='.$rtk.'&k='.$k.'&co='.$co.'&hl=en&size=invisible&chr='.$chr.'&vh='.$vh.'&bg='.$bg.'');
$result = curl_exec($ch);
curl_close($ch);

if (!strpos($result, '"rresp","')){
echo '<span class="badge badge-warning">#DEAD</span></br><span class="badge badge-danger">『 ★ Error in captcha !! ★ 』</span></br><span class="new badge badge-warning">Api Made By ♛ Soham ♛</span></br>';
return;
};
$captcha = Soham_Capture($result, '["rresp","', '"');
?>