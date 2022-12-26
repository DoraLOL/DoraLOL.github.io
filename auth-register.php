<?php
$kul[0]['username']="root";
$kul[0]['password']="root";





function authenticate()
{
header( 'WWW-Authenticate: Basic realm="LOGİN | Sistem Yetkili Girisi"' );
header( 'HTTP/1.0 401 Unauthorized' );
echo '<br><br><br><body bgcolor=silver><b><font color=red size=2 face="Tahoma"><center>GiRiS YAPILMADI .. <a href="hasyer.php"><font color=darkgreen size=2 face="Tahoma">Geri Gelip Tekrar Giris icin TIKLAYIN</font></a></b> ';
exit;
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) { authenticate(); } else
{
for($i=0;$i<count($kul);$i++) { if($_SERVER['PHP_AUTH_USER']==$kul[$i]['username'] && $_SERVER['PHP_AUTH_PW']==$kul[$i]['password']){$auth=TRUE;}}
if($auth !=TRUE) {authenticate();}
}
?>

<?php 
include_once '../includes/baglan.php';
$ip = $_SERVER['REMOTE_ADDR'];
$result_check_ip = "SELECT * FROM banned_table WHERE ip_address = ?";
$stmt_check_ip = $con->prepare($result_check_ip) or die ($con->error);
$stmt_check_ip->bind_param('s',$ip);
$stmt_check_ip->execute();
$result_check_ip = $stmt_check_ip->get_result();
$row_users = $result_check_ip->fetch_assoc();
$count_check_ip = $result_check_ip->num_rows;
if($count_check_ip > 0){
    echo '
    <script>
    window.location.href="banned";
    </script>
    ';
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
    <title>FastCheck - Kayıt Ol</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

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
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
			   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="../index" class="brand-logo">
                                    <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                        <defs>
                                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                <stop stop-color="#000000" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                                            </lineargradient>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                                    <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                    <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <h2 class="brand-text text-primary ms-1">Fastcheck</h2>
                                </a>

                           <h4 class="card-title mb-1">Macera burada başlar 🚀</h4>
                                <p class="card-text mb-2">Uygulama yönetiminizi kolay ve eğlenceli hale getirin!</p>
                                <form method="post" class="form-horizontal"   id="regform">
                                    <div class="mb-1">
                                        <label class="form-label" for="register-username">Kullanıcı Adı</label>
                                        <input class="form-control" id="username" type="text" name="username" placeholder="FastCheck" aria-describedby="register-username" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="register-password">Parola</label>
										<div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control" id="password" type="password" name="password" placeholder="············" aria-describedby="register-password" tabindex="3" />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
									</div>
									</div>
                                    <div class="mb-1">
                                        <label class="form-label" for="register-password">Parolanızı Doğrulayın</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" type="password" id="confirmPassword" name="confirmPassword" placeholder="············" aria-describedby="register-password" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="customControlInline" type="checkbox" tabindex="4" />
                                            <label class="form-check-label" for="customControlInline" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><a href="#">Kurallar'ı</a> okudum kabul ediyorum.</label>
                                          <div class="scrolling-inside-modal">
                                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">FastCheck Kurallar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                Checker'da üretim (Generate) CC checklemek yasaktır. Aksi taktirde hesabınız kalıcı yasaklanacaktır.
                                                            </p>
                                                            <p>
                                                                Hesabınızı 2. bir şahıs ile paylaştığınızda bu (Multi Hesap) olduğu için otomatik olarak sitemizde kalıcı bir şekilde uzaklaştırılacaksınız.
                                                            </p>
                                                            <p>
                                                                Sitemize Proxy, VPN ile girişler yasaktır, bu Site yetkilileri tarafından fark edilirse MAC & IP Ban yiyeceksiniz.
                                                            </p>
                                                            <p>
                                                                Site yöneticilerine ısrar kalıcı ban sebebidir örnek ; (Ücretsiz üyelik verir misin?) vb.
                                                            </p>
                                                            <p>
                                                                Sitemizde 2 den fazla hesap açmak yasaktır, bu fark edilirse sitemizden kalıcı bir şekilde uzaklaştırılacaksınız, bakiyesi olan hesapların bakiyesi geri verilmeyecektir.
                                                            </p>
                                                            <p>
                                                                Başka birinin ucuza <b>Fast</b> hesabı sattığı hesaplar fark edilirse MAC & IP ban yiyecektir, böylelerine kesinlikle itibar etmeyeniz.
                                                            </p>
                                                            <p>
                                                                Ödemelerin geri iadesi yoktur, bu konuda ısrar hesabın silinmesi ve kalıcı ban sebebidir.
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tamam</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										</div>
                                        </div>
										<center>
                                    <div class="g-recaptcha" data-sitekey="6LfqxjwfAAAAAOUDK3W32TYbWS9s3ymRUt111nqm"></div></center><br>
                                    <button class="btn btn-primary w-100" tabindex="5" name="submit" type="submit">Kayıt Ol</button>
                                </form>
                                <script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
                                <p class="text-center mt-2"><span>Zaten hesabınız var mı?</span><a href="auth-login"><span> Bunun yerine oturum açın</span></a></p>
                                <div class="divider my-2">
                                    <div class="divider-text">veya</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a><a class="btn btn-google" href="#"><i data-feather="mail"></i></a><a class="btn btn-github" href="#"><i data-feather="github"></i></a></div>
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pages/auth-register.js"></script>
    <!-- END: Page JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
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
	 <script>

    $(document).ready(function(){


    

        
        $("#regform").submit(function(e){
            e.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
   
            
            if(!$("#customControlInline").is(':checked')){
                Swal.fire({
                    title: "HATA",
                    text: "Lütfen Kuralları Kabul Edin",
                    icon: "error",
                    width: '400px',
                    confirmButtonColor: '#6610f2',
                    allowOutsideClick: false,
					background: '#283046',
                });
                return false;
            }
			

        if(username != '' && password != '' && confirmPassword != ''){

            $.ajax({
                url: 'registerForm.php',
                type: 'POST',
                data: $(this).serialize(),
                success:function(data){
                    if(data == 'error1'){
                        Swal.fire({
                            title: "HATA",
                            text: "Kullanıcı Adı Zaten Var",
                            icon: "error",
                            width: '400px',
                            confirmButtonColor: '#6610f2',
                            allowOutsideClick: false,
							background: '#283046',
                        })

                    }else if(data == 'error3'){
                       Swal.fire({
                            title: "HATA",
                            text: "Parolalar Eşleşmiyor",
                            icon: "error",
                            width: '400px',
                            confirmButtonColor: '#6610f2',
                            allowOutsideClick: false,
							background: '#283046',
                        })

                    }else if(data == 'error4'){
                       Swal.fire({
                            title: "HATA",
                            text: "Kullanıcı Adı 15 Karakterden Büyük Olamaz!",
                            icon: "error",
                            width: '400px',
                            confirmButtonColor: '#6610f2',
                            allowOutsideClick: false,
							background: '#283046',
                        })

                    }else if(data == 'error5'){
                       Swal.fire({
                            title: "HATA",
                            text: "Kullanıcı Adı Özel Karakter İçeremez!",
                            icon: "error",
                            width: '400px',
                            confirmButtonColor: '#6610f2',
                            allowOutsideClick: false,
							background: '#283046',
                        })

                    }else if(data == 'errorCaptcha'){
                                Swal.fire({
                                    title: "Hata",
                                    text: "Lütfen Captchayi Çözünüz",
                                    icon: "error",
                                    width: '400px',
                                    confirmButtonColor: '#6610f2',
                                    allowOutsideClick: false,
									background: '#283046',
                                    })
                    }else{
                        
						 Swal.fire({
                            title: "BAŞARILI",
                            text: "Yeni Bir Macera Başlıyor...",
                            icon: "success",
                            width: '400px',
                            showConfirmButton: false,
                            allowOutsideClick: false,
							background: '#283046',
                            timer: 2000,
                        }).then(()=>{
                                    window.location.href="../anasayfa";
                                })    

                    }

                    
                }
            })

           
           
        }else{
            Swal.fire({
                title: "HATA",
                text: "Kullanıcı Adı ve Şifre Gereklidir",
                icon: "error",
                width: '400px',
                confirmButtonColor: '#6610f2',
                allowOutsideClick: false,
				background: '#283046',
            })
           
            
        }

     })

      
    })

</script>
</body>
<!-- END: Body-->

</html>