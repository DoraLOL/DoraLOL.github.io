<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="anasayfa"><span class="brand-logo">
				<svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                    <h2 class="brand-text">FastCheck</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li><a class="d-flex align-items-center" href="anasayfa"><i data-feather="home"></i></i><span class="menu-item text-truncate" data-i18n="AnaSayfa">Ana Sayfa</span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Çözümler</span><i data-feather="more-horizontal"></i>
                </li> 
								<?php  

$permm = $row['pre'];
if($permm != 3 )
{
?>
<?php  

$permm = $row['pre'];
if($permm != 2 )
{
?>
<?php  

$permm = $row['pre'];
if($permm != 1 )
{
?>
<?php  

$permm = $row['pre'];
if($permm != 0 )
{
?>
				  <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Authentication">Admin</span></a>
                    <ul class="menu-content">
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="admin-Fastcheck/app-user-list"><span class="menu-item text-truncate" data-i18n="KullaniciListesi"> Kullanıcı Listesi</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="admin-Fastcheck/banli-kullanicilar"><span class="menu-item text-truncate" data-i18n="BanliKullanicilar">Banlı Kullanıcılar</span></a>
                                </li>
                            </ul>
						</ul>
						</li>
										<?php
}

?>
				<?php
}

?>
				<?php
}

?>
				<?php
}

?>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user-check"></i><span class="menu-title text-truncate" data-i18n="Authentication">Checker</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Login">CC Checker</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="trchecker"><span class="menu-item text-truncate" data-i18n="TRChecker">TR Checker</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="uschecker"><span class="menu-item text-truncate" data-i18n="USChecker">US Checker</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Register">Account Checker</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="yemeksepetichecker"><span class="menu-item text-truncate" data-i18n="YemekSepetichecker">Yemek Sepeti Checker</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="blutvchecker"><span class="menu-item text-truncate" data-i18n="BlutvChecker">Blutv Checker</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="minecraftchecker"><span class="menu-item text-truncate" data-i18n="MinecraftChecker">Minecraft Checker</span></a>
                                </li>
                                 <li><a class="d-flex align-items-center" href="tokenchecker"><span class="menu-item text-truncate" data-i18n="tokenchecker">Token Checker</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="joygamechecker"><span class="menu-item text-truncate" data-i18n="joygamechecker">Joygame Checker</span></a>
                                </li>
                                	<li><a class="d-flex align-items-center" href="trendyolchecker"><span class="menu-item text-truncate" data-i18n="trendyolchecker">Trendyol Checker</span></a>
                                </li>
                                 	<li><a class="d-flex align-items-center" href="exxenchecker"><span class="menu-item text-truncate" data-i18n="exxenchecker">Exxen Checker</span></a>
                                </li>
                                 	<li><a class="d-flex align-items-center" href="zulachecker"><span class="menu-item text-truncate" data-i18n="zulachecker">Zula Checker</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="instagramchecker"><span class="menu-item text-truncate" data-i18n="instagramchecker">İnstagram Checker</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Forgot Password">Diğer</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="binchecker"><span class="menu-item text-truncate" data-i18n="BINChecker">BIN Checker</span></a>
                                </li>
                       </ul>
                        </li>
				</ul>
				                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="search"></i><span class="menu-title text-truncate" data-i18n="Form Elements">Sorgu</span></a>
                   
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Mernis2021">Mernis 2022</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="adres-sorgu"><span class="menu-item text-truncate" data-i18n="AdresSorgu">Adres Sorgu</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="nufus-sorgu"><span class="menu-item text-truncate" data-i18n="NüfusSorgu">Nüfus Sorgu</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="sinif-sorgu"><span class="menu-item text-truncate" data-i18n="SinifSorgu">
                                 Sınıf Sorgu</span></a>
								</li>
                                <li><a class="d-flex align-items-center" href="adsoyadsorgu"><span class="menu-item text-truncate" data-i18n="AdSoyadSorgu">Ad Soyad Sorgu</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="ailesorgu"><span class="menu-item text-truncate" data-i18n="AileSorgu">Aile Sorgu</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="bankasorgu"><span class="menu-item text-truncate" data-i18n="BankaSorgu">Banka Sorgu</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="isyerisorgu"><span class="menu-item text-truncate" data-i18n="İsYeriSorgu">İş Yeri Sorgu</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="gsmsorgu"><span class="menu-item text-truncate" data-i18n="GsmSorgu">GSM Sorgu</span></a>
                                </li>
								<li><a class="d-flex align-items-center" href="plakasorgu"><span class="menu-item text-truncate" data-i18n="PlakaSorgu">Plaka Sorgu</span></a>
                                </li>
                                <li><a class="d-flex align-items-center" href="404.html"><span class="menu-item text-truncate" data-i18n="SeriNoSorgu">Seri No Sorgu</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Forgot Password">Diğer</span></a>
                            <ul class="menu-content">
                                <li><a class="d-flex align-items-center" href="mernis2015"><span class="menu-item text-truncate" data-i18n="mernis2015">Mernis 2015</span></a>
                                </li>
                            </ul>
                        </li>
						</ul>
                </li>
                <li class=" navigation-header"><span data-i18n="Charts &amp; Maps">Diğer Araçlar</span><i data-feather="more-horizontal"></i>
                </li>
                        <li><a class="d-flex align-items-center" href="kimlikolusturucu"><i data-feather="image"></i><span class="menu-item text-truncate" data-i18n="TagTemizleyici">Kimlik Oluşturucu</span></a>
                        </li>
						
                        </li>
						<li><a class="d-flex align-items-center" href="404.html"><i data-feather="airplay"></i><span class="menu-item text-truncate" data-i18n="DDoSAttack">DDoS Attack</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="404.html"><i data-feather="message-square"></i><span class="menu-item text-truncate" data-i18n="smssender">SmS Sender</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="terminal"><i data-feather="terminal"></i><span class="menu-item text-truncate" data-i18n="terminal">Terminal</span></a>
                        </li>
				<li class=" navigation-header"><span data-i18n="Charts &amp; Maps">Hesabım</span><i data-feather="more-horizontal"></i>
                </li>
				        <li><a class="d-flex align-items-center" href="ayarlar"><i data-feather="settings"></i><span class="menu-item text-truncate" data-i18n="Ayarlar">Ayarlar</span></a>
                        </li>
						 <li><a class="d-flex align-items-center" href="dosyalar"><i data-feather="save"></i><span class="menu-item text-truncate" data-i18n="Dosyalar">Dosyalar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="discord" target="_blank"><i data-feather="chrome"></i><span class="menu-item text-truncate" data-i18n="TagTemizleyici">Discord Sunucumuz</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="gorevler"><i data-feather="calendar"></i><span class="menu-item text-truncate" data-i18n="Gorevler">Görevler</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="paketler"><i data-feather="box"></i><span class="menu-item text-truncate" data-i18n="UyelikPaketleri">Üyelik Paketleri</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="bakiyeyukle"><i data-feather="credit-card"></i><span class="menu-item text-truncate" data-i18n="BakıyeYukle">Bakiye Yükle</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="support"><i data-feather="help-circle"></i><span class="menu-item text-truncate" data-i18n="SSS">Yardım/Destek</span></a>
                        </li>
						<li><a class="d-flex align-items-center" href="cikis"><i data-feather="power"></i><span class="menu-item text-truncate" data-i18n="CikisYap">Çıkış Yap</span></a>
                        </li>
                </li>
            </ul>
        </div>
    </div>