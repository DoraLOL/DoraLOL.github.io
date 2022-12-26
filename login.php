<?php
$customJAVA = array(
    '<script src="https://google.com/recaptcha/api.js"></script>',

);
error_reporting(0);
session_start();

if (empty($_SESSION['id'])) {
    if (!empty($_COOKIE['k_adi'])) {
        header("location: /session");
    }
}

if ($_SESSION['id']) {
    header("location: /panel");
}
$page_title = 'Login';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title><?php echo $page_title ?> - SWAT Check</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assetss/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assetss/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assetss/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assetss/plugins/pace/pace.css" rel="stylesheet">
    <link rel="shortcur icon" href="../assetss/icon/favicon.ico">


    <link href="../assetss/css/main.min.css" rel="stylesheet">
    <link href="../assetss/css/custom.css" rel="stylesheet">
</head>

<body class="login-page">
    <!--BAŞLANGIC-->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <img style="height: 90px;" alt="image" src="/assetss/icon/favicon.ico" class="SkyChecklogo">
                        <div style="margin-top: 30px;" class="authent-text">
                            <p>Welcome to SWAT Check</p>
                            <p>Please Sign-in to your account.</p>
                        </div>
                        <?php if ($_GET['alert'] == 'wrong') { ?>
                            <div class="alert alert-danger" role="alert">
                                You must be trying wrong password!
                            </div>
                        <?php } ?>
                        <form action="../server/kontrol.php" method="POST">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input name="k_mail" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Username</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input name="k_sifre" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input name="rememberMe" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LcWyMgdAAAAAJOM0HuiBRux8VmsjnOhhhcfesXI"></div>
                            <div class="d-grid">
                                <button name="loginForm" type="submit" class="btn btn-info m-b-xs">Sign In</button>
                            </div>
                        </form>
                        <div class="d-grid">
                            <button onclick="window.open('http://discord.gg/ccshop');" class="btn btn-primary">Discord</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BİTİŞ-->
    <?php include('inc/footer_main.php'); ?>