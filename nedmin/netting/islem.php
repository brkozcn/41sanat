<?php
ob_start();
session_start();
include 'baglan.php';

date_default_timezone_set('Europe/Istanbul');


// Admin PaneL Giriş
if (isset($_POST['login'])) {
    $username = $_POST['kadi'];
    $pass = md5($_POST['ksifre']);


    if ($username && $pass) {
        $usrsor = $db->prepare("SELECT * FROM user WHERE  BINARY user_name=:usr and user_pass=:pass");
        $usrsor->execute(array(
            'usr' => $username,
            'pass' => $pass
        ));

        echo $say = $usrsor->rowCount();

        if ($say > 0) {

            $_SESSION['user_name'] = $username;
            header('Location: ../root');
        } else {
            header('Location: ../login?login=no');
        }
    }
}
// User Avatar Güncelleme
if (isset($_POST['avatar_update'])) {


    $user_id = $_POST['user_id'];

    $uploads_dir = "../assets/img/avatars";
    @$tmp_name = $_FILES['user_avatar']["tmp_name"];
    @$name = $_FILES['user_avatar']['name'];
    $output = strstr($name, '.', false);;

    echo $uploads_dir;

    $random1 = $_POST['user_id'];
    $random2 = "-";
    $random3 = $_SESSION['user_name'];
    $random = $random1 . $random2 . $random3;
    $r_name = $random . $output;
    $refimgyol = substr($uploads_dir, 3) . "/" . $r_name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$r_name");



    $duzenle = $db->prepare("UPDATE user SET 
        user_avatar=:avatar 
        
        WHERE user_id=:id");

    $update = $duzenle->execute(array(
        'id' => $user_id,
        'avatar' => $refimgyol

    ));

    if ($update) {
        $resimunlink = $_POST['avatar_eskiyol'];
        unlink("../../$resimunlink");
        header("location: ../profile?update=ok ");
    } else {
        header("location: ../profile?update=no ");
    }
}
// User Ayarını Güncelleme
if (isset($_POST['user_update'])) {

    $pass = $_POST['user_pass'];
    if (strlen($pass) > 0) {
        $insert = $db->prepare("UPDATE user SET user_adsoyad=:adsoy WHERE user_id={$_POST['user_id']}");

        $update = $insert->execute(array(
            'adsoy' => $_POST['user_adsoyad']

        ));
    } else if (strlen($pass) > 0) {
        $insert = $db->prepare("UPDATE user SET 
    user_adsoyad=:adsoy,
    user_passl=:pass 
     
    WHERE user_id={$_POST['user_id']}");

        $update = $insert->execute(array(
            'adsoy' => $_POST['user_adsoyad'],
            'pass' => $pass
        ));
    }




    if ($update) {
        header("location: ../profile?update=ok ");
    } else {
        header("location: ../profile?update=no ");
    }
}
// Site Logo Güncelleme
if (isset($_POST['logo_update'])) {




    $uploads_dir = "../../images/logo";
    @$tmp_name = $_FILES['logo_resimyol']["tmp_name"];
    @$name = $_FILES['logo_resimyol']['name'];

    $random1 = date('Y-m-d');
    $random2 = "_";
    $random3 = date('H-i-s');
    $random = $random1 . $random2 . $random3;
    $r_name = $random . "_" . $name;
    $refimgyol = substr($uploads_dir, 6) . "/" . $r_name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$r_name");

    echo $refimgyol;

    $duzenle = $db->prepare("UPDATE ayar SET 
        ayar_logo=:logo 
        
        WHERE ayar_id=:id");

    $update = $duzenle->execute(array(
        'id' => 1,
        'logo' => $refimgyol

    ));

    if ($update) {
        $resimunlink = $_POST['logo_eskiyol'];
        unlink("../../$resimunlink");
        header("location: ../settings?update=ok ");
    } else {
        header("location: ../settings?update=no ");
    }
}
// Site Ayarını Güncelleme
if (isset($_POST['ayar_update'])) {
    $ayarkaydet = $db->prepare("UPDATE ayar SET 
    ayar_siteurl=:siteurl, 
    ayar_title=:title, 
    ayar_description=:adescription,
    ayar_keywords=:keywords,
    ayar_mail=:mail,
    ayar_author=:author 
    WHERE ayar_id=1");

    $ayarguncelle = $ayarkaydet->execute(array(
        'siteurl' => $_POST['ayar_siteurl'],
        'title' => $_POST['ayar_title'],
        'adescription' => $_POST['ayar_description'],
        'keywords' => $_POST['ayar_keywords'],
        'mail' => $_POST['ayar_mail'],
        'author' => $_POST['ayar_author']
    ));

    if ($ayarguncelle) {
        header("location: ../settings?update=ok ");
    } else {
        header("location: ../settings?update=no ");
    }
}
// İletişim Bilgileri Güncelleme
if (isset($_POST['iletisim_update'])) {
    $iletisimkaydet = $db->prepare("UPDATE ayar SET
    ayar_telefon=:tel,
    ayar_mail=:mail,
    ayar_bmail=:bmail,
    ayar_adres=:adres
    WHERE ayar_id=1");
    $iletisimguncelle = $iletisimkaydet->execute(array(
        'tel' => $_POST['ayar_telefon'],
        'mail' => $_POST['ayar_mail'],
        'bmail' => $_POST['ayar_bmail'],
        'adres' => $_POST['ayar_adres']
    ));
    if ($iletisimguncelle) {
        header('Location: ../contactus?update=ok');
    } else {
        header('Location: ../contactus?update=no');
    }
}
// Api Ayarlarını Güncelleme
if (isset($_POST['api_update'])) {
    $apikaydet = $db->prepare("UPDATE ayar SET
    ayar_recapctha=:recapctha,
    ayar_googlemap=:map,
    ayar_analytics=:analytics
    WHERE ayar_id=1");
    $apiguncelle = $apikaydet->execute(array(
        'recapctha' => $_POST['ayar_recapctha'],
        'map' => $_POST['ayar_googlemap'],
        'analytics' => $_POST['ayar_analytics']
    ));
    if ($apiguncelle) {
        header('Location: ../api?update=ok');
    } else {
        header('Location: ../api?update=no');
    }
}
// Sosyal Medya Ayaraları Güncelleme
if (isset($_POST['sosmed_update'])) {
    $sosmedkaydet = $db->prepare("UPDATE ayar SET
    ayar_instagram=:instagram,
    ayar_twitter=:twitter,
    ayar_facebook=:facebook
    WHERE ayar_id=1");
    $sosmedguncelle = $sosmedkaydet->execute(array(
        'instagram' => $_POST['ayar_instagram'],
        'twitter' => $_POST['ayar_twitter'],
        'facebook' => $_POST['ayar_facebook']
    ));
    if ($sosmedguncelle) {
        header('location: ../social?update=ok');
    } else {
        header('location: ../social?update=no');
    }
}
// Mail Ayarları Güncelleme
if (isset($_POST['mail_update'])) {
    $mailkaydet = $db->prepare("UPDATE ayar SET
    ayar_smtphost=:host,
    ayar_smtpuser=:user,
    ayar_smtppass=:pass,
    ayar_smtpport=:port
    WHERE ayar_id=1");
    $mailguncelle = $mailkaydet->execute(array(
        'host' => $_POST['ayar_smtphost'],
        'user' => $_POST['ayar_smtpuser'],
        'pass' => $_POST['ayar_smtppass'],
        'port' => $_POST['ayar_smtpport']
    ));
    if ($mailguncelle) {
        header('location: ../mail?update=ok');
    } else {
        header('location: ../mail?update=no');
    }
}
// Hakkımızda Ayarları Güncelleme
if (isset($_POST['hakkimizda_update'])) {
    $hakkimizdakaydet = $db->prepare("UPDATE hakkimizda SET
    hakkimizda_baslik=:baslik,
    hakkimizda_icerik=:icerik,
    hakkimizda_baslik2=:baslik2,
    hakkimizda_icerik2=:icerik2,
    hakkimizda_vizyon=:vizyon,
    hakkimizda_misyon=:misyon
    WHERE hakkimizda_id=1");
    $hakkimizdaguncelle = $hakkimizdakaydet->execute(array(
        'baslik' => $_POST['hakkimizda_baslik'],
        'icerik' => $_POST['hakkimizda_icerik'],
        'baslik2' => $_POST['hakkimizda_baslik2'],
        'icerik2' => $_POST['hakkimizda_icerik2'],
        'vizyon' => $_POST['hakkimizda_vizyon'],
        'misyon' => $_POST['hakkimizda_misyon']
    ));
    if ($hakkimizdaguncelle) {
        header('location: ../about?update=ok');
    } else {
        header('location: ../about?update=no');
    }
}
// Slider Ekleme
if (isset($_POST['slider_add'])) {


    $uploads_dir = "../../images/slides";
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']['name'];
    $random1 = rand(20000, 32000);
    $random2 = rand(20000, 32000);
    $random3 = rand(20000, 32000);
    $random4 = rand(20000, 32000);
    $random = $random1 . $random2 . $random3 . $random4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $random . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$random$name");





    $sliderkaydet = $db->prepare("INSERT INTO slider SET
        slider_ad=:ad,
        slider_link=:link,
        slider_sira=:sira,
        slider_durum=:durum,
        slider_resimyol=:yol
        ");
    $insert = $sliderkaydet->execute(array(
        'ad' => $_POST['slider_ad'],
        'link' => $_POST['slider_link'],
        'sira' => $_POST['slider_sira'],
        'durum' => $_POST['slider_durum'],
        'yol' => $refimgyol

    ));
    if ($insert) {
        header('location: ../slider?update=ok');
    } else {
        header('location: ../slider?update=no');
    }
}
// Slider Silme
if (isset($_GET['slider_del'])) {
    if ($_GET['slider_del'] == "ok") {
        $sil = $db->prepare("DELETE FROM slider Where slider_id=:sliderid");
        $kontrol = $sil->execute(array(
            'sliderid' => $_GET['slider_id']
        ));
        if ($kontrol) {
            header('location: ../slider?update=ok');
        } else {
            header('location: ../slider?update=no');
        }
    }
}
//Slider Düzenleme
if (isset($_POST['slider_edit'])) {


    if ($_FILES['slider_resimyol']['size'] > 0) {

        $uploads_dir = "../../images/slides";
        @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
        @$name = $_FILES['slider_resimyol']['name'];
        $random1 = rand(20000, 32000);
        $random2 = rand(20000, 32000);
        $random3 = rand(20000, 32000);
        $random4 = rand(20000, 32000);
        $random = $random1 . $random2 . $random3 . $random4;
        $refimgyol = substr($uploads_dir, 6) . "/" . $random . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$random$name");

        $duzenle = $db->prepare("UPDATE slider SET 
        slider_ad=:ad, 
        slider_link=:link, 
        slider_sira=:sira,
        slider_durum=:durum,
        slider_resimyol=:yol
        WHERE slider_id=:id");

        $update = $duzenle->execute(array(
            'ad' => $_POST['slider_ad'],
            'link' => $_POST['slider_link'],
            'sira' => $_POST['slider_sira'],
            'durum' => $_POST['slider_durum'],
            'id' => $_POST['slider_id'],
            'yol' => $refimgyol

        ));
        $slider_id = $_POST['slider_id'];
        if ($update) {
            $resimunlink = $_POST['slider_resimyol'];
            unlink("../../$resimunlink");
            header("location: ../slider-edit?slider_id=$slider_id&update=ok ");
        } else {
            header("location: ../slider-edit?update=no ");
        }
    } else {
        $duzenle = $db->prepare("UPDATE slider SET 
        slider_ad=:ad, 
        slider_link=:link, 
        slider_sira=:sira,
        slider_durum=:durum
        WHERE slider_id=:id");

        $update = $duzenle->execute(array(
            'ad' => $_POST['slider_ad'],
            'link' => $_POST['slider_link'],
            'sira' => $_POST['slider_sira'],
            'durum' => $_POST['slider_durum'],
            'id' => $_POST['slider_id']
        ));
        $slider_id = $_POST['slider_id'];
        if ($update) {
            header("location: ../slider-edit?slider_id=$slider_id&update=ok ");
        } else {
            header("location: ../slider-edit?update=no ");
        }
    }
}
// İçerik Ekleme
if (isset($_POST['icerik_add'])) {


    $uploads_dir = "../../images/content";
    @$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
    @$name = $_FILES['icerik_resimyol']['name'];
    $random1 = rand(20000, 32000);
    $random2 = rand(20000, 32000);
    $random3 = rand(20000, 32000);
    $random4 = rand(20000, 32000);
    $random = $random1 . $random2 . $random3 . $random4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $random . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$random$name");

    $tarih = $_POST['icerik_tarih'];
    $saat = $_POST['icerik_saat'];
    $zaman = $tarih . " " . $saat;

    $icerikkaydet = $db->prepare("INSERT INTO icerik SET
    icerik_ad=:ad,
    icerik_detay=:detay,
    icerik_keyword=:keywords,
    icerik_zaman=:zaman,
    icerik_durum=:durum,
    icerik_resimyol=:yol
    ");
    $insert = $icerikkaydet->execute(array(
        'ad' => $_POST['icerik_ad'],
        'detay' => $_POST['icerik_detay'],
        'keywords' => $_POST['icerik_keywords'],
        'durum' => $_POST['icerik_durum'],
        'yol' => $refimgyol,
        'zaman' => $zaman


    ));
    if ($insert) {
        header('location: ../content?update=ok');
    } else {
        header('location: ../content?update=no');
    }
}
// İçerik Düzenleme
if (isset($_POST['icerik_edit'])) {


    if ($_FILES['icerik_resimyol']['size'] > 0) {

        $uploads_dir = "../../images/content";
        @$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
        @$name = $_FILES['icerik_resimyol']['name'];
        $random1 = rand(20000, 32000);
        $random2 = rand(20000, 32000);
        $random3 = rand(20000, 32000);
        $random4 = rand(20000, 32000);
        $random = $random1 . $random2 . $random3 . $random4;
        $refimgyol = substr($uploads_dir, 6) . "/" . $random . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$random$name");


        $tarih = $_POST['icerik_tarih'];
        $saat = $_POST['icerik_saat'];
        $zaman = $tarih . " " . $saat;


        $duzenle = $db->prepare("UPDATE icerik SET 
        icerik_ad=:ad,
        icerik_detay=:detay,
        icerik_keyword=:keyword,
        icerik_zaman=:zaman,
        icerik_durum=:durum,
        icerik_resimyol=:yol
        WHERE icerik_id=:id");

        $update = $duzenle->execute(array(
            'ad' => $_POST['icerik_ad'],
            'detay' => $_POST['icerik_detay'],
            'keyword' => $_POST['icerik_keyword'],
            'durum' => $_POST['icerik_durum'],
            'id' => $_POST['icerik_id'],
            'yol' => $refimgyol,
            'zaman' => $zaman
        ));
        $icerik_id = $_POST['icerik_id'];
        if ($update) {
            $resimunlink = $_POST['icerik_resimyol'];
            unlink("../../$resimunlink");
            header("location: ../content-edit?icerik_id=$icerik_id&update=ok ");
        } else {
            header("location: ../content-edit?update=no ");
        }
    } else {

        $tarih = $_POST['icerik_tarih'];
        $saat = $_POST['icerik_saat'];
        $zaman = $tarih . " " . $saat;

        $duzenle = $db->prepare("UPDATE icerik SET 
        icerik_ad=:ad,
        icerik_detay=:detay,
        icerik_keyword=:keywords,
        icerik_zaman=:zaman,
        icerik_durum=:durum
        WHERE icerik_id=:id");

        $update = $duzenle->execute(array(
            'ad' => $_POST['icerik_ad'],
            'detay' => $_POST['icerik_detay'],
            'keywords' => $_POST['icerik_keyword'],
            'durum' => $_POST['icerik_durum'],
            'id' => $_POST['icerik_id'],
            'zaman' => $zaman
        ));
        $icerik_id = $_POST['icerik_id'];
        if ($update) {
            header("location: ../content-edit?icerik_id=$icerik_id&update=ok ");
        } else {
            header("location: ../content-edit?update=no ");
        }
    }
}
// İçerik Silme
if (isset($_GET['icerik_del'])) {
    if ($_GET['icerik_del'] == "ok") {
        $sil = $db->prepare("DELETE FROM icerik Where icerik_id=:icerikid");
        $kontrol = $sil->execute(array(
            'icerikid' => $_GET['icerik_id']
        ));
        if ($kontrol) {
            header('location: ../content?update=ok');
        } else {
            header('location: ../content?update=no');
        }
    }
}
// Menü Ekleme
if (isset($_POST['menu_add'])) {




    $menukaydet = $db->prepare("INSERT INTO menu SET
    menu_ad=:ad,
    menu_ust=:ust,
    menu_url=:link,
    menu_detay=:detay,
    menu_durum=:durum,
    menu_sira=:sira
    ");
    $insert = $menukaydet->execute(array(
        'ad' => $_POST['menu_ad'],
        'ust' => $_POST['menu_ust'],
        'link' => $_POST['menu_url'],
        'detay' => $_POST['menu_detay'],
        'durum' => $_POST['menu_durum'],
        'sira' => $_POST['menu_sira']


    ));
    if ($insert) {
        header('location: ../menu?update=ok');
    } else {
        header('location: ../menu?update=no');
    }
}
