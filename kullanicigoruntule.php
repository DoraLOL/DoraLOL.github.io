<?php


include_once '../includes/baglan.php';
session_start();
if(isset($_SESSION['uid']) && isset($_SESSION['username'])){
$username=$_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $con->prepare($sql) or die ($con->error);
$stmt->bind_param('s',$username);
$stmt->execute();
$result_username = $stmt->get_result();
$row = $result_username->fetch_assoc();
if($row['pre']<7){

header("Location:/404.html");

}}else{

  header("Location:/auth/auth-login");
}

if(isset($_GET['kid']) && isset($_SESSION['username'])){
	 $uid = $_GET['kid'];
	 $username = $_SESSION['username'];
          	 
     $sql_account = "SELECT * FROM users WHERE uid = ? ";
     $stmt = $con->prepare($sql_account) or die ($con->error);
     $stmt->bind_param('s',$uid);
     $stmt->execute();
     $result_account = $stmt->get_result();
     $row_k = $result_account->fetch_assoc();

     $sql_count_users = "SELECT * FROM users";
     $query_count_users = $con->prepare($sql_count_users) or die ($con->error);
     $query_count_users->execute();
     $result_count_users = $query_count_users->get_result();
     $total_users = $result_count_users->num_rows;
	 
	 if($row_k['status'] == 'ACTIVE'){
     $stauts_users = '<span class="badge bg-light-success">'.$row_k['status'].'</span>';
   }else{
    $stauts_users = '<span class="badge bg-light-danger">'.$row_k['status'].'</span>';
   }
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL,"http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec ($curl);
        curl_close ($curl);
        $ipdat = @json_decode($result);
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

}else{
    ?>
    <script>
        window.location.href="../auth/auth-login";
    </script>
    <?php
}

$pre = $row_k['pre'];
$bitis = $row_k['bitis'];
$id = $row_k['uid'];

if($pre == 0)
{
    $zaman = "0";
}
else{
    $zaman = $bitis;
}

if($bitis == date('Y-m-d'))
{
$sql = "UPDATE users SET bitis='' WHERE uid =$id";
$sqll = "UPDATE users SET pre='0' WHERE uid=$id";
$con->query($sql);
$con->query($sqll);
}
?>
<?php include_once '../apiler/admincontrol.php'; ?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="TeamFast">
        <meta name="keywords" content="Fastchecker, Fast checker, Fast, checker, credit card, credit card checker, ccn, ccn checker, cc checker, tr checker, tr cc checker, usa cc checker, card checker, bin, bin checker, cc duzenleyici, mernis, mernis 2021, kisi sorgu, kisi sorgu 2021, tc kimlik sorgu, tc sorgu, tc sorgu 2021, numara sorgu, numara sorgu 2021, kimlik sorgu, kisi bul 2021"/>
		<meta name="description" content="FastChecker, Piyasanın en iyi ve en hızlı cc checker sitesidir. Data düzeltici, Account checker, Bin checker vb. birçok hizmeti ücretsiz sağlamaktadır. https://discord.gg/aQpVxkdn"/>
    <title>FastCheck - Kullanıcıyı Görüntüle</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

 <?php
         include_once("includes/header.php");
        ?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
