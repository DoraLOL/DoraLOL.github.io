<?php


include_once 'includes/baglan.php';
session_start();


if(isset($_SESSION['uid']) || isset($_SESSION['username'])){
    $uid = $_SESSION['uid'];
	 $username = $_SESSION['username'];
          	 
     $sql_account = "SELECT * FROM users WHERE uid = ? ";
     $stmt = $con->prepare($sql_account) or die ($con->error);
     $stmt->bind_param('s',$uid);
     $stmt->execute();
     $result_account = $stmt->get_result();
     $row = $result_account->fetch_assoc();
if($_SESSION['username']!=$row['username']){
      header("Location:/auth/auth-login");
}

     $sql_count_users = "SELECT * FROM users";
     $query_count_users = $con->prepare($sql_count_users) or die ($con->error);
     $query_count_users->execute();
     $result_count_users = $query_count_users->get_result();
     $total_users = $result_count_users->num_rows;
	 
	 $sql_count_users = "SELECT * FROM banned_table";
     $query_count_users = $con->prepare($sql_count_users) or die ($con->error);
     $query_count_users->execute();
     $result_count_users = $query_count_users->get_result();
     $total_ban = $result_count_users->num_rows;
     
}else{
  header("Location:/auth/auth-login");
}

$pre = $row['pre'];
$bitis = $row['bitis'];
$id = $row['uid'];
if($pre == 0)
{
    $zaman = "0";
}
else{
    $zaman = $bitis;
}

