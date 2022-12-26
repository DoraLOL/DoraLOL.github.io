

<?php
session_start();
include 'func/gen_func.php';
include '../server/control.php';
require '../server/rolecontrol.php';
control_user();
include('inc/bar.php');

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
                <div class="row">

                <div class="col-xl-12 col-md-6">

					
					<style>
             #disarisi

{

height: 500px;

overflow: hidden;

position: relative;

width: 635px;

}

#icerisi

{

height: 2000px;

left: -10px;

position: absolute;

top: -620px;

width: 700px;

}
			</style>



<div id="disarisi"><iframe id="icerisi" src="https://hesapno.com/cozumle_iban" frameborder="0" scrolling="no" width="320" height="240"></iframe></div>


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

