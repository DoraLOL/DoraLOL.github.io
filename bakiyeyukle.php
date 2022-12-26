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
        window.location.href="auth/auth-login.php";
    </script>
    <?php
}

?>
<?php
$status = $row['status'];
if($status == "ACTIVE")
{
?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="TeamFast">
        <meta name="keywords" content="Fastchecker, Fast checker, Fast, checker, credit card, credit card checker, ccn, ccn checker, cc checker, tr checker, tr cc checker, usa cc checker, card checker, bin, bin checker, cc duzenleyici, mernis, mernis 2021, kisi sorgu, kisi sorgu 2021, tc kimlik sorgu, tc sorgu, tc sorgu 2021, numara sorgu, numara sorgu 2021, kimlik sorgu, kisi bul 2021"/>
		<meta name="description" content="FastChecker, Piyasanın en iyi ve en hızlı cc checker sitesidir. Data düzeltici, Account checker, Bin checker vb. birçok hizmeti ücretsiz sağlamaktadır. https://discord.gg/aQpVxkdn"/>
    <title>FastCheck - Bakiye Yükle</title>
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
	
	 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Bakiye Yükle</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Hesabım</a>
                                    </li>
                                    <li class="breadcrumb-item active">Bakiye Yükle
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
				
				                           <?php
        include_once("includes/drop.php");
        ?>

<div class="content-body">
                <section id="faq-search-filter">
                    <div class="card faq-search" style="background-image: url('app-assets/images/banner/banner.png')">
                        <div class="card-body text-center">
						   <h2 class="text-primary">FastCheck Bakiye Yükle</h2>
                            <p class="card-text mb-2">size uygun en iyi tarifeyi belirleyin ve satın alın.</p>
                        </div>
                    </div>
                </section>							
</div>

            <div class="content-body">
                <!-- Basic Inputs start -->
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Genel Bilgilendirme</h4>

<br><br>
<div class="block-content">
<p><a href="#"><b>Papara Ödemeleri</b></a></p>
<li><b>1325774925</b> Papara numarasına belirttiğiniz ücret üzerinden Ödeme açıklamasına <b>[Fast-PAY-<?= $uid ?>]</b> Yazarak Bakiye yükleyebilirsiniz.</li>
<div class="mb-1"></div> <div class="mb-1"></div>

<p><a href="#"><b>Ininal Ödemeleri</b></a></p>
<li><b>0000000000</b> Ininal numarasına belirttiğiniz ücret üzerinden Ödeme açıklamasına <b>[Fast-PAY-<?= $uid ?>]</b> Yazarak Bakiye yükleyebilirsiniz.</li>

<div class="mb-1"></div> <div class="mb-1"></div>

<p>Genel Bilgilendirme</p>
<li class="text-white">Bu ödeme yöntemlerinden numaraya size <b>ÖZEL</b> verilen açıklama kodu ile gönderdiğiniz TL kadar ödeme yaparsanız FastCheck Hesabınıza o kadar bakiye yüklenecektir..</li>
<li class="text-white">Ödemeler manuel incelendiği için maksimum 1 iş gününde hesabınıza tanımlanır ,</li><div class="mb-1"></div> <div class="mb-1"></div>
                                </div>
</div>
</div>
</div>
</div>
</div>


  <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">SON 2 ODEMELERIM</h4>
                            </div>
                            <div class="card-body">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
<thead>
<tr>
<th>Ödeme Yöntemi</th>
<th>Hesap Numarası</th>
<th>Ödeme Açıklaması</th>
<th>Ödeme Durumu</th>
<th class="d-none d-sm-table-cell" style="width: 15%;">Ödenecek Tutar</th>
</tr>
</thead>
<tbody>
<tr>
<td class="fw-semibold fs-sm">
<a href="">Papara</a>

<td class="text-white">
<b>0000000000</b>
</td>
<td class="d-none d-sm-table-cell">
<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">[Fast-PAY-<?= $uid ?>]</span>
</td>
<td class="d-none d-sm-table-cell">
<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Ödeme Bekleniyor</span>
</td>
<td class="d-none d-sm-table-cell">
Belirsiz
</td>
</tr>
<td class="fw-semibold fs-sm">
<a href="">Ininal</a>
</td>

<td class="text-white">
<b>0000000000</b>
</td>

<td class="d-none d-sm-table-cell">
<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">[Fast-PAY-<?= $uid ?>]</span>
</td>

<td class="d-none d-sm-table-cell">
<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Ödeme Bekleniyor</span>
</td>
<td class="d-none d-sm-table-cell">
Belirsiz
</td>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</main>

	
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
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
	<script src="app-assets/js/scripts/pages/page-pricing.js"></script>
    <script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
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