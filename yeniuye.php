<?php
session_start();
include 'func/gen_func.php';
include '../server/control.php';
require '../server/admincontrol.php';
control_user();
include('bar.php');

error_reporting(0);

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Suck My Dick Bitches!">
    <meta name="keywords" content="worlwide,automation">
    <meta name="author" content="SkyCheck">

    <title><?php echo $page_title ?> - PENTA PRO</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">


    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<body class="<?php if (!empty($body_class)) {
                    echo $body_class;
                } ?>">
    <!--BAŞLANGIC-->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br><br><br>
	<br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <form action="../server/kontrol.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input name="k_mail" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                    <label for="floatingInput">Kullanıcı Adı</label>
                                </div>
                            </div>
							<div class="mb-3">
                                <div class="form-floating">
                                    <input name="k_adi" type="text" class="form-control" id="floatingAdi" placeholder="Jackson" maxlength="8" minlength="3" required>
                                    <label for="floatingAdi">Kullanıcı Adı(Tekrar)</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input name="k_sifre" type="password" class="form-control" id="floatingPassword" placeholder="Password" maxlength="16" minlength="8" required>
                                    <label for="floatingPassword">Şifre</label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button name="registerForm" type="submit" class="btn btn-info m-b-xs">Kayıt</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BİTİŞ-->
     <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/echarts/echarts.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/js/theme.js"></script>