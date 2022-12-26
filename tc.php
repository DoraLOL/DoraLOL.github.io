<?php
session_start();
include 'func/gen_func.php';
include '../server/control.php';
control_user();
include('inc/bar.php');

error_reporting(0);

?>
<?php if ($_SESSION['k_rol'] === "1") { ?>




<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
include("bar.php")

?>
            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="index.php">
                        <div class="d-flex align-items-center"><img class="me-2" /><span class="font-sans-serif">PENTA</span>
                        </div>
                    </a>

                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        <li class="nav-item">
                            <div class="theme-control-toggle fa-icon-wait px-2">
                                <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                            </div>
                        </li>

                        <li class="nav-item dropdown">



                        </li>
                        <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="../assets/img/team/userlogo.png" alt="" />

                                </div>
                            </a>

                        </li>
                    </ul>
                </nav>
                <div class="row">

                <div class="col-xl-12 col-md-6">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h4 class="card-title mb-4">
T.C SORGU 
</h4>
<p style="color: #fff">Sorgulanacak kişinin T.C giriniz.</p>
<div class="block-content tab-content">
<div class="tab-pane active" id="tc" role="tabpanel">
	<form action="" method="post">
<input require maxlength="11" class="form-control" style="opacity:0.8;" type="text" name="tc" id="tc" placeholder="T.C"><br>



<center class="nw">
<button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula </button>
<button onclick="clearResults()" id="durdurButon" class="btn waves-effect waves-light btn-rounded btn-danger btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
<span><i class="fas fa-trash-alt"></i> Sıfırla </span></button>

</center>
<div class="table-responsive">
<table id="zero-conf" class="table table-hover" style="width:100%">
<thead>

</thead>
<tbody id="jojjoojj">
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> <script>
                            function checkNumber() {
                                $.ajax({
                                    url: "../api/nufus.php",
                                    type: "POST",
                                    data: {
                                        ad: $("#ad").val(),
                                        soyad: $("#soyad").val(),
                                    },
                                    success: (res) => {
                                        if (res) {
                                            var json = res;
                                            $("#responseMernis").html(json)
                                        } else {
                                            alert("Hata oluştu!");
                                            return;
                                        }
                                    },
                                    error: () => {
                                        alert("Hata oluştu!");
                                    }
                                });
                            }
                        </script>

                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>



                <!-- ===============================================-->
                <!--    JavaScripts-->
                <!-- ===============================================-->
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

</body>

</html>


<?php } ?>