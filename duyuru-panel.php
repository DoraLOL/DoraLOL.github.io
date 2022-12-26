<?php
$customCSS = array();
$customJAVA = array();
require '../server/baglan.php';
require '../server/admincontrol.php';
include('bar.php');
?>
<?php
date_default_timezone_set('Europe/Istanbul');
$nowDate = date("d.m.Y");
if(isset($_POST['sil'])){
$sil = $_POST['sil']; 
$query = "DELETE FROM `sh_duyuru` WHERE id='$sil'";
if ($conn->query($query) === TRUE) {
	$success = 'DUYURU BAŞARIYLA SİLİNDİ';
    header('location: duyuru-panel.php');
} else {
    echo $conn->error;
}
}
if(isset($_POST['icerik']))
{
$icerik = $_POST['icerik'];
$uzunluk = strlen($icerik);
if($uzunluk > "60")
{
	$error = '60 Karakterden Fazla giremezsiniz!';
}
$queryy = "SELECT * FROM sh_duyuru";

if ($result = mysqli_query($conn, $queryy)) {

    $rowcount = mysqli_num_rows( $result );
    $rowcount;
}
if($rowcount >= "4"){
	$error2 = '4 DUYURUDAN FAZLA GİREMEZSİN!';
}
else{
$query = "INSERT `sh_duyuru` SET d_icerik='$icerik',d_time='$nowDate'";

if ($conn->query($query) === TRUE) {
	$success = 'DUYURU BAŞARIYLA EKLENDİ';
    header('location: duyuru-panel.php');
} else {
    echo $conn->error;
}
}
}

?>
<style>
	.row{
	width: 1000px;
	margin: auto;
	}
</style>
<br>
<br>

<br>

<center><div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><img style="width: 30px;height: auto;" alt="">Duyuru Paylaşım</h4>
                    <br>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" role="tabpanel">

                            <form method="post">

                                <input class="form-control" type="text" name="icerik" id="icerik" placeholder="<?php if(isset($error)){echo $error;}else{
								if(isset($error2)){echo $error2;}
								else{
								if(isset($success)){
								echo $success;
								}
								else{
								echo 'Duyuru İçeriği Giriniz.';
								}
								}
								}?>"><br>
                        </div>

                        <center>
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Paylaş  </button> </form>
                        </center>
                        <div class="table-responsive">

                            <table id="zero-conf" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Duyuru İçeriği</th>
                                        <th>Yayın Tarihi</th>
										<th>Düzenle</th>
										<th>Sil</th>
                                    </tr>
                                </thead>
								<?php 
								$query = mysqli_query($conn, "SELECT * FROM `sh_duyuru`");
								while ($getvar = mysqli_fetch_assoc($query)) {
								echo '
								<tr><td>'.$getvar['d_icerik'].'</td>
								<td>'.$getvar['d_time'].'</td>
								<td><a href="duyuru-edit.php?id='.$getvar['id'].'"><button>EDİTLE</button></a></td>
								<td><form method="POST"><button type="submit" name="sil" value="'.$getvar['id'].'">SİL</button></form></td>
								';
								}
								?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


	</div></center>

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
