<?php
ob_start();
session_start();
include './netting/baglan.php';
if (isset($_POST['ticket'])) {

    $ticketkaydet = $db->prepare("INSERT INTO ticket SET
                    ticket_baslik=:baslik,
                    ticket_detay=:detay,
                    ticket_url=:link,
                    ticket_sid=:id
                    ");
    $insert = $ticketkaydet->execute(array(
        'detay' => $_POST['ticket_detay'],
        'baslik' => $_POST['ticket_baslik'],
        'id' => $_POST['ticket_sid'],
        'link' => $_POST['ticket_url']
    ));
    $sonid = $db->lastInsertId();



    for ($i = 0; $i < count($_FILES['galeri_resimyol']); $i++) {
        // burada gelen dosyalarımızı döngüye soktuk , i değişkeni her dosyamıza bir numara vermek için lazım olacak
        if ($_FILES['galeri_resimyol']['size'][$i] > 0) {
            //ne olur ne olmaz dosya boyutu kontrolü de yapalım boş dosyalarla uğraşmayalım
            if ($_FILES['galeri_resimyol']['size'][$i] > 9948576) {
                echo "";
                exit();
                // yaklaşık 80 mb dan büyük dosyaları reddedelim 
            } else {
                // isterseniz başka kontrollerde yapın ben diğer işlere başlıyorum
                $uploads_dir = 'uploads/ticket'; // malum kaydedilecek dosya yolu

                @$tmp_name = $_FILES['galeri_resimyol']["tmp_name"][$i];

                @$name = $_FILES['galeri_resimyol']["name"][$i];

                $yol = $uploads_dir . "/" . $name;

                @move_uploaded_file($tmp_name, "$yol");

                //ben db’ye dosyayı yoluyla beraber kaydettim ama siz isterseniz sadece adını da kaydedebilirsiniz size kalmış

                $belge_kayit = $db->prepare("INSERT INTO ticket_galeri SET 
                galeri_resimyol=:yol,
                ticket_id=:id

                ");
                $belge_kayit->bindValue(':yol', $yol, PDO::PARAM_STR);
                $belge_kayit->bindValue(':id', $sonid, PDO::PARAM_INT);
                $success = $belge_kayit->execute();
            }
        }
    }
    if ($insert && $success) {
        header('location: ./?update=ok');
    } else {
        header('location: ./?update=no');
    }
}

if (isset($_GET['ticket_id'])) {

    // $ticketsor = $db->prepare("SELECT * FROM ticket where ticket_id=:id ");
    // $ticketsor->bindValue(':id', $_GET['ticket_id']);
    // $ticketsor->execute();

    $ticketsor = $db->prepare("SELECT * FROM ticket WHERE ticket_id=:id");
    $ticketsor->bindValue(':id', $_GET['ticket_id']);
    $ticketsor->execute();
    $ticketsor = $ticketsor->fetch(PDO::FETCH_ASSOC);

    if ($ticketsor['ticket_durum'] == 0) {
        $durum = 1;
        echo 'İf';
    } else {
        $durum = 0;
        echo 'Echo';
    }


    $ticketkaydet = $db->prepare("UPDATE ticket SET
    ticket_durum=:durum
    WHERE ticket_id=:id");
    $ticketguncelle = $ticketkaydet->execute(array(

        'durum' => $durum,
        'id' => $_GET['ticket_id']
    ));
    if ($ticketguncelle) {
        header('Location: ./?update=ok');
    } else {
        header('Location: ./?update=no');
    }
}
if (isset($_GET['ticket_del'])) {
    if ($_GET['ticket_del'] == "ok") {
        $sil1 = $db->prepare("DELETE FROM ticket Where ticket_id=:ticketid");
        $sil2 = $db->prepare("DELETE FROM ticket_galeri Where ticket_id=:ticketid");
        $kontrol1 = $sil1->execute(array(
            'ticketid' => $_GET['ticket_id']
        ));
        $kontrol2 = $sil2->execute(array(
            'ticketid' => $_GET['ticket_id']
        ));
        if ($kontrol1 && $kontrol2) {
            header('location: ./?update=ok');
        } else {
            header('location: ./?update=no');
        }
    }
}


if (isset($_POST['ticket_update'])) {

    $ticketkaydet = $db->prepare("UPDATE ticket SET
                    ticket_baslik=:baslik,
                    ticket_detay=:detay,
                    ticket_url=:link,
                    ticket_durum=:durum
                    where ticket_id=:id
                    ");
    $insert = $ticketkaydet->execute(array(
        'id' => $_POST['ticket_id'],
        'detay' => $_POST['ticket_detay'],
        'baslik' => $_POST['ticket_baslik'],
        'durum' => $_POST['ticket_durum'],
        'link' => $_POST['ticket_url']
    ));

    if ($insert) {
        header('location: ./?update=ok');
    } else {
        header('location: ./?update=no');
    }
}
