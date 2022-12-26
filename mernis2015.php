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
		<meta name="description" content="FastChecker, Piyasanın en iyi ve en hızlı cc checker sitesidir. Data düzeltici, Account checker, Bin checker vb. birçok hizmeti ücretsiz sağlamaktadır. https:discord.gg/JvpMh4xkPe"/>
    <title>FastCheck - Mernis 2015</title>
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
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <!-- END: Vendor CSS-->
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
    <script>

    </script>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Mernis 2015</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Sorgu</a>
                                    </li>
									<li class="breadcrumb-item"><a href="#">Diğer</a>
                                    </li>
                                    <li class="breadcrumb-item active">Mernis 2015
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
			<div class="alert alert-info" role="alert">
                                            <div class="alert-body">
											<i data-feather="info" class="me-50"></i>
                                                Telefon kullanıyorsanız sorgulama yapmak için telefon ekranını ters (YATAY) hale getiriniz.
                                            </div>
                                        </div>
       <div class="content-body">
                <!-- Basic Inputs start -->
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">FastCheck Mernis 2015</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">TC NO :</label>
                                                <input type="number" class="form-control" name="ikibinonbestc"  id="ikibinonbestc" placeholder="Kişinin TC kimlik numarası" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">Ad :</label>
                                                <input type="text" class="form-control" name="ikibinonbesad"  id="ikibinonbesad" placeholder="Kişinin adı" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="disabledInput">Soyad :</label>
                                                <input type="text" class="form-control" name="ikibinonbessoyad"  id="ikibinonbessoyad" placeholder="Kişinin soyadı" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helperText">Ana Adı :</label>
                                                <input type="text" name="ikibinonbesanaad"  id="ikibinonbesanaad" class="form-control" placeholder="Kişinin Ana adı" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Baba Adı :</label>
                                            <input type="text" class="form-control" name="ikibinonbesbabaad"  id="ikibinonbesbabaad" placeholder="Kişinin Baba adı" />
                                           </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										 <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Doğum Tarihi :</label>
                                            <input type="text" class="form-control" id="readonlyInput" placeholder="Kişinin doğum tarihi" />
                                        </div>
										</div>
                                         <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										 <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Doğum Yeri :</label>
                                            <input type="text" class="form-control" name="ikibinonbesdogumyeri"  id="ikibinonbesdogumyeri" placeholder="Kişinin doğduğu yer" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Adres İl :</label>
                                            <input type="text" class="form-control" name="ikibinonbesadil"  id="ikibinonbesadil" placeholder="Kişinin adres ili" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Adres İlçe :</label>
                                            <input type="text" class="form-control" name="ikibinonbesadilce"  id="ikibinonbesadilce" placeholder="Kişinin adres ilçesi" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Nüfüs İl :</label>
                                            <input type="text" class="form-control" name="ikibinonbesnufusil"  id="ikibinonbesnufusil" placeholder="Kişinin nüfüs ili" />
                                       </div>
									   </div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Nüfüs İlçe :</label>
                                            <input type="text" class="form-control" name="ikibinonbesnufusilce"  id="ikibinonbesnufusilce" placeholder="Kişinin nüfüs ilçesi" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Mahalle :</label>
                                            <input type="text" class="form-control" name="ikibinonbesmahalle"  id="ikibinonbesmahalle" placeholder="Kişinin oturduğu mahalle" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Cadde/Sokak :</label>
                                            <input type="text" class="form-control" name="ikibinonbescadde"  id="ikibinonbescadde" placeholder="Kişinin oturduğu cadde/sokak" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Kapı No :</label>
                                            <input type="text" class="form-control" name="ikibinonbeskapino"  id="ikibinonbeskapino" placeholder="Kişinin oturduğu kapı no" />
                                        </div>
										</div>
										<div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
										<div class="mb-1">
                                            <label class="form-label" for="disabledInput">Daire No :</label>
                                            <input type="text" class="form-control" name="ikibinonbesdaireno"  id="ikibinonbesdaireno" placeholder="Kişinin oturduğu daire no" />
                                        </div>
										</div>
										<div class="content-body">
                <!-- Start of Bootstrap Toasts -->
                <section id="bootstrap-toasts">
									<button onclick="sorgula()" class="btn btn-primary toast-basic-toggler mt-2 form-control" >Sorgula</button></form>
                                      <div class="toast-container">
                                        <div class="toast basic-toast position-fixed top-0 end-0 m-2" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <img src="app-assets/images/logo/logo.png" class="me-1" alt="Toast image" height="18" width="25" />
                                                <strong class="me-auto">FastCheck</strong>
                                                <small class="text-muted">az önce</small>
                                                <button type="button" class="ms-1 btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">Sorgulama işlemi başlatıldı, lütfen bekleyiniz...</div>
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
                <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Search & Filter</h4>
                            <div class="row">
                                <div class="col-md-4 user_role"></div>
                                <div class="col-md-4 user_plan"></div>
                                <div class="col-md-4 user_status"></div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                          <div class="container">
                              <table class="user-list-table table" id="userListTable">
                                  <thead class="table-light">
                                      <tr>
                                      <th>TC</th>
                                            <th>ADI</th>
                                            <th>SOYADI</th>
                                            <th>ANAADI</th>
                                            <th>BABAADI</th>
											<th>DOGUMYERI</th>
                                            <th>DOGUMTARIHI</th>
                                            <th>CINSIYET</th>
                                            <th>NUFUSILI</th>
                                            <th>NUFUSULCESI</th>
                                            <th>ADRESIL</th>
                                            <th>ADRESILCE</th>
                                            <th>MAHALLE</th>
                                            <th>CADDE</th>
                                            <th>KAPINO</th>
                                            <th>DAIRENO</th>
                                      </tr>
                                  </thead>
                              </table>
                              
                          </div>
                            
                        </div>
                    </div>
                    <!-- list and filter end -->
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
    <script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
	 <script src="app-assets/js/scripts/components/components-bs-toast.js"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->
    <script>
        function sorgula() {
            userListTable();
        }
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        function userListTable(){
            let tcn = document.getElementById("ikibinonbestc");
            let tc = tcn.value;
            let adı = document.getElementById("ikibinonbesad"); 
            let ad = adı.value;
            let soyadı = document.getElementById("ikibinonbessoyad"); 
            let soyad = soyadı.value;
            let adresili = document.getElementById("ikibinonbesadil"); 
            let adresil = adresili.value;
            let babaadi = document.getElementById("ikibinonbesbabaad"); 
            let babaad = babaadi.value;
            let anneadi = document.getElementById("ikibinonbesanaad"); 
            let annead = anneadi.value;
            var table = $('#userListTable').DataTable();
            table.destroy();
          var userListTable = $("#userListTable").DataTable({
            
            processing: true,
            serverSide: true,
            "dom": 'lrtip',
            order:[],
            ajax:{
              url: 'apiler/sorgu2015api.php',
              type: 'POST',
              data:{
                  soyad:soyad,
                  adresil:adresil,
                  anaadi:annead,
                  tc:tc,
                  ad:ad,
                  babaadi:babaad
              }
            },

          })
        }
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