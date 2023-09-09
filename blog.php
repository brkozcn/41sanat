<?php
include 'header.php';



?>


<!--======= SUB BANNER =========-->
<section class="sub-banner">
  <div class="container">
    <div class="position-center-center">
      <h2>Blog</h2>
      <ul class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li>Blog</li>
      </ul>
    </div>
  </div>
</section>

<!-- Content -->
<div id="content">

  <!-- Latest News -->
  <section class="latest-news blog padding-top-100 padding-bottom-100">
    <div class="container">

      <!-- Blog Side -->
      <div class="row">
        <div class="col-md-9">

          <?php

          $sayfada = 4;

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

            <!-- News 1 -->
            <article class="margin-bottom-50"> <a href="blog-<?= seo($icerikcek['icerik_ad']) . "-" . $icerikcek['icerik_id'] ?>"> <img width="830" height="426" class="img-responsive" src="<?php echo $icerikcek['icerik_resimyol'] ?>" alt=""> </a>
              <div class="news-detail">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <div class="avatar"> <img class="img-circle" src="images/avatar-1.png" alt=""> </div>
                    <p><?php echo $icerikcek['icerik_zaman'] ?> </p>
                    <p><i class="fa fa-comment"></i>03 </p>
                  </div>
                  <div class="col-md-9"> <a href="blog-<?= seo($icerikcek['icerik_ad']) . "-" . $icerikcek['icerik_id'] ?>">
                      <h5><?php echo $icerikcek['icerik_ad'] ?></h5>
                    </a>
                    <?php echo substr($icerikcek['icerik_detay'], 0, 250) . "..." ?>
                  </div>
                </div>
              </div>
            </article>
            <!-- News 1 End -->
          <?php } ?>
          <div class="text-center">
            <ul class="pagination">
              <?php $s = 0;
              while ($s < $toplam_sayfa) {
                $s++ ?>
                <?php if ($s == $sayfa) { ?>
                  <li class="active">
                    <a href="blog?sayfa=<?php echo $s ?>"><?php echo $s ?></a>
                  </li>
                <?php } else { ?>
                  <li>
                    <a href="blog?sayfa=<?php echo $s ?>"><?php echo $s ?></a>
                  </li>
              <?php }
              } ?>
            </ul>
          </div>
        </div>

        <!-- Side Bar -->
        <div class="col-md-3">
          <div class="side-bar">

            <!-- Categories -->
            <h5 class="font-alegreya ">Categories</h5>
            <ul class="cate bg-defult">
              <li><a href="#.">SEO Services <span>(10)</span></a></li>
              <li><a href="#.">PayPerClick<span>(20)</span></a></li>
              <li><a href="#.">Social Media<span>(28)</span></a></li>
              <li><a href="#.">KeyWord Analytic<span>(18)</span></a></li>
              <li><a href="#.">Webdesigning<span>(09)</span></a></li>
              <li><a href="#.">Developing<span>(32)</span></a></li>
              <li><a href="#."><span>View All <i class="fa fa-long-arrow-right"></i></span></a></li>
            </ul>

            <!-- Categories -->
            <h5 class="font-alegreya">Latest Tweets</h5>
            <ul class="tweets bg-defult">
              <li>@Murphy zim To a deluxe apartment
                in the sky <a href="#.">http://Comr.designer.com </a><span>1 hours ago</span></li>
              <li>@Murphy zim To a deluxe apartment
                in the sky <a href="#.">http://Comr.designer.com </a><span>1 hours ago</span></li>
            </ul>

            <!-- Popular Post -->
            <h5 class="font-alegreya">Popular Post</h5>
            <div class="papu-post margin-t-40">
              <ul class="bg-defult">
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images/case-img-1.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">Were gonna pay a call a boldly go where no </a> <span>Sep 21, 2017</span> </div>
                </li>
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images/case-img-2.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">So lets make the most is beautiful day </a> <span>Sep 21, 2017</span> </div>
                </li>
                <li class="media">
                  <div class="media-left"> <a href="#"> <img class="media-object" src="images/case-img-3.jpg" alt=""></a> </div>
                  <div class="media-body"> <a class="media-heading" href="#.">We're gona make dreams comes true </a> <span>Sep 21, 2017</span> </div>
                </li>
              </ul>
            </div>

            <!-- Categories -->
            <h5 class="font-alegreya ">Archives</h5>
            <ul class="cate bg-defult">
              <li><a href="#.">May 2017 <span>(10)</span></a></li>
              <li><a href="#.">June 2017<span>(20)</span></a></li>
              <li><a href="#.">July 2017<span>(28)</span></a></li>
              <li><a href="#.">Augest 2017<span>(18)</span></a></li>
              <li><a href="#."><span>View All <i class="fa fa-long-arrow-right"></i></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Content -->

<?php include 'footer.php' ?>