<?php

try {
    $db = new PDO("mysql:host=sql210.infinityfree.com;dbname=if0_34848306_41sanat;charset=utf8", 'if0_34848306','fSW1KcEVYwv8G');

    echo "<p>Veritabanı Bağlantısı Başarılı<p>";
} catch (PDOException $e) {

    echo $e->getMessage();
};



if (isset($_POST['ekle'])) {

    // $kaydet = $db->prepare("INSERT INTO destek  SET destek_konu=:destek_konu,destek_mesaj=:destek_mesaj)");

    // $kaydet->bindParam(':destek_konu', $_POST['destek_mesaj'], PDO::PARAM_STR);
    // $kaydet->bindParam(':destek_mesaj', $_POST['destek_konu'], PDO::PARAM_STR);

    $rkaydet=$db->prepare("INSERT INTO destek SET
    destek_mesaj=:mesaj,
    destek_konu=:konu
    ");
    $kaydet=$rkaydet->execute(array(
        'mesaj'=>$_POST['destek_mesaj'],
        'konu'=>$_POST['destek_konu']
        
    ));
    
    // $id = $db->lastinsertid();

    if ($kaydet) {
        echo "<p>Eklenen kayıt sayısı: " . $rkaydet->rowCount() . "</p>";
        echo "<p>Eklenen kayıt numarası: " . $id . "</p>";
        header('Location: ./destek.php');
    } else {
        echo "$kaydet kayıt eklenemedi SIKINTI VAR !!!";
    }
}
if (isset($_POST['guncelle'])) {

    $guncelle = $db->prepare("UPDATE destek SET destek_konu=? ,destek_mesaj=? WHERE destek_id=?");
    $guncelle->bindParam(1, $_POST['destek_konu'], PDO::PARAM_STR);
    $guncelle->bindParam(2, $_POST['destek_mesaj'], PDO::PARAM_STR);
    $guncelle->bindParam(3, $_POST['destek_id'], PDO::PARAM_STR);
    $guncelle->execute();

    if ($guncelle) {
        header('Location: ./destek.php');
        echo "<p>Eklenen kayıt sayısı: " . $guncelle->rowCount() . "</p>";
        echo "<p>Eklenen kayıt numarası: " . $id . "</p>";
    } else {
        echo "$guncelle kayıt eklenemedi SIKINTI VAR !!!";
    }
}
if (isset($_POST['sil'])) {
    $sil = $db->prepare("DELETE FROM destek WHERE destek_id=?");
    $sil->bindParam(1, $_POST['destek_id'], PDO::PARAM_STR);
    $sil->execute();
    if ($sil) {
        header('Location: ./destek.php');
        echo "<p>" . $sil->rowCount() . "Kayıt Başarıyla Silindi </p>";
    } else echo "<p> Kayıt Silme işlemi Başarısız </p>";
}
if (isset($_POST['listele'])) {
    $liste = $db->prepare("SELECT * FROM destek");
    $liste->execute();
    foreach ($liste as $cikti) {
        echo "Destek Konu: " . $cikti['destek_konu'] . " Destek Mesaj: " . $cikti['destek_mesaj'] . " Destek ID: " . $cikti['destek_id'] . "<br>";
    }
}
if (isset($_POST['getir'])) {
    if (!$_POST['destek_konu'] == null) {
        $getir = $db->query("SELECT * FROM destek",PDO::FETCH_ASSOC);
        // $getir->bindParam(":dk", $_POST['destek_konu'], PDO::PARAM_STR);
        $getir->execute();
        $cikti = $getir->fetch(PDO::FETCH_ASSOC);
        echo $_POST['destek_konu'] . " Destek Konulu <br> Destek Mesajı: " . $cikti['destek_mesaj'] . "<br> Destek ID: " . $cikti['destek_id'];
    } 
    else if (!$_POST['destek_mesaj'] == null) {
        $getir = $db->query("SELECT * FROM destek",PDO::FETCH_ASSOC);
        // $getir->bindParam(1,$_POST['destek_mesaj'], PDO::PARAM_STR);
        $getir->execute();
        $cikti = $getir->fetch(PDO::FETCH_ASSOC);
        echo $_POST['destek_mesaj'] . " Destek Mesajı: <br> Destek Konu: " . $cikti['destek_konu'] . "<br> Destek ID: " . $cikti['destek_id'];
    } 
    else if (!$_POST['destek_id'] == null) {
        $getir = $db->prepare("SELECT * FROM destek WHERE destek_id=? ");
        $getir->bindParam(1, $_POST['destek_id'], PDO::PARAM_INT);
        $getir->execute();
        $cikti = $getir->fetch(PDO::FETCH_ASSOC);
        echo $cikti['destek_id'], " Destek ID'li <br> Destek Konulu: ".$cikti["destek_konu"]. "<br> Destek Mesajı: ",$cikti["destek_mesaj"];
    } else {
        echo "Boş bırakmayınız!";
        header('loaction: ./destek');
    }
}






$db = null;
