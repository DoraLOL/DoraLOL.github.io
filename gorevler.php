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
    <title>FastCheck - Görevler</title>
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
                            <h2 class="content-header-title float-start mb-0">Görevler</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Hesabım</a>
                                    </li>
                                    <li class="breadcrumb-item active">Görevler
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
                
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <?php
                                    $id1 = $row['gorev'];
                                    if($id1 == 1)
                                    {
                                ?>
                                <div class="pricing-badge text-end">
                                <span class="badge rounded-pill badge-light-info">Görev Tamamlandı</span>
                                </div>
                                <?php }?>
                                <div class="card-body text-center">
                                    <i data-feather="dollar-sign" class="font-large-2 mb-1"></i>
                                    <h5 class="card-title">İlk Alım</h5>
                                    <p class="card-text">
                                        İlk Satın Alımını yap <b>25.00₺</b> bakiyeyi anında kap!
                                    </p>

                                    <!-- modal trigger button -->
                                    <button onclick="gorev1()" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewCard">
                                        Ödülü Al
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- / add new card  -->

                    							
            </div>
        </div>
    </div>
	
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="sweetaler.js"></script>
<script src="jquery.toast.js"></script>
<script>

function gorev1(){
    
    let key = "1";
    $.ajax({
        url: "includes/gorev-api.php",
        type: "POST",
        data: {
            key : key
        },
        success:function(data){
            if(data == 'gorevAlinmis'){
                            Swal.fire({
                                title: "Hata",
                                text: "Bu Ödülü Zaten Almışsın",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
                            else if (data == 'gorevTamamlanmadi'){
                                Swal.fire({
                                title: "Hata",
                                text: "Lütfen Önce Görevinizi Tamamlayın",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
                            else{
                                Swal.fire({
                                title: "Başarılı",
                                text: "Ödülü Başarıyla Aldınız",
                                icon: "success",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
        }
})
}

</script>
                        <!-- / create app card-->
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