<?php
header("Content-Type: application/json; utf-8;");

$kullanici= "424903";
$url = "https://enstitu.hacettepe.edu.tr/aday/crud!adayOgrenciListe.action?aday_pk=$kullanici&limit=2";
$agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "ayricalik=aday_pk,aday_no,ad,soyad,adres,yazisma_adresi,cep_tel,ev_tel,is_tel,e_posta,mezun_tur,lisans_mezun_tarih,lisans_mezun_derece,lisans_mezun_universite,mezun_fakulte_yuksek_okul,mezun_bolum,mezun_tarih,mezun_derece,mezun_universite,mezun_enstitu,mezun_abd,mezun_op,askerlik_durum,tecil_tarih,calisilan_kurum,calisilan_gorev,onay,aday_tur,yerli_kimlik_pk.yerli_kimlik_pk,yerli_kimlik_pk.tc_kimlik_no,yerli_kimlik_pk.baba_adi,yerli_kimlik_pk.ana_adi,yerli_kimlik_pk.mahalle,yerli_kimlik_pk.medeni_hal,yerli_kimlik_pk.cinsiyet,yerli_kimlik_pk.dogum_tarih,yerli_kimlik_pk.cilt_no,yerli_kimlik_pk.aile_sira_no,yerli_kimlik_pk.sira_no,yerli_kimlik_pk.dogum_yer,yerli_kimlik_pk.il_pk.il_pk,yerli_kimlik_pk.il_pk.ad,yerli_kimlik_pk.ilce_pk.ilce_pk,yerli_kimlik_pk.ilce_pk.ad,yabanci_kimlik_pk.yabanci_kimlik_pk,yabanci_kimlik_pk.ikamet_izin_gecerli_tarih,yabanci_kimlik_pk.diploma_denklik_tarih,yabanci_kimlik_pk.diploma_denklik_bolum,yabanci_kimlik_pk.turkce_sinav_sonucu,yabanci_kimlik_pk.yurt_disi_adres,yabanci_kimlik_pk.medeni_hal,yabanci_kimlik_pk.dogum_tarih,yabanci_kimlik_pk.oturma_izin_bitis,yabanci_kimlik_pk.cinsiyet,yabanci_kimlik_pk.irtibat_kisi_ad_soyad,yabanci_kimlik_pk.irtibat_tel,yabanci_kimlik_pk.irtibat_adres,yabanci_kimlik_pk.burs_durumu,yabanci_kimlik_pk.baba_adi,yabanci_kimlik_pk.ana_adi,yabanci_kimlik_pk.dogum_yer,yabanci_kimlik_pk.pasaport_no,yabanci_kimlik_pk.yb_kimlik_no,yabanci_kimlik_pk.ulke_pk.ulke_pk,yabanci_kimlik_pk.ulke_pk.ad,dr_diploma_url,seri_no");
          
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
$json = json_decode($curl_scraped_page, true);

print_R($json);
?>