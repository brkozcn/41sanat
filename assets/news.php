<section class="latest-news padding-top-100 padding-bottom-100">
  <div class="container">

    <!-- Tittle -->
    <div class="heading-block text-center margin-bottom-80">
      <h2> Our Latest News</h2>
      <span class="intro-style">Do you want to improve the online visibility of your brand and
        drive more relevant traffic to your website? </span>
    </div>

    <!-- News -->
    <div class="row">
      <!-- News 1 -->
      <?php

      $sayfada = 2;

      $sorgu = $db->prepare("SELECT * FROM icerik");
      $sorgu->execute();
      $toplam_icerik = $sorgu->rowCount();
      $toplam_sayfa = ceil($toplam_icerik / $sayfada);
      $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
      if ($sayfa < 1) $sayfa = 1;
      if ($sayfa > $toplam_icerik) $sayfa = $toplam_sayfa;
      $limit = ($sayfa - 1) * $sayfada;


      $iceriksor = $db->prepare("SELECT * FROM icerik ORDER BY icerik_zaman DESC limit $limit,$sayfada");
      $iceriksor->execute();
      while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)) {  ?>
        <div class="col-md-6"> <a href="<?= seo($icerikcek['icerik_ad']) . "-" . $icerikcek['icerik_id'] ?>"> <img class="img-responsive" src="<?php echo $icerikcek['icerik_resimyol'] ?>" alt=""> </a>
          <div class="news-detail">
            <div class="row">
              <div class="col-md-3 text-center">
                <div class="avatar"> <img class="img-circle" src="images/avatar-1.png" alt=""> </div>
                <p><?php echo substr($icerikcek['icerik_zaman'], 0, 9) ?></p>
                <p><i class="fa fa-comment"></i>03 </p>
              </div>
              <div class="col-md-9"> <a href="<?= seo($icerikcek['icerik_ad']) . "-" . $icerikcek['icerik_id'] ?>"> <b style="font-size: small;"><?php echo $icerikcek['icerik_ad'] ?></b></a>
                <p><?php echo substr($icerikcek['icerik_detay'], 0, 125) . "..." ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>