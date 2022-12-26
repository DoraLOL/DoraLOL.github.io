<?php


include_once 'includes/baglan.php';
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
        window.location.href="auth/auth-login";
    </script>
    <?php
}
?>
<?php
 $pree = $row['pre'];
 
  // Dimulai dengan POST Method
  if(isset($_POST['get'])){
  $script = $_POST['get'];
  $six = $_POST['enamdigit'];
  // Insert CURL
  function curl($url, $var = null) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_TIMEOUT, 25);
      if ($var != null) {
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
  // Enam digit Formula
  function defineNUM($bin) {
      return substr($bin,0,6);
  }
  if($pree != 0 ){
  // JSON DATA
    $bin = defineNUM($six);
    $curl = curl("https://lookup.binlist.net/".$bin); // Thanks to this API!
    $json = json_decode($curl);
    $brand = $json->scheme ? $json->scheme : "BIN Geçersiz!";
    $cardType = $json->type ? $json->type : "BIN Geçersiz!";
    $cardCategory = $json->bank ? $json->bank : "BIN Geçersiz!";
    $countryName = $json->country ? $json->country : "BIN Geçersiz!";
    $countryCode = $json->country ? $json->country : "BIN Geçersiz!";
   $details = '<p>BIN: '.$bin.'</br>Kart Türü: '.$brand.'</br>Banka Adı: '.$cardCategory->name.'</br>Banka URL: '.$cardCategory->url.'</br>Banka Telefon: '.$cardCategory->phone.'</br>Tip: '.$cardType.'</br>Ülke Adı: '.$countryName->name.'</br>Ülke Kodu: '.$countryCode->alpha2.'</br></br></p>';
	 
    
    if ($six == null) {
    die('error!');
}
    $binresult = $details;
}
else
{
?>
<?php
$status = $row['status'];
if($status == "ACTIVE")
{
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function(){
    Swal.fire({
            title: "Hata",
            text: "Bu özelliği kullanmak için üyelik satın almalısınız.",
            icon: "error",
            width: '400px',
            confirmButtonColor: '#6610f2',
            allowOutsideClick: false,
            background: '#283046',
            })
})
</script>
<?php
}

}

	
?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="TeamFast">
        <meta name="keywords" content="Fastchecker, Fast checker, Fast, checker, credit card, credit card checker, ccn, ccn checker, cc checker, tr checker, tr cc checker, usa cc checker, card checker, bin, bin checker, cc duzenleyici, mernis, mernis 2021, kisi sorgu, kisi sorgu 2021, tc kimlik sorgu, tc sorgu, tc sorgu 2021, numara sorgu, numara sorgu 2021, kimlik sorgu, kisi bul 2021"/>
		<meta name="description" content="FastChecker, Piyasanın en iyi ve en hızlı cc checker sitesidir. Data düzeltici, Account checker, Bin checker vb. birçok hizmeti ücretsiz sağlamaktadır. https://discord.gg/aQpVxkdn"/>
    <title>FastCheck - Bin Checker</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
	<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-pricing.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">BIN Checker</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Checker</a>
                                    </li>
									<li class="breadcrumb-item"><a href="#">Diğer</a>
                                    </li>
                                    <li class="breadcrumb-item active">BIN Checker
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
         <?php
        include_once("includes/drop.php");
        ?>
            </div>
            <div class="content-body">
                <!-- Basic Inputs start -->
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">FastCheck BIN Checker</h4>
                                </div>
								<form action="" method="post">																															
                                <div class="card-body">
                                    <div class="row">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Bin Numarası :</label>
                                                <input type="number" class="form-control" id="enamdigit" name="enamdigit" placeholder="Lütfen bir bin giriniz" maxlength="6" required></center>
                                            </div>
											<div class="card-header">
											<section id="bootstrap-toasts">
										<button name="get" type="submit" class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Sorgula</button>
                                    <div class="toast-container">
                                        <div class="toast basic-toast position-fixed top-0 end-0 m-2" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <img src="app-assets/images/logo/logo.png" class="me-1" alt="Toast image" height="18" width="25" />
                                                <strong class="me-auto">FastCheck Sitesinden Mesaj</strong>
                                                <small class="text-muted">az önce</small>
                                                <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">Sorgulama işlemi başlatıldı, lütfen bekleyiniz...</div>
									</div>
                                </div>
								</section>
									<a href="binchecker" class="text-white"><button  type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button></a>
                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
			  <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">SONUÇ PANELI</h4>
                            </div>
                            <div class="card-body">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>BIN</th>
<th>Kart Türü</th>
<th>Banka Adı</th>
<th>Banka URL</th>
<th>Banka Telefon</th>
<th>Kart Tipi</th>
<th>Ülke Adı</th>
<th>Ülke Kodu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<td><?php echo $bin; ?> </td>

<td><?php echo $brand; ?> </td>

<td><?php echo $cardCategory->name; ?> </td>

<td><?php echo $cardCategory->url; ?> </td>

<td><?php echo $cardCategory->phone; ?> </td>

<td><?php echo $cardType; ?> </td>

<td><?php echo $countryName->name; ?> </td>

<td><?php echo $countryCode->alpha2; ?> </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
	    </div>
		    </div>
			    </div>
    <!-- END: Content-->
	
		 <?php
        include_once("includes/ayar.php");
        ?>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
		 <?php
        include_once("includes/footer.php");
        ?> 
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
	<script src="app-assets/js/scripts/customizer.min.js"></script>
	<script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
	<script src="app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
<?php
}
else if($status == "INACTIVE")
{
unset($_SESSION['uid']);
    unset($_SESSION['username']);
    session_unset();
    session_destroy();
    
    echo '<script>window.location.href="../auth/auth-login"</script>';
}
?>