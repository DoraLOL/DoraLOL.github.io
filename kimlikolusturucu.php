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
    <title>FastCheck - Kimlik Oluşturucu</title>
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-tour.css">
    <link href="app-assets/style.min.css" rel="stylesheet">
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(75617293, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
</head>

 <?php
        include_once("includes/header.php");
        ?>

    <!-- BEGIN: Main Menu-->
      <?php
        include_once("includes/menu.php");
        ?>
		  <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Kimlik Oluşturucu</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
									<li class="breadcrumb-item"><a href="#">Diğer Araçlar</a>
                                    </li>
                                    <li class="breadcrumb-item active">Kimlik Oluşturucu
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
                                    <h4 class="card-title">FastCheck Kimlik Oluşturucu</h4>
                                </div>
								<form action="#" class="row" id="form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">İsim:</label>
                                                <input type="text" class="form-control" name="name"
                            placeholder="Kimlik üzerinde yazacak ismi girin." required />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Soyisim:</label>
                                                <input type="text" class="form-control" name="surname"
                            placeholder="Kimlik üzerinde yazacak soyismi girin." required />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="disabledInput">Doğum Tarihi:</label>
                                                <input class="form-control" name="birth_date" type="date" required />
                                            </div>
                                        </div>
										<div class="mb-1">
                                        <label class="form-label" for="basicSelect">Cinsiyet:</label>
                                        <select name="gender" class="form-select" id="basicSelect">
                                            <option value="E / M" option>Erkek</option>
                                            <option value="K / F">Kadın</option>
                                        </select>
                                    </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helperText">T.C. Kimlik Numarası:</label>
                                                <input type="number" name="tckn"
                            placeholder="Kimlik üzerinde yazacak TC numarasını girin." required class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Seri Numarası:</label>
                                            <input class="form-control" name="document_number"
                            placeholder="Kimlik üzerinde yazacak seri numarasını girin." required />
                                           </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										 <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Son Geçerlilik Tarihi:</label>
                                            <input class="form-control" name="valid_until" type="date" required />
                                        </div>
										</div>
                                         <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										 <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Uyruk:</label>
                                            <input class="form-control" value="T.C./TUR" readonly />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Anne Adı:</label>
                                            <input type="text" class="form-control" name="mother_name"
                            placeholder="Kimlik üzerinde yazacak anne ismini girin." required />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Baba Adı:</label>
                                            <input type="text" class="form-control" name="father_name"
                            placeholder="Kimlik üzerinde yazacak baba ismini girin." required" />
                                        </div>
										</div>
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Kimlik Fotoğrafı:</label>
                                            <input class="form-control" type="file" name="image" accept="image/*"
                            required />
									   </div>
										<div class="content-body">
                <!-- Start of Bootstrap Toasts -->
                <section id="bootstrap-toasts">
									<button class="btn btn-success toast-basic-toggler mt-2 form-control" type="submit">Kimlik Oluştur</button></form>
                                      <div class="toast-container">
                                        <div class="toast basic-toast position-fixed top-0 end-0 m-2" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <img src="app-assets/images/logo/logo.png" class="me-1" alt="Toast image" height="18" width="25" />
                                                <strong class="me-auto">FastCheck Sitesinden Mesaj</strong>
                                                <small class="text-muted">az önce</small>
                                                <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">Oluşturma işlemi başlatıldı, lütfen bekleyiniz...</div>
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
                </section>
				<div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Oluşturulan Kimlik Görselleri</h4>
                            </div>
                            <div class="card-body">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
				 <div class="card-body">
                <div class="row">
                    <div class="text-one">Yukarıdaki form aracılığı ile kimlik oluşturduğunuzda burada gözükecektir.
                    </div>
                    <div class="text-two d-none">Oluşturulan kimlik görselleri aşağıda gösterilmiştir. Butona tıklayarak
                        cihazınıza indirebilirsiniz.</div>
                    <div class="col-lg-6 mt-3">
                        <img src="img/front-empty.png" class="front-image mw-100">
                        <button class="btn btn-success shadow mt-3" id="download-front" disabled>Görseli İndir</button>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <img src="img/back-empty.png" class="back-image mw-100">
                        <button class="btn btn-success shadow mt-3" id="download-back" disabled>Görseli İndir</button>
                    </div>
                </div>
            </div>
    </div>
    <div class="side-container">
        <div class="front">
            <img src="#" class="face">
            <img src="#" class="face-right">
            <div class="tckn"></div>
            <div class="name"></div>
            <div class="surname"></div>
            <div class="birth_date"></div>
            <div class="gender"></div>
            <div class="document_number"></div>
            <div class="valid_until"></div>
        </div>
        <div class="back">
            <div class="mother_name"></div>
            <div class="father_name"></div>
            <div class="mrz"></div>
        </div>
    </div>
	</thead>
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
	
	
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
	<script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->
    <script src="app-assets/domtoimage.min.js"></script>
    <script src="app-assets/script.min.js"></script>
    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
	 <script src="app-assets/js/scripts/components/components-bs-toast.js"></script>
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
    <!-- END: Theme JS-->

</body>
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