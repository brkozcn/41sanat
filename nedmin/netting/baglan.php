<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=41sanat;charset=utf8", 'root','');

    // echo "Veritabanı Bağlantısı Başarılı";

} catch (PDOException $e) {


    echo $e->getMessage();
}

$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
$ayarsor->execute(array(1));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);
define("SITE", $ayarcek['ayar_siteurl']);
