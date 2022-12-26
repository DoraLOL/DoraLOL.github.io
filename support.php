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
    <title>FastCheck - Sıkça Sorulan Sorular</title>
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

    <!-- BEGIN: Content-->
   <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Yardım/Destek</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Hesabım</a>
                                    </li>
                                    <li class="breadcrumb-item active">Yardım/Destek
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
                <!-- search header -->
                <section id="faq-search-filter">
                    <div class="card faq-search" style="background-image: url('app-assets/images/banner/banner.png')">
                        <div class="card-body text-center">
                            <!-- main title -->
                            <h2 class="text-primary">Bazı soruları cevaplayalım</h2>

                            <!-- subtitle -->
                            <p class="card-text mb-2">veya ihtiyacınız olan yardımı hızlıca bulmak için bir kategori seçin</p>

                            <!-- search input -->
                            <form class="faq-search-input">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-text">
                                        <i data-feather="search"></i>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Arama..." />
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /search header -->

                <!-- frequently asked questions tabs pills -->
                <section id="faq-tabs">
                    <!-- vertical tab pill -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                                <!-- pill tabs navigation -->
                                <ul class="nav nav-pills nav-left flex-column" role="tablist">
                                    <!-- payment -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="payment" data-bs-toggle="pill" href="#faq-payment" aria-expanded="true" role="tab">
                                            <i data-feather="credit-card" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Ödeme</span>
                                        </a>
                                    </li>

                                    <!-- delivery -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="delivery" data-bs-toggle="pill" href="#faq-delivery" aria-expanded="false" role="tab">
                                            <i data-feather="user" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Hesap</span>
                                        </a>
                                    </li>

                                    <!-- cancellation and return -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancellation-return" data-bs-toggle="pill" href="#faq-cancellation-return" aria-expanded="false" role="tab">
                                            <i data-feather="refresh-cw" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">İptal & İade</span>
                                        </a>
                                    </li>

                                    <!-- my order -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="my-order" data-bs-toggle="pill" href="#faq-my-order" aria-expanded="false" role="tab">
                                            <i data-feather="globe" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Site Sorunları</span>
                                        </a>
                                    </li>

                                    <!-- product and services-->
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-services" data-bs-toggle="pill" href="#faq-product-services" aria-expanded="false" role="tab">
                                            <i data-feather="flag" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Biz Kimiz</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- FAQ image -->
                                <img src="app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <!-- pill tabs tab content -->
                            <div class="tab-content">
                                <!-- payment panel -->
                                <div role="tabpanel" class="tab-pane active" id="faq-payment" aria-labelledby="payment" aria-expanded="true">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="credit-card" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Ödeme</h4>
                                            <span>Ödemeler hakkında yardıma mı ihtiyacın var?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-payment-qna">
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentOne">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-one" aria-expanded="false" aria-controls="faq-payment-one">
                                                    Nasıl ödeme yapacağımı anlamadım?
                                                </button>
                                            </h2>

                                            <div id="faq-payment-one" class="collapse accordion-collapse" aria-labelledby="paymentOne" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Ödemeleri Bakiye Yükle sayfsından yapmaktayız.Ödemeler size verilen özel kodlar üzerinden gerçekleştirilmektedir. Bu özel kodlar tamamen size aittir.
													Ödemeleri yaparken sizin parayı göndereceğiniz numaranın açıklama kısmına o kodu girmeniz gerekmektedir,
													ve yetkililerimiz o kod üzerinden kimin gönderdiğini anlıyor ve ona bakiyesini veriyor.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentTwo">
                                                <button class="accordion-button" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-two" aria-expanded="true" aria-controls="faq-payment-two">
                                                    Bakiyem yüklenmedi?
                                                </button>
                                            </h2>
                                            <div id="faq-payment-two" class="collapse show" aria-labelledby="paymentTwo" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Böyle bir durum ciddi bir problem olmadığı sürece mümkün değildir, fakat böyle bir şey meydana gelmiş ise şimdiden özürlerimizi iletiriz.
													Yapmanız gereken şey <a href="https://discord.gg/aQpVxkdn" target="_blank"><b>DISCORD</b></a> sunucumuza gelip Ticket açıp bizlerle canlı görüşmektir. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentThree">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-three" aria-expanded="false" aria-controls="faq-payment-three">
                                                    Bakiye yetersiz hatası?
                                                </button>
                                            </h2>
                                            <div id="faq-payment-three" class="collapse" aria-labelledby="paymentThree" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Eğer ki bakiyeniz var ise kullanmaya çalıştığınızda "Bakiyeniz Yetersiz" hatası alıyorsanız büyük ihtimalle sqlmizde bir sorun veya
													düzeltilmeyi bekleyen bir kod vardır. Sabırlı olun bizi bekleyin.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentFour">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-four" aria-expanded="false" aria-controls="faq-payment-four">
                                                    Ödeme yöntemleri nelerdir?
                                                </button>
                                            </h2>
                                            <div id="faq-payment-four" class="collapse accordion-collapse" aria-labelledby="paymentFour" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Ödemelerimizi sadece site üzerinden size özel verilen kod ile yaparız, başka hiç bir türlü site için satışlarımız yoktur. Ödeme yöntemlerimiz sadece
													<b>BITCON</b>, <b>PAPARA</b>, <b>ININAL</b>'dir.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentFive">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-five" aria-expanded="false" aria-controls="faq-payment-five">
                                                    Banka kartı ile ödeme yapabilir miyim?
                                                </button>
                                            </h2>
                                            <div id="faq-payment-five" class="collapse accordion-collapse" aria-labelledby="paymentFive" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Böyle bir şey ne yazık ki sitemizde mevcut değildir, eğer ki Papara, İninal, BTC gibi ödemeleri kullanamıyorsanız size 1 teklif daha sunabiliriz. 
													Bunun için discord sunucumuza gelip Sitenin <b>ADMIN</b>leri ile görüşmeniz gerekmektedir.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentSix">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-six" aria-expanded="false" aria-controls="faq-payment-six">
                                                    Bakiye ne kadar bir sürede tanımlanır?
                                                </button>
                                            </h2>
                                            <div id="faq-payment-six" class="collapse accordion-collapse" aria-labelledby="paymentSix" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Bakiye Yüklediğiniz andan itibaren 24 saat içerisinde bakiyeniz hesabınıza tanımlanacaktır. Aksi takdirde bizlerle Discord sunucumuz üzerinden iletişime geçebilirsiniz.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="paymentSeven">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-payment-seven" aria-expanded="false" aria-controls="faq-payment-seven">
                                                    Bakiye'yi başka bir hesaba aktarabilir miyim?
                                                </button>
                                            </h2>
                                            <div id="faq-payment-seven" class="collapse" aria-labelledby="paymentSeven" data-bs-parent="#faq-payment-qna">
                                                <div class="accordion-body">
                                                    Böyle bir şey şuanlık mümkün değildir. Ancak 01.01.2022 Tarihinden itibaren böyle bir özelliği getirmeyi planlamaktayız. Site üzerinde ki güncellemeleri görmek için
													<a href="https://discord.gg/aQpVxkdn" target="_blank"><b>DISCORD</b></a> sunucumuzdan görebilirsiniz.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delivery panel -->
                                <div class="tab-pane" id="faq-delivery" role="tabpanel" aria-labelledby="delivery" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Hesap</h4>
                                            <span>Hesabınız ile ilgili bir sorunlarınız mı var?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-delivery-qna">
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="deliveryOne">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-delivery-one" aria-expanded="false" aria-controls="faq-delivery-one">
                                                    Hesabım siteden yasaklandı?
                                                </button>
                                            </h2>

                                            <div id="faq-delivery-one" class="collapse accordion-collapse" aria-labelledby="deliveryOne" data-bs-parent="#faq-delivery-qna">
                                                <div class="accordion-body">
                                                    Böyle bir şey yaşadığınız için üzgünüz, fakat Fastcheck <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><b>KURALLAR</b></a>'ı <div class="scrolling-inside-modal">
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
                                        </div> gereği kurallarını suistimal eden hesaplar siteden otomatik olarak uzaklaştırılmaktadır.
													Bunun bir yanlışık olduğunu düşünüyorsanız <a href="https://discord.gg/aQpVxkdn" target="_blank"><b>DISCORD</b></a> sunucumuza gelip bizlerle canlı olarak iletişime geçebilirsiniz. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="deliveryTwo">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-delivery-two" aria-expanded="false" aria-controls="faq-delivery-two">
                                                    Hesabımı ortak kullanabilir miyim?
                                                </button>
                                            </h2>
                                            <div id="faq-delivery-two" class="collapse accordion-collapse" aria-labelledby="deliveryTwo" data-bs-parent="#faq-delivery-qna">
                                                <div class="accordion-body">
                                                    Böyle bir şey yetkilerimiz tarafından tespit edilirse sistemimizden kalıcı IP & MAC ban yiyeceksiniz. Ve yaptığınız ödemeler geri iade edilmeyecektir
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="deliveryThree">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-delivery-three" aria-expanded="false" aria-controls="faq-delivery-three">
                                                    Bilgilerim güvende mi, yaptığım sorgular kayıt ediliyor mu?
                                                </button>
                                            </h2>
                                            <div id="faq-delivery-three" class="collapse" aria-labelledby="deliveryThree" data-bs-parent="#faq-delivery-qna">
                                                <div class="accordion-body">
                                                    Hayır. Kayıt edilmiyor, fakat sistemimizin güvenliği açısından IP adresi oluşturma tarihiniz gibi şeyleri log tutmaktayız,
													endişelenmenize gerek yok. Bu bilgileriniz tamamen şifreli bir şekilde veritabanımızda kayıt altına alınmaktadır.
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <!-- cancellation return  -->
                                <div class="tab-pane" id="faq-cancellation-return" role="tabpanel" aria-labelledby="cancellation-return" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="refresh-cw" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">İptal & İade</h4>
                                            <span>Ödemenizi iptal veya iade etmek mi istiyorsunuz?</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-cancellation-qna">
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="cancellationOne">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-cancellation-one" aria-expanded="false" aria-controls="faq-cancellation-one">
                                                    Para iadesi alabilir miyim?
                                                </button>
                                            </h2>

                                            <div id="faq-cancellation-one" class="collapse" aria-labelledby="cancellationOne" data-bs-parent="#faq-cancellation-qna">
                                                <div class="accordion-body">
                                                    Maalesef, illegal sitesi olduğumuzdan dolayı sitede işi bitip sonra para iadesi isteyen çok kişi oluyor. Ve bizde para iadesi yapmamayı tercih ediyoruz.
													Anlayışınız için teşekkür ederiz.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="cancellationTwo">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-cancellation-two" aria-expanded="false" aria-controls="faq-cancellation-two">
                                                    Satın aldığım üyeliği geri verebilir miyim?
                                                </button>
                                            </h2>
                                            <div id="faq-cancellation-two" class="collapse" aria-labelledby="cancellationTwo" data-bs-parent="#faq-cancellation-qna">
                                                <div class="accordion-body">
                                                    Satın aldığınız üyeliği geri verebilirsiniz, fakat bunu discord sunucumuza gelerek bildirebilirsiniz.
													NOT ; üyelik geri verildiğinde sitede eski bakiyenize döneceksiniz.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- my order -->
                                <div class="tab-pane" id="faq-my-order" role="tabpanel" aria-labelledby="my-order" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="globe" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Site Sorunları</h4>
                                            <span>Site & sistem sorunlarına göz atın.</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-my-order-qna">
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="myOrderOne">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-my-order-one" aria-expanded="false" aria-controls="faq-my-order-one">
                                                    CC Pos sunucusu ne zaman açılır?
                                                </button>
                                            </h2>

                                            <div id="faq-my-order-one" class="collapse accordion-collapse" aria-labelledby="myOrderOne" data-bs-parent="#faq-my-order-qna">
                                                <div class="accordion-body">
                                                    Bu sorunun cevabı kesin değildir.FastCheck olarak belli bir zaman vererek POS'larımızı açmıyoruz.En hızlı ve doğru sonuç veren POS'ları geliştirmekteyiz ve hazır olduğunda kullanıma açıyoruz.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="myOrderTwo">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-my-order-two" aria-expanded="false" aria-controls="faq-my-order-two">
                                                    Üretilmiş kartlar yasak mı?						
                                                </button>
                                            </h2>
                                            <div id="faq-my-order-two" class="collapse accordion-collapse" aria-labelledby="myOrderTwo" data-bs-parent="#faq-my-order-qna">
                                                <div class="accordion-body">
                                                    FastCheck olarak en katı kurallarımızdan biri de geçersiz kartları POS'larımızda kullanmanızdır.Geçersiz kartlar POS'larımıza zarar vermekte ve hızlı bir şekilde işlev göremez hale gelmesine sebep olmaktadır.Üretilmiş , geçersiz kart numarası giren kullanıcılar sistem tarafından tespit edilip 5 gün boyunca sistemden uzaklaştırılmaktadır.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="myOrderThree">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-my-order-three" aria-expanded="false" aria-controls="faq-my-order-three">
                                                    Kart geçersiz hatası nedir?
                                                </button>
                                            </h2>
                                            <div id="faq-my-order-three" class="collapse" aria-labelledby="myOrderThree" data-bs-parent="#faq-my-order-qna">
                                                <div class="accordion-body">
                                                    Kartlarınızı düzenlemediğiniz takdirde bu hatayla karşılaşmanız muhtemeldir.Data düzeltici sayfasından kartlarınızı düzelttikten sonra tekrar deneyiniz.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- product services -->
                                <div class="tab-pane" id="faq-product-services" role="tabpanel" aria-labelledby="product-services" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="flag" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Biz Kimiz?</h4>
                                            <span>Bizi daha yakından tanıyın.</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-product-qna">
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="productOne">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-product-one" aria-expanded="false" aria-controls="faq-product-one">
                                                    Biz kimiz?
                                                </button>
                                            </h2>

                                            <div id="faq-product-one" class="collapse accordion-collapse" aria-labelledby="productOne" data-bs-parent="#faq-product-qna">
                                                <div class="accordion-body">
                                                    Biz bu işi hobi edinmiş, bu işten zevk alan kişileriz. Biz FastCheck yönetim ekibi olarak 7 aydır sürdürdüğümüz bu ismi sürdürmeye devam edeceğiz.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card accordion-item">
                                            <h2 class="accordion-header" id="productTwo">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-product-two" aria-expanded="false" aria-controls="faq-product-two">
                                                    Amacımız nedir?
                                                </button>
                                            </h2>
                                            <div id="faq-product-two" class="collapse accordion-collapse" aria-labelledby="productTwo" data-bs-parent="#faq-product-qna">
                                                <div class="accordion-body">
                                                    Amacımız tamamen hobiye dayanmaktadır. Bunun yanında sanal ortamda az da olsa ses çıkarmak, gündemde kalmak, ve bir yakını kaçırılan kişilerin eline daha hızlı bilgi vermek için kurulduk.
                                                </div>
                                            </div>
                                        </div>
										<div class="card accordion-item">
                                            <h2 class="accordion-header" id="productTwo">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-product-two" aria-expanded="false" aria-controls="faq-product-two">
                                                    Neden Fast?
                                                </button>
                                            </h2>
                                            <div id="faq-product-two" class="collapse accordion-collapse" aria-labelledby="productTwo" data-bs-parent="#faq-product-qna">
                                                <div class="accordion-body">
                                                    Fast işi tamamen gönül işidir, bu sitenin Fast olması hakkında çok düşündük ve en uygun ismin Fast olacağına karar verdik. Çün ki Fast gibi bir istihbarat grubu, ve bir illegal gruptu. bizde bu grubun adı ile devam etmekteyiz. Bize görede bu işe göre en uygun isim Fastcheck'tir.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- / frequently asked questions tabs pills -->

                <!-- contact us -->
                <section class="faq-contact">
                    <div class="row mt-5 pt-75">
                        <div class="col-12 text-center">
                            <h2>Hala bir sorunuz mu var?</h2>
                            <p class="mb-3">
                                SSS'mizde bir soru bulamazsanız, her zaman bizimle iletişime geçebilirsiniz. Kısa süre içinde size cevap vereceğiz!
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center faq-contact-card shadow-none py-1">
                                <div class="accordion-body">
                                    <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                        <i data-feather="chrome" class="font-medium-3"></i>
                                    </div>
                                    <h4><a href="https://discord.gg/aQpVxkdn" target="_blank" class="text-white">Fast Community</a></h4>
                                    <span class="text-body">Her zaman yardımcı olmaktan mutluluk duyarız!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center faq-contact-card shadow-none py-1">
                                <div class="accordion-body">
                                    <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                                        <i data-feather="mail" class="font-medium-3"></i>
                                    </div>
                                    <h4>support@Fastcheck.net</h4>
                                    <span class="text-body">Daha hızlı yanıt almanın en iyi yolu!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ contact us -->

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