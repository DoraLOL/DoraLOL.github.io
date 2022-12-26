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
<script src="https:cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="TeamFast">
        <meta name="keywords" content="Fastchecker, Fast checker, Fast, checker, credit card, credit card checker, ccn, ccn checker, cc checker, tr checker, tr cc checker, usa cc checker, card checker, bin, bin checker, cc duzenleyici, mernis, mernis 2021, kisi sorgu, kisi sorgu 2021, tc kimlik sorgu, tc sorgu, tc sorgu 2021, numara sorgu, numara sorgu 2021, kimlik sorgu, kisi bul 2021"/>
		<meta name="description" content="FastChecker, Piyasanın en iyi ve en hızlı cc checker sitesidir. Data düzeltici, Account checker, Bin checker vb. birçok hizmeti ücretsiz sağlamaktadır. https:discord.gg/JvpMh4xkPe"/>
    <title>FastCheck - Nüfus Sorgu</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https:fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

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
<script src="https:ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="sweetaler.js"></script>
<script src="jquery.toast.js"></script>
<script>
    function clearResults() {
        $("#kimlikbilgi").html(' <tr><td>No data available in table</td></tr>');
        $("#tcno").val("");
        $("#dg").val("");
    }

    function sorgula() {
            var tc = $("#tcno").val();
            var dg = $("#dg").val();
            $.ajax({
                url: "apiler/apidgtc.php",
                type: "POST",
                data: {
                    tc: tc,
                    dg: dg
                },
                success: (res) => {
                    var json = res;
                    if (json.success === "true") {
                        var ad = json.ad;
                        var soyad = json.soyad;
                        var baba_adi = json.baba_adi;
                        var ana_adi = json.ana_adi;
                        var mahalle = json.mahalle;
                        var medeni = json.medeni;
                        var cinsiyet = json.cinsiyet;
                        var dogum_tarih = json.dogum_tarih;
                        var cilt_no = json.cilt_no;
                        var aile_sira_no = json.aile_sira_no;
                        var sira_no = json.sira_no;
                        var dogum_yer = json.dogum_yer;
                        var il_ad = json.il_ad;
                        var ilce_ad = json.ilce_ad;
                        $("#kimlikbilgi").html(
                        "<tr>" +
                        "<th>" +
                        tc +
                        "</th>" +
                        "<th>" +
                        ad +
                        "</th>" +
                        "<th>" +
                        soyad +
                        "</th>" +
                        "<th>" +
                        ana_adi +
                        "</th>" +
                        "<th>" +
                        baba_adi +
                        "</th>"+
                        "<th>" +
                        dogum_yer +
                        "</th>"+
                        "<th>" +
                        dogum_tarih +
                        "</th>"+
                        "<th>" +
                        medeni +
                        "</th>"+
                        "<th>" +
                        cinsiyet +
                        "</th>"+
                        "<th>" +
                        cilt_no +
                        "</th>"+
                        "<th>" +
                        aile_sira_no +
                        "</th>"+
                        "<th>" +
                        sira_no +
                        "</th>"+
                        "<th>" +
                        il_ad +
                        "</th>"+
                        "<th>" +
                        ilce_ad +
                        "</th>"+
                        "<th>" +
                        mahalle +
                        "</th>"+
                        "</tr>"
                        )
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                            background: '#283046',
                        })
                    }
                },
                error: () => {
                    Swal.fire({
                        icon: 'error',
                        title: "Sunucu hatası!",
                        text: 'Lütfen yönetici ile iletişime geçin.',
                        background: '#283046',
                    })
                }
            })

    }
</script>
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
                            <h2 class="content-header-title float-start mb-0">Nüfus Sorgu</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Sorgu</a></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Mernis 2022</a>
                                    </li>
                                    <li class="breadcrumb-item active">Nüfus Sorgu
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
                                    <h4 class="card-title">FastCheck Nüfus Sorgu</h4>
                                </div>													
                                <div class="card-body">
                                    <div class="row">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">T.C. Kimlik Numarası :</label>
                                                <input type="number" class="form-control" id="tcno" maxlength="10" placeholder="Sorgulanacak Kişinin T.C. Kimlik Numarasını Giriniz..." required></center>
                                            </div>
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Doğum Tarihi :</label>
                                                <input type="text" class="form-control" id="dg" maxlength="10" placeholder="Sorgulanacak Kişinin Doğum Tarihini Giriniz... ÖRNEK ; 26.05.2001" required></center>
                                            </div>
											<div class="card-header">
											<section id="bootstrap-toasts">
										<button onclick="sorgula()"class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Sorgula</button>
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
									<button  onclick="clearResults()" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button>
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
                                <h4 class="card-title">KİMLİK BİLGİLERİ</h4>
                            </div>
                            <div class="card-body">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
<th>Kimlik No</th>
<th>Adı</th>
<th>Soyadı</th>
<th>AnaAdı</th>
<th>BabaAdı</th>
<th>DogumYeri</th>
<th>DOGUMTARIHI</th>
<th>MEDENI</th>
<th>CINSIYET</th>
<th>CILT NO</th>
<th>AILE SIRA NO</th>
<th>SIRANO</th>
<th>NUFUSILI</th>
<th>NUFUSULCESI</th>
<th>MAHALLE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="kimlikbilgi">

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
	 <script src="app-assets/js/scripts/components/components-bs-toast.js"></script>
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