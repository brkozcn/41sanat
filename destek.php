<?php include 'baglan.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="baglan.php" method="post">
        <input type="text" name="destek_konu" placeholder="Destek Konusu Başlığını Giriniz.">
        <input type="text" name="destek_mesaj" placeholder="Destek Mesajını Giriniz.">
        <input type="submit" name="ekle" value="Ekle">
        <h1>
            <hr>
        </h1>
    </form>

    <?php /* 
    $destekcek=$db->query('SELECT * FROM destek',PDO::FETCH_ASSOC); 
    foreach ($destekcek as $destekyaz) {
        echo $destekyaz['destek_konu']; echo "<br>";
    }
    */
    ?>
    <form action="baglan.php" method="post">
        <input type="text" name="destek_konu" placeholder="Destek Konusu Başlığını Giriniz.">
        <input type="text" name="destek_mesaj" placeholder="Destek Mesajını Giriniz.">
        <input type="text" name="destek_id" placeholder="Destek ID Giriniz.">
        <input type="submit" name="guncelle" value="Güncelle">
    </form>
    <h1>
        <hr>
    </h1>
    <form action="baglan.php" method="post">
        <input type="number" name="destek_id" placeholder="Destek ID Giriniz.">
        <input type="submit" name="sil" value="Delete">
    </form>
    <h1>
        <hr>
    </h1>
    <form action="baglan.php" method="post">
        <!-- <input type="text" name="destek_konu" placeholder="Destek Konusu Başlığını Giriniz.">
        <input type="text" name="destek_mesaj" placeholder="Destek Mesajını Giriniz.">
        <input type="text" name="destek_id" placeholder="Destek ID Giriniz."> -->
        <input type="submit" value="Listele" name="listele">
        <h1>
            <hr>
        </h1>
    </form>
    <form action="baglan.php" method="post">
        <input type="text" name="destek_konu" placeholder="Destek Konusu Başlığını Giriniz.">
        <input type="text" name="destek_mesaj" placeholder="Destek Mesajını Giriniz.">
        <input type="text" name="destek_id" placeholder="Destek ID Giriniz.">
        <input type="submit" value="Getir" name="getir">
    </form>

    <!-- <input type="number" name="destek_id" placeholder="Destek ID Giriniz." > -->
</body>

</html>