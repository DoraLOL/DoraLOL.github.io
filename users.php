<?php
require '../server/baglan.php';
require '../server/admincontrol.php';
include('inc/header_main.php');
include('bar.php');
?>
<!--BAŞLANGIC-->
                <br>
                <br>
                <br>
                <br>
<style>
	.row{
	width: 1000px;
	}
</style>

<center><div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
        

				 

               <center> <table id="zero-conf" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Kullanıcı Adı</th>
                            <th>Tarayıcı</th>
                            <th>Üyelik Tipi</th>
                            <th>Başlangıç Tarihi</th>
                            <th>İşletim Sistemi</th>
                            <th>Durum</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM `sh_kullanici`");
                        while ($getvar = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td></td>
                                <td><?php echo  $getvar['k_mail'] ?></td>
                                <td><?php echo  $getvar['k_browser'] ?></td>
                                <td><?php
                                    $roll = $getvar['k_rol'];
                                    switch ($roll) {
                                        case '0':
                                            $uyelik = "V.İ.P";
                                            break;
                                        case '1':
                                            $uyelik = "Admin";
                                            break;
                                        case '2':
                                            $uyelik = "Premium";
                                            break;
                                    }
                                    echo $uyelik;
                                    ?></td>
                                <td><?php echo  $getvar['k_time'] ?></td>
                                <td>
                                    <div class="platform_icon"><?php getos($getvar['k_os']) ?></div>
                                </td>
                                <td><?php
                                    echo '<a href="rolekle?id=' . $getvar['id'] . '"><button type="button" class="btn btn-info m-b-xs">Üyelik Ayarları</button></a';
                                    ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                   
				   </table> </center>
            </div>
        </div>
    </div>
	</div></center>
<!--BİTİŞ-->
	
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
