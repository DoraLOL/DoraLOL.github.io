<?php
session_start();
include 'func/gen_func.php';
include '../server/control.php';
include '../server/vipcontrol.php';
control_user();

error_reporting(0);

?>





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
                <div class="row row-sm">
                    <div class="col-lg-12">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 style="text-transform: none;" class="card-title">Rica Ediyoruz ÜNLÜ SORGU Yapmayınız.</h6>
										<h1 style="text-transform: none; font-size: 12px;" class="card-title">Not: Bu sorguyu kullanmak için hak satın almanız gerekir.</h1>

                                        <form>
                                            <div class="form-group">
                                                <input type="text" maxlength="11" class="form-control" id="tc" placeholder="T.C. Giriniz.">
                                                <br>
                                            </div>
                                            <center>
                                                <button style="padding: 10px 90px; border-radius: 10px;" autocomplete="0" type="button" onclick="checkNumber()" class="btn btn-primary btn-icon-text">
                                                    <i class="btn-icon-prepend" data-feather="check-circle"></i>
                                                    Sorgula!
                                                </button>
                                            </center>
                                            <br>
                                        </form>
                                        <center>
                                        <div class="card">
                                                <div id="wizard" class="wizard card-body">
                                                </div>
                                        </center>
                                        <script>
                                            function checkNumber() {
                                                $.ajax({
                                                    url: "../api/nufus.php",
                                                    type: "POST",
                                                    data: {
                                                        tc: $("#tc").val(),
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = res;
                                                            $("#wizard").html(json)
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
</div>
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