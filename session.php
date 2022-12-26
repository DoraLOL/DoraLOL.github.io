<?php
error_reporting(0);
session_start();
if (empty($_COOKIE['k_adi'])) {
    header("location: /login/");
}
$page_title = 'Session';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Suck My Dick Bitches!">
    <meta name="keywords" content="worlwide,automation">
    <meta name="author" content="SkyCheck">

    <title><?php echo $page_title ?> - SkyCheck</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">


    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<body class="login-page">

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <div class="authent-logo">
                            <img src="/<?php echo $_COOKIE['k_profil'] ?>" alt="">
                        </div>
                        <div class="authent-text">
                            <p>Welcome back <?php echo $_COOKIE['k_adi'] ?>!</p>
                            <p>Enter your password to unlock.</p>
                        </div>

                        <?php if ($_GET['check'] == 'wrong') { ?>
                            <div class="alert alert-danger" role="alert">
                                You must be trying wrong password!
                            </div>
                        <?php } ?>
                        <form method="POST" action="../server/kontrol.php">
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input name="sessionPass" type="password" class="form-control" id="floatingPassword" placeholder="Password" required autofocus>
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button name="sessionStart" type="submit" class="btn btn-secondary m-b-xs">Unlock</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BİTİŞ-->
    <?php include('inc/footer_main.php'); ?>