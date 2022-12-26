<?php
require '../server/baglan.php';
require '../server/admincontrol.php';
include('bar.php');
?>
<style>
	.w3-container{
	width: 1000px;
	}
	</style>
<?php
$id =  $_GET['id'];
$yetkii = strip_tags($_POST['yetkii']);
if ($_POST['yetkii'] != "" && $_POST["sil"] !== "sil") {
    if ($yetkii === "0") {
        $newDate = 1;
    } else {
        date_default_timezone_set('Europe/Istanbul');
        $nowDate = date("Y-m-d");
        $newDate = strtotime('30 day', strtotime($nowDate));
        $newDate = date('Y-m-d', $newDate);
    }
    $query = "UPDATE `sh_kullanici` SET k_rol='$yetkii',u_time='$newDate' WHERE id=$id";

    if ($conn->query($query) === TRUE) { 
        header('location: /rolekle?id=' . $id);
    } else {
        echo $conn->error;
    }
} else if ($_POST["sil"]) {
    $sql = "DELETE FROM `sh_kullanici` WHERE `id`='$id'";
    if ($conn->query($sql) === TRUE) {
        header('location: /users');
    }
}

?>
<style>
    input[type="checkbox"].ios8-switch {
        position: absolute;
        margin: 8px 0 0 16px;
    }

    input[type="checkbox"].ios8-switch+label {
        position: relative;
        padding: 5px 0 0 50px;
        line-height: 2.0em;
    }

    input[type="checkbox"].ios8-switch+label:before {
        content: "";
        position: absolute;
        display: block;
        left: 0;
        top: 0;
        width: 40px;
        /* x*5 */
        height: 24px;
        /* x*3 */
        border-radius: 16px;
        /* x*2 */
        background: #fff;
        border: 1px solid #d9d9d9;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    input[type="checkbox"].ios8-switch+label:after {
        content: "";
        position: absolute;
        display: block;
        left: 0px;
        top: 0px;
        width: 24px;
        /* x*3 */
        height: 24px;
        /* x*3 */
        border-radius: 16px;
        /* x*2 */
        background: #fff;
        border: 1px solid #d9d9d9;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }

    input[type="checkbox"].ios8-switch+label:hover:after {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    input[type="checkbox"].ios8-switch:checked+label:after {
        margin-left: 16px;
    }

    input[type="checkbox"].ios8-switch:checked+label:before {
        background: #55D069;
    }
</style>
<script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName("yetkii")
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }
</script>
<center>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <br>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM `sh_kullanici` WHERE id='$id'");
    while ($getvar = mysqli_fetch_assoc($query)) { ?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
        <div class="w3-container">
            <ul class="w3-ul w3-card-4">
                <li class="w3-bar">
                   
                    <div class="w3-bar-item">
                        <span class="w3-large"><?php echo $getvar['k_adi'];
                                                echo " - ";
                                                echo $getvar['k_mail']; ?></span><br>
                        <span><?php
                                $rol = $getvar['k_rol'];
                                switch ($rol) {
                                    case '0':
                                        $yetki = "V.İ.P";
                                        break;
                                    case '1':
                                        $yetki = "Admin";
                                        break;
                                    case '2':
                                        $yetki = "Premium";
                                        break;
                                }
                                $uyetarih = $getvar['u_time'];
                                if ($uyetarih != "1") {
                                    $nowDate = date("Y-m-d");
                                    $d1 = new DateTime($nowDate);
                                    $d2 = new DateTime($uyetarih);
                                    $gun = $d1->diff($d2)->days;
                                    $uyeliktarih = "| Üyelik Bitiş Tarihi : $uyetarih | Kalan gün : $gun";
                                }
                                echo $yetki . ' ';
                                if (empty($uyeliktarih)) {
                                } else {
                                    echo $uyeliktarih;
                                }
                                ?></span>
                    </div>
                    <form method="POST" action="">
                        <br>
                        <input class="ios8-switch" onChange="this.form.submit()" <?php if ($rol === "0") echo "checked" ?> id="checkbox-1" type="checkbox" name="yetkii" value="0" onclick="onlyOne(this)">
                        <label for="checkbox-1" style="display: inline;">V.İ.P</label>
                        <input class="ios8-switch" onChange="this.form.submit()" <?php if ($rol === "2") echo "checked" ?> id="checkbox-2" type="checkbox" name="yetkii" value="2" onclick="onlyOne(this)">
                        <label for="checkbox-2" style="display: inline;">Premium</label>
                        <input class="ios8-switch" onChange="this.form.submit()" <?php if ($rol === "1") echo "checked" ?> type="checkbox" id="checkbox-3" name="yetkii" value="1" onclick="onlyOne(this)">
                        <label for="checkbox-3" style="display: inline;">Admin Üye</label>
                        <button onclick="this.form.submit()" name="sil" value="sil" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 30px; height: 30px; outline: none; margin-left: 5px; display: flex; justify-content: center; align-items: center;"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </li>
        </div>
    <?php } ?>
</center>

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
<!--BİTİŞ-->