<?php
        include_once("includes/menu.php");
        ?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
  <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2" src="../app-assets/Fastimage/kullanici.jpg" height="110" width="110" alt="User avatar" />
                                            <div class="user-info text-center">
                                                <h4><?= $row_k['username'] ?></h4>
                                                <span class="badge bg-light-secondary"><?= $row_k['pre'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around my-2 pt-75">
                                        <div class="d-flex align-items-start me-2">
                                            <span class="badge bg-light-primary p-75 rounded">
                                                <i data-feather="check" class="font-medium-2"></i>
                                            </span>
                                            <div class="ms-75">
                                                <h4 class="mb-0">0</h4>
                                                <small>Yaptığı İşlem</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-light-primary p-75 rounded">
                                                <i data-feather="briefcase" class="font-medium-2"></i>
                                            </span>
                                            <div class="ms-75">
                                                <h4 class="mb-0">0</h4>
                                                <small>Satın Alım</small>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Detaylar</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Kullanıcı Adı:</span>
                                                <span><?= $row_k['username'] ?></span>
                                            </li>	
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Status:</span>
                                                <?= $stauts_users; ?>
                                            </li>
											<li class="mb-75">
                                                <span class="fw-bolder me-25">Rank:</span>
                                                <span><?= $row_k['pre'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Fast ID:</span>
                                                <span><?= $row_k['uid'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Ip Address:</span>
                                                <span><?= $row_k['ip'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Oluşturma Tarihi:</span>
                                                <span><?= $row_k['ot'] ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Bakiye:</span>
                                                <span><?= $row_k['bakiye']?>₺</span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                                                Düzenle
                                            </a>
                                            <a href="javascript:;" class="btn btn-outline-danger suspend-user" data-bs-target="#banUser" data-bs-toggle="modal">IP Ban</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- User Pills -->
                            <ul class="nav nav-pills mb-2">
                                <li class="nav-item">
                                    <a class="nav-link active" href="kullanicigoruntule?kid=<?=$uid?>">
                                        <i data-feather="user" class="font-medium-3 me-50"></i>
                                        <span class="fw-bold">Hesap</span></a>
                                </li>
                            </ul>
                            <!--/ User Pills --> 

                            <!-- Project table -->
                            <div class="card">
                                <h4 class="card-header">Kullanıcının Görev Listesi</h4>
                                <div class="table-responsive">
                                    <table class="table datatable-project">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Görev</th>
                                                <th class="text-nowrap">Görev Açıklaması</th>
                                                <th>Ödül</th>
                                                <th>Görev Bitiş Tarihi</th>
                                            </tr>
                                        </thead>
									<tbody>
									<tr>
									<td>
									<th>İlk Alım</th>
									<th>İlk Satın Alımını yap <b>25.00₺</b> bakiyeyi anında kap!</th>
									<th><b>25.00₺</b></th>
									<th>14.01.2032</th>
									</td>
									</tr>
									</tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /Project table -->

                            <!-- recent device -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Recent devices</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-nowrap text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-start">IP</th>
                                                <th >TARAYICI</th>
                                                <th>CIHAZ</th>
                                                <th>LOKASYON</th>
                                                <th>GIRIS TARIHI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
												$uid = $_GET['kid'];
                                                $sql_users = "SELECT * FROM user_log WHERE uid = ?";
                                                $stmt_users = $con->prepare($sql_users) or die ($con->error);
                                                $stmt_users->bind_param('s',$uid);
                                                $stmt_users->execute();
                                                $result_users = $stmt_users->get_result();
                                                $loglari = $result_users->num_rows;
                                                if($loglari > 0){
                                                while($row_users = $result_users->fetch_assoc()){
                                                $browser = $row_users['browser'];
                                                switch($browser){
                                                case 'Google Chrome on Windows':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/google-chrome.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Google Chrome on Linux':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/google-chrome.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Google Chrome on Mac':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/google-chrome.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Mozilla Firefox on Windows':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/mozila-firefox.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Mozilla Firefox on Linux':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/mozila-firefox.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Mozilla Firefox on Mac':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/mozila-firefox.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Internet Explorer on Windows':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/internet-explorer.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Internet Explorer on Linux':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/internet-explorer.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Internet Explorer on Mac':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/internet-explorer.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Apple Safari on Windows':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/apple-safari.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Apple Safari on Linux':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/apple-safari.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Apple Safari on Mac':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/apple-safari.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Opera on Windows':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/opera.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Opera on Linux':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/opera.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Opera on Mac':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/opera.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Internet Explorer on Mobile':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/internet-explorer.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Mozilla Firefox on Mobile':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/mozila-firefox.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Google Chrome on Mobile':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/google-chrome.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Apple Safari on Mobile':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/apple-safari.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                case 'Opera on Mobile':
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/opera.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                    break;
                                                default:
                                                    $browserimg = '
                                                    <div class="avatar me-25">
                                                    <img src="../app-assets/images/icons/unknown.png" alt="avatar" width="20" height="20" />
                                                    </div>
                                                    ';
                                                }
                                                $country = ip_info($row_users['ip_adress'], "Country");
                                                echo '
                                                <tr>
                                                <td class="text-start">'.$row_users['ip_adress'].'</td>
                                                <td>
                                                '.$browserimg.'
                                                <span class="fw-bolder">'.$row_users['browser'].'</span>
                                                </td>
                                                <td>Null</td>
                                                <td>'.$country.'</td>
                                                <td>'.$row_users['activity_date'].'</td>
                                                </tr>
                                                ';}
                                                }
                                                else{
                                                echo '<th>Log Bulunamadı</th>';
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- / recent device -->
                        </div>
                        <!--/ User Content -->
                    </div>
                </section>
                <!-- Edit User Modal -->
                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Kullanıcı Bilgilerini Düzenle</h1>
                                    <p>Kullanıcı ayrıntılarının güncellenmesi bir gizlilik denetimi alacaktır.</p>
                                </div>
                                <form id="editUserForm" class="row gy-1 pt-75" >
                                  <input type="hidden" value="<?= $row_k['uid'] ?>" name="uid">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Kullanıcı adı</label>
                                        <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="John" value="<?= $row_k['username'] ?>" data-msg="Lütfen Kullanıcı Adı Giriniz" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserLastName">Parola</label>
                                        <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control" data-msg="Lütfen şifrenizi giriniz" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserName">Oluşturma tarihi</label>
                                        <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control" value="<?= $row_k['ot']?>" disabled/>
                                    </div>
									<div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserLastName">Rank</label>
                                        <input type="text" id="modalEditUserLastName" name="modalEditUserRank" class="form-control" value="<?= $row_k['pre']?>" />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserEmail">Ip Adresi</label>
                                        <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" value="<?= $row_k['ip'] ?>" disabled/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserStatus">Status</label>
                                        <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example">
                                            <option >Status</option>
                                            <option value="ACTIVE" <?= $row_k['status'] == 'ACTIVE'? 'selected': ''; ?>>Active</option>
                                            <option value="INACTIVE" <?= $row_k['status'] == 'INACTIVE'? 'selected': ''; ?>>Inactive</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditTaxID">Fast ID</label>
                                        <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="<?= $row_k['uid'] ?>" value="<?= $row_k['uid'] ?>" disabled/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserPhone">Hesap bakiyesi</label>
                                        <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" value="<?= $row_k['bakiye']?>" />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit User Modal -->
                                <!-- Ban User Modal -->
                                <div class="modal fade" id="banUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Kullanıcıyı Banla</h1>
                                    <p>Kullanıcıyı Banlar.</p>
                                </div>
                                <form id="BanUserForm" class="row gy-1 pt-75" >
                                  <input type="hidden" value="<?= $row_k['uid'] ?>" name="uid">
                                    <div class="col-12">
                                        <label class="form-label" for="modalEditUserFirstName">Kullanıcı adı</label>
                                        <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" value="<?= $row_k['username'] ?>" disabled/>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="modalEditUserName">Kullanıcı Ban Sebebi</label>
                                        <input type="text" id="modalEditUserLastName" name="modalBanUserReason" class="form-control" required/>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="modalEditUserName">Oluşturma tarihi</label>
                                        <input type="text" id="modalEditUserLastName" name="modalEditUserLastName" class="form-control" value="<?= $row_k['ot']?>" disabled/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserEmail">Ip Adresi</label>
                                        <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control" value="<?= $row_k['ip'] ?>" disabled/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserStatus">Status</label>
                                        <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example" disabled>
                                            <option >Status</option>
                                            <option value="ACTIVE" <?= $row_k['status'] == 'ACTIVE'? 'selected': ''; ?>>Active</option>
                                            <option value="INACTIVE" <?= $row_k['status'] == 'INACTIVE'? 'selected': ''; ?>>Inactive</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditTaxID">Fast ID</label>
                                        <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="<?= $row_k['uid'] ?>" value="<?= $row_k['uid'] ?>" disabled/>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserPhone">Hesap bakiyesi</label>
                                        <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" value="<?= $row_k['bakiye']?>" disabled/>
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Ban User Modal -->
                        </div>
                    </div>
                </div>
                <!--/ upgrade your plan Modal -->

            </div>
        </div>
    <!-- END: Content-->
	
			 <?php
        include_once("includes/ayar.php");
        ?>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="anasayfa.php" target="_blank">FastCheck</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Crafted with<i data-feather="heart"></i><a href="anasayfa.php"> FastCheck Global LLC</a></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
	  <script src="../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
	  <script src="../app-assets/js/scripts/components/components-bs-toast.js"></script>
    <!-- END: Page JS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function(){


        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })


        $("#BanUserForm").submit(function(e){
          e.preventDefault();

            Swal.fire({
              title: '<strong>EMİN MİSİN?</strong>',
              text: "Bu kullanıcıyı gerçekten banlamak istiyor musun?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Evet, istiyorum.',
              allowOutsideClick: false,
							background: '#283046',
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '../apiler/ban-user.php',
                  type: 'POST',
                  data: $(this).serialize(),
                  success:function(data){

                    if(data == 'error1'){
                      Swal.fire({
                          title: "<strong>ERROR</strong>",
                          text: "Kullanıcı Adı Zaten Banlı",
                          icon: "error",
                          width: '400px',
                          confirmButtonColor: '#6610f2',
                          allowOutsideClick: false,
                          background: '#283046',
                        })

                    }else{

                      Swal.fire({
                            title: "<strong>BANLANDI!</strong>",
                            text: "Kullanıcı başarıyla banlandı",
                            icon: "success",
                            width: '400px',
                            showConfirmButton: false,
                            allowOutsideClick: false,
						              	background: '#283046',
                            timer: 2000,
                        }).then(()=>{
                          window.location.reload();
                        })
                      

                    }

                  }
                })
              }
            })

        })
        $("#editUserForm").submit(function(e){
          e.preventDefault();

            Swal.fire({
              title: '<strong>EMİN MİSİN?</strong>',
              text: "Bu profili düzenlemek istiyorsun",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Evet, düzenleyin!',
              allowOutsideClick: false,
							background: '#283046',
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '../apiler/edit-user.php',
                  type: 'POST',
                  data: $(this).serialize(),
                  success:function(data){

                    if(data == 'error1'){
                      Swal.fire({
                          title: "<strong>HATA</strong>",
                          text: "Kullanıcı Adı Zaten Var",
                          icon: "error",
                          width: '400px',
                          confirmButtonColor: '#6610f2',
                          allowOutsideClick: false,
                          background: '#283046',
                        })

                    }else{

                      Swal.fire({
                            title: "<strong>BAŞARI</strong>",
                            text: "Güncellenen Bilgiler Başarıyla Alındı",
                            icon: "success",
                            width: '400px',
                            showConfirmButton: false,
                            allowOutsideClick: false,
						              	background: '#283046',
                            timer: 2000,
                        }).then(()=>{
                          window.location.reload();
                        })
                      

                    }

                  }
                })
              }
            })

        })


      })
     
    </script>
</body>
<!-- END: Body-->

</html>