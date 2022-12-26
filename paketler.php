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
    <title>FastCheck - Üyelik Paketleri</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
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
    <link rel="stylesheet" type="text/css" href=".assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="sweetaler.js"></script>
<script src="jquery.toast.js"></script>
<script>



function paket(){
    
Swal.fire({
  title: 'Satın Almak İstediğine Emin misin?',
  text: "Bu işlemin geri dönüşü yoktur.",
  icon: 'error',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Hayır!',
  confirmButtonText: 'Evet!'
}).then((result) => {
  if (result.isConfirmed) {

    let yillik = document.getElementById('priceSwitch');
    if (yillik.checked == true)
    {
        let checkedid = 1;
        let key = 1;
        $.ajax({
        url: "includes/paket-api.php",
        type: "POST",
        data: {
            key : key,
            checkedid : checkedid
        },
        success:function(data){
            if(data == 'yetersizBakiye'){
                            Swal.fire({
                                title: "Hata",
                                text: "Yetersiz Bakiye",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
            else if(data == 'paketVar'){
                            Swal.fire({
                                title: "Hata",
                                text: "Zaten Bir Üyeliğiniz Mevcut",
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
                                text: "Satın Alım Başarılı",
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
    else{
        let checkedid = 2;
        let key = 1;
        $.ajax({
        url: "includes/paket-api.php",
        type: "POST",
        data: {
            key : key,
            checkedid : checkedid
        },
        success:function(data){
            if(data == 'yetersizBakiye'){
                            Swal.fire({
                                title: "Hata",
                                text: "Yetersiz Bakiye",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
            else if(data == 'paketVar'){
                            Swal.fire({
                                title: "Hata",
                                text: "Zaten Bir Üyeliğiniz Mevcut",
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
                                text: "Satın Alım Başarılı",
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
   
}
})
}

function paket1(){
    Swal.fire({
  title: 'Satın Almak İstediğine Emin misin?',
  text: "Bu işlemin geri dönüşü yoktur.",
  icon: 'error',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Hayır!',
  confirmButtonText: 'Evet!'
}).then((result) => {
  if (result.isConfirmed) {

    let yillik = document.getElementById('priceSwitch');
    if (yillik.checked == true)
    {
        let checkedid = 1;
        let key = 2;
        $.ajax({
        url: "includes/paket-api.php",
        type: "POST",
        data: {
            key : key,
            checkedid : checkedid
        },
        success:function(data){
            if(data == 'yetersizBakiye'){
                            Swal.fire({
                                title: "Hata",
                                text: "Yetersiz Bakiye",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
            else if(data == 'paketVar'){
                            Swal.fire({
                                title: "Hata",
                                text: "Zaten Bir Üyeliğiniz Mevcut",
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
                                text: "Satın Alım Başarılı",
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
    else{
        let checkedid = 2;
        let key = 2;
        $.ajax({
        url: "includes/paket-api.php",
        type: "POST",
        data: {
            key : key,
            checkedid : checkedid
        },
        success:function(data){
            if(data == 'yetersizBakiye'){
                            Swal.fire({
                                title: "Hata",
                                text: "Yetersiz Bakiye",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
            else if(data == 'paketVar'){
                            Swal.fire({
                                title: "Hata",
                                text: "Zaten Bir Üyeliğiniz Mevcut",
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
                                text: "Satın Alım Başarılı",
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
}
})
}

function paket2(){
    Swal.fire({
  title: 'Satın Almak İstediğine Emin misin?',
  text: "Bu işlemin geri dönüşü yoktur.",
  icon: 'error',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Hayır!',
  confirmButtonText: 'Evet!'
}).then((result) => {
  if (result.isConfirmed) {

    let yillik = document.getElementById('priceSwitch');
    if (yillik.checked == true)
    {
        let checkedid = 1;
        let key = 3;
        $.ajax({
        url: "includes/paket-api.php",
        type: "POST",
        data: {
            key : key,
            checkedid : checkedid
        },
        success:function(data){
            if(data == 'yetersizBakiye'){
                            Swal.fire({
                                title: "Hata",
                                text: "Yetersiz Bakiye",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
            else if(data == 'paketVar'){
                            Swal.fire({
                                title: "Hata",
                                text: "Zaten Bir Üyeliğiniz Mevcut",
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
                                text: "Satın Alım Başarılı",
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
    else{
        let checkedid = 2;
        let key = 3;
        $.ajax({
        url: "includes/paket-api.php",
        type: "POST",
        data: {
            key : key,
            checkedid : checkedid
        },
        success:function(data){
            if(data == 'yetersizBakiye'){
                            Swal.fire({
                                title: "Hata",
                                text: "Yetersiz Bakiye",
                                icon: "error",
                                width: '400px',
                                confirmButtonColor: '#6610f2',
                                allowOutsideClick: false,
								background: '#283046',
                                })
                            }
            else if(data == 'paketVar'){
                            Swal.fire({
                                title: "Hata",
                                text: "Zaten Bir Üyeliğiniz Mevcut",
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
                                text: "Satın Alım Başarılı",
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
}
})
}

</script>

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
                <section id="pricing-plan">
				
				                    <!-- title text and switch button -->
                    <div class="text-center">
                        <h1 class="mt-5">FastCheck Üyelik Paketleri</h1>
                        <p class="mb-2 pb-75">
                           Tüm planlar, ürününüzü geliştirmek için 20'den fazla gelişmiş araç ve özellik içerir. İhtiyaçlarınıza uygun en iyi planı seçin.
                        </p>
                        <div class="d-flex align-items-center justify-content-center mb-5 pb-50">
                            <h6 class="me-1 mb-0">Aylık</h6>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="priceSwitch" />
                                <label class="form-check-label" for="priceSwitch"></label>
                            </div>
                            <h6 class="ms-50 mb-0">Yıllık</h6>
                        </div>
                    </div>
                    <!--/ title text and switch button -->
				
				
					<div class="content-body">
                <section>
                    <div class="card">
                        <div class="card-body">
  
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered text-nowrap text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Fastpass</th>
                                            <th scope="col">Premium</th>
                                            <th scope="col">Premium+</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-start">Fiyat</th>
                                            <td class="text-primary">100.00
											<sup class="font-medium-1 fw-bold text-primary">₺</sup>/ay<br>250.00
											<sup class="font-medium-1 fw-bold text-primary">₺</sup>/yıl
													</td>
                                            <td class="text-primary">200.00
											<sup class="font-medium-1 fw-bold text-primary">₺</sup>/ay<br>500.00
											<sup class="font-medium-1 fw-bold text-primary">₺</sup>/yıl
													</td>
                                            <td class="text-primary">300.00
											<sup class="font-medium-1 fw-bold text-primary">₺</sup>/ay<br>750.00
											<sup class="font-medium-1 fw-bold text-primary">₺</sup>/yıl
													</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-start">Mernis 2015</th>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-start">Nüfus Sorgu</th>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-start">Adres Sorgu</th>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
																				<tr>
                                            <th scope="row" class="text-start">Doğum Tarihi Sorgu</th>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-start">Account Checker</th>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">CC Checker</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Banka Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Okul Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">İş Yeri Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Sınıf Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Aile Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Plaka Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Ad Soyad Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">GSM Sorgu</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
										<tr>
                                            <th scope="row" class="text-start">Hasta Tanı</th>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="x" class="text-danger font-medium-5"></i></td>
                                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-start">Satın Al</th>
                                            <td><button onclick="paket()" class="btn w-100 btn-outline-success mt-2" id="paket1">Satın Al</button></td>
                                            <td><button onclick="paket1()" class="btn w-100 btn-primary mt-2" id="paket2">Satın Al</button></td>
                                            <td><button onclick="paket2()" type="button" class="btn w-100 btn-outline-primary mt-2" id="paket3">Satın Al</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- / table -->
</div>
</div>

					<div class="pricing-free-trial">
                        <div class="row">
                            <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
                                <div class="pricing-trial-content d-flex justify-content-between">
                                    <div class="text-center text-md-start mt-3">
                                        <h3 class="text-primary">Hala ikna olmadınız mı ?<h3>
                                        <h5>Discord sunucumuza gelip çekiliş ile 14 günlük FastPremium üyeliği kazanma şansı elde edin.</h5>
                                        <a href="https://discord.gg/aQpVxkdn" target="_blank"><button class="btn btn-primary mt-2 mt-lg-3">Discord</button></a>
                                    </div>

                                    <!-- image -->
                                    <img src="app-assets/images/illustration/pricing-Illustration.svg" class="pricing-trial-img img-fluid" alt="svg img" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pricing faq -->
                    <div class="pricing-faq">
                        <h3 class="text-center">Sıkça Sorulan Sorular</h3>
                        <p class="text-center">En sık sorulan soruları yanıtlamaya yardımcı olalım.</p>
                        <div class="row my-2">
                            <div class="col-12 col-lg-10 col-lg-offset-2 mx-auto">
                                <!-- faq collapse -->
                                <div class="accordion accordion-margin" id="accordionExample">
                                    <div class="card accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Ödemem Ne Zaman Onaylanır ?
                                            </button>
                                        </h2>

                                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Yaptığınız ödemeden sonra 1 iş günü içerisinde bakiyenize hesabınıza
												tanımlanacaktır. Aksi takdirde yatırılmadığı zaman bizlerle canlı olarak
												iletişime geçebilirsiniz.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Kredi Kartı İle Ödeme Yapabilir Miyim ?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Sistemimiz otomatik bir şekilde ödemeye el verişli değildir.
												Fakat <a href="https://discord.com/invite/q73mmEr4D9" target="_blank">DISCORD</a> sunucumuza gelip bizlere ulaşarak, böyle bir ödeme yöntemini
												başarılı bir şekilde gerçekleştirebilirsiniz.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Deneme Amacıyla FastPremium Alabilir Miyim?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Böyle bir şey ne yazık ki söz konusu değildir.
												FastCheck yetkilisi olduğunu iddia eden kişilerle iletişim kurmayınız , 
												sadece web sitemiz üzerinden destek alınız.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ pricing faq -->
                </section>

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
	<script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
	<script src="app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
	
    <script src="app-assets/js/scripts/pages/page-pricing.js"></script>
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