if($bitis == date('Y-m-d'))
{
$sql = "UPDATE users SET bitis=' WHERE uid =$id";
$sqll = "UPDATE users SET pre='0' WHERE uid=$id";
$con->query($sql);
$con->query($sqll);
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
    <title>FastCheck - Anasayfa</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/shepherd.min.css">
	<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/plyr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
	<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-media-player.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->


    <!-- END: Header-->
 <?php
        include_once("includes/header.php");
        ?>

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
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
							<section id="basic-tebrik">
				

                            <div class="tebrik">

                                <div class="card-body">
                                    <center><h5>Tekrar hoş geldin, <b><?= $row['username'] ?></b>!</h5></center>
                                    <center><p class="card-text font-small-3">Aşagıda ki butona tıklayarak discord sunucumuza gelebilirsiniz.</p></center>
                                    <h3 class="mb-75 mt-2 pt-50">
                                        <a href="discord" target="_blank"><button type="button" class="btn btn-primary form-control">Discord'a Git</button></a>
                                    </h3>
                                </div>

								</div>


						</section>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
							<section id="basic-istatistik">
				<div class="istatistik">
                                <div class="card-header">
                                    <h4 class="card-title">İstatistik</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0">1 Dakika önce güncellendi!</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user-plus" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?= number_format($total_ban) ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Banlılar</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="users" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?= number_format($total_users) ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Kullanıcılar</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-warning me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user-check" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?= $uyelik ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Üyelik</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?= $row['bakiye'] ?>₺</h4>
                                                    <p class="card-text font-small-3 mb-0">Bakiye</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
								</div>
					</section>
                        </div>
					</div>
					
					  <div class="row match-height">
                          <!-- Apply Job Card -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card card-apply-job">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <div class="d-flex flex-row">
                                        <div class="avatar me-1">
                                            <img src="app-assets/Fastimage/kullanici.jpg" alt="Avatar" width="42" height="42" />
                                        </div>
                                        <div class="user-info">
                                            <h5 class="mb-0"><?= $row['username'] ?></h5>
                                            <small class="text-muted"><?= $row['ot'] ?></small>
                                        </div>
                                    </div>
                                    <span class="badge rounded-pill badge-light-primary"><?= $uyelik ?></span>
                                </div>
                                <h5 class="apply-job-title">Fastcheck 1 numara <3</h5><br>
                                <p class="card-text mb-2">
                                   <span class="badge rounded-pill badge-light-success"><b>Oluşturuldu:</b></span> <?= $row['ot'] ?>
                                </p>
								<p class="card-text mb-2">
                                   <span class="badge rounded-pill badge-light-success"><b>Son oturum açma:</b></span> az önce
                                </p>
								<p class="card-text mb-2">
                                   <span class="badge rounded-pill badge-light-success"><b>Fast Bakiye:</b></span> <?= $row['bakiye'] ?>₺
                                </p>
                                <div class="apply-job-package bg-light-primary rounded">
                                    <div>
                                        <span class="text-white"><?= $row['username'] ?></span>		
                                    </div>
                                    <span class="badge rounded-pill badge-light-success">Aktif</span>
                                </div>
								<a href="ayarlar"><button type="button" class="btn btn-primary form-control">Öz Geçmişi Güncelle</button></a>
                            </div>
                        </div>
                    </div>
                    <!--/ Apply Job Card -->
                        <!-- Revenue Report Card -->
                        <div class="col-lg-8 col-12">
                            <div class="card card-revenue-budget">
                                <div class="row mx-0">
                                    <div class="col-md-8 col-12 revenue-report-wrapper">
                                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card-title mb-50 mb-sm-0">Üyelik</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center me-2">
                                                    <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                                    <span>Kart Check</span>
                                                </div>
                                                <div class="d-flex align-items-center ms-75">
                                                    <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                                    <span>Hesap Check</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="revenue-report-chart"></div>
                                    </div>
                                    <?php 

                                    $nowDate = date('Y-m-d');
                                    $trh = $row['bitis'];
                                    $d1 = new DateTime($nowDate);
                                    $d2 = new DateTime($trh);
                                    $gun = $d1->diff($d2)->days;

                                    
                                    ?>
                                    <div class="col-md-4 col-12 budget-wrapper">
                                    
                                        <h2 class="mb-25">Hesap</h2>
                                        </br>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Bakiyeniz:</span>
                                            <span><?= $row['bakiye'] ?>₺</span>
                                        </div>
                                        </br>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Üyelik:</span>
                                            <span><?= $uyelik ?></span>
                                        </div>
                                        </br>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Üyelik Bitiş:</span>
                                            <span><?php if(empty($trh)){ echo 'Üyelik Yok';}else{echo $zaman;} ?></span>
                                        </div>
                                        </br>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Kalan Gün:</span>
                                            <span><?php if(empty($trh)){ echo 'Üyelik Yok';}else{echo $gun . " gün";} ?></span>
                                        </div>
                                        </br></br>
                                        <button type="button" class="btn btn-primary"><a href="bakiyeyukle" class="text-white">Hemen Bakiye Yükle</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                    </div>
					 <div class="content-body">
                <!-- Media Player -->
                <section id="media-player-wrapper">
                    <div class="row">
                        <!-- VIDEO -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Video</h4>
                                   

            </div>
                    <div class="row match-height">
					
									 <?php
        include_once("includes/duyurular.php");
        ?>
		
                        <!-- Developer Meetup Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <img src="app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">TUR</h6>
                                            <h3 class="mb-0">24</h3>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">Sitemizde yeni misiniz?</h4>
                                            <p class="card-text mb-0">Öyleyse aşağıda'ki "TUR'U BAŞLAT" butonuna basarak, sitemizde kısa bir keşife  çıkabilirsiniz.</p>
                                        </div>
                                    </div>
									<center>
                <div class="content-body">
                <section id="basic-tour">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="btn btn-outline-primary" id="tour">Tur'u Başlat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic tour -->

            </div>
        </div>
    </div>
	</center>
                                </div>
                            </div>
                        </div>
                        <!--/ Developer Meetup Card -->
                                </div>
                            </div>
                        </div>
                        <!--/ Transaction Card -->
                    </div>
                </section>
				
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
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
	 <script src="app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
	<script src="app-assets/js/scripts/customizer.min.js"></script>
	    <script src="app-assets/vendors/js/extensions/plyr.min.js"></script>
    <script src="app-assets/vendors/js/extensions/plyr.polyfilled.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
	<script src="app-assets/js/scripts/extensions/tur.js"></script>
    <script src="app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
	<script src="app-assets/js/scripts/extensions/ext-component-media-player.js"></script>
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