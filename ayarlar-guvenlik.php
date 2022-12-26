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
    <title>FastCheck - Ayarlar</title>
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-tour.css">
    <!-- END: Page CSS-->


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
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Güvenlik Ayarları</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Hesabım </a>
                                    </li>
									<li class="breadcrumb-item"><a href="#">Ayarlar </a>
                                    </li>
                                    <li class="breadcrumb-item active">Güvenlik Ayarları
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
                    <div class="col-12">
                        <ul class="nav nav-pills mb-2">
                            <!-- account -->
                            <li class="nav-item">
                                <a class="nav-link" href="ayarlar">
                                    <i data-feather="settings" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Ayarlar</span>
                                </a>
                            </li>
                            <!-- security -->
                            <li class="nav-item">
                                <a class="nav-link active" href="ayarlar-guvenlik">
                                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                                    <span class="fw-bold">Güvenlik</span>
                                </a>
                            </li>
                        </ul>

                        <!-- security -->

                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Şifre Değiştir</h4>
                            </div>
                            <div class="card-body pt-1">
                                <!-- form -->
                                <form class="validate-form" id="changePassword">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <input type="hidden" value="<?= $uid ?>" name="uid">
                                            <label class="form-label" for="account-old-password">Mevcut Şifre</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account-old-password" name="password" placeholder="Güncel şifrenizi giriniz" data-msg="Lütfen geçerli şifre" required/>
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-new-password">Yeni Şifre</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" id="account-new-password" name="new-password" class="form-control" placeholder="Yeni şifreyi girin" required/>
                                                <div class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-1">
                                            <label class="form-label" for="account-retype-new-password">Yeni şifrenizi tekrar yazınız</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" id="account-retype-new-password" name="confirm-new-password" placeholder="Yeni şifrenizi onaylayın" required/>
                                                <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="fw-bolder">Parola gereksinimleri:</p>
                                            <ul class="ps-1 ms-25">
                                                <li class="mb-50">Minimum 8 karakter uzunluğunda - ne kadar fazla olursa o kadar iyi</li>
                                                <li class="mb-50">En az bir küçük harfli karakter</li>
                                                <li>En az bir sayı, sembol veya boşluk karakteri</li>
                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-1 mt-1">Değişiklikleri Kaydet</button>
                                            <button type="reset" class="btn btn-outline-secondary mt-1">Temizle</button>
                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                        </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

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
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/modal-two-factor-auth.js"></script>
    <script src="app-assets/js/scripts/pages/page-account-settings-security.js"></script>
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

$("#changePassword").submit(function(e){
  e.preventDefault();

    Swal.fire({
      title: '<strong>EMİN MİSİN?</strong>',
      text: "Şifreniz değiştirilsin mi?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Evet, değiştirilsin',
      allowOutsideClick: false,
                    background: '#283046',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'apiler/change-password-api.php',
          type: 'POST',
          data: $(this).serialize(),
          success:function(data){

            if(data == 'error1'){
              Swal.fire({
                  title: "<strong>ERROR</strong>",
                  text: "Şifreniz Zaten Aynı",
                  icon: "error",
                  width: '400px',
                  confirmButtonColor: '#6610f2',
                  allowOutsideClick: false,
                  background: '#283046',
                })

            }
            else if(data == 'error2'){
              Swal.fire({
                  title: "<strong>ERROR</strong>",
                  text: "Eski Şifreniz Uyuşmuyor!",
                  icon: "error",
                  width: '400px',
                  confirmButtonColor: '#6610f2',
                  allowOutsideClick: false,
                  background: '#283046',
                })

            }
            else if(data == 'error3'){
              Swal.fire({
                  title: "<strong>ERROR</strong>",
                  text: "Yeni Şifreler Uyuşmuyor!",
                  icon: "error",
                  width: '400px',
                  confirmButtonColor: '#6610f2',
                  allowOutsideClick: false,
                  background: '#283046',
                })

            }else{

              Swal.fire({
                    title: "<strong>BAŞARILI!</strong>",
                    text: "Şifreniz başarıyla değiştirildi",
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