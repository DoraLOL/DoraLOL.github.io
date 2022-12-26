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
    <title>FastCheck - US Checker</title>
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href=".assets/css/style.css">
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
                            <h2 class="content-header-title float-start mb-0">US Checker</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Checker</a>
                                    </li>
									<li class="breadcrumb-item"><a href="#">CC Checker</a>
                                    </li>
                                    <li class="breadcrumb-item active">US Checker
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
				<div class="alert alert-danger" role="alert">
                                            <div class="alert-body">
											<i data-feather="info" class="me-50"></i>
                                                Üretim kart girerseniz üyeliğiniz ve bilgisayarınız sistemizden kalıcı olarak yasaklanacaktır.
                                            </div>
                                        </div>
            <div class="content-body">
                <!-- Basic Inputs start -->
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
							<div class="card-header">
                                    <h4 class="card-title">FastCheck US Credit Card Checker</h4>
                                </div>
                                <div class="card-header">
								<textarea  type="text" name="text" style="text-align: center;" id="lista" placeholder="Datayı bu alana giriniz..&#10;Örnek: 4444555566667777|01|21|001" class="textarea form-control mb-3" rows="10"></textarea>
									<button id="buton" name="submit" type="submit" onclick="enviar()" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
									<button id="stop" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                                    <a href="uschecker" class="text-white"><button  type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button></a>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-success">
                                    <div class="card-header bg-transparent border-success">
                                        <h5 class="my-0 text-success"><i class="fad fa-check-circle mr-2"></i>Onaylananlar <span class="badge rounded-pill bg-success badge-success" id="cDie2">0</span></h5>
										<div style="position: absolute; top:10px; right: 10px;"><button id="mostra" class="btn btn-outline-dark round"><i class="fas fa-eye-slash"></i> Gizle</button></div>

  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span  id="cLive2" class="badge badge-success"></span></h6>
    <div id="bode"><span id=".aprovadas" class="aprovadas"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-danger">
                                    <div class="card-header bg-transparent border-danger">
                                        <h5 class="my-0 text-danger"><i class="fad fa-times-circle mr-2"></i>Onaylanmayanlar <span class="badge rounded-pill bg-danger badge-danger" id="cDie2">0</span></h5>
									<div style="position: absolute; top:10px; right: 10px;"><button id="mostra2" class="btn btn-outline-dark round"><i class="fas fa-eye-slash"></i> Gizle</button></div>

  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span id="cDie2" class="badge badge-danger"></span></h6>
    <div id="bode2"><span id=".reprovadas" class="reprovadas">
                                                
												</span>
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
			      </div>
               </div>
			      </div>
               </div>
               <!-- container-fluid -->
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
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
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