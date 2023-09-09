<?php include 'header.php' ?>

<?php 
 $slidersor = $db->prepare("SELECT * FROM slider where slider_durum='1' ORDER BY slider_id DESC limit 20  ");
 $slidersor->execute();
$slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);
$say = $slidersor->rowCount();
if($say>0){
  include 'slider.php';
}

 ?>

<!-- About-us -->
<?php include 'assets/about-us.php' ?>
<!-- About-us End -->

<!-- Case Studies -->
<section class="case-studies padding-top-100 padding-bottom-100">
  <div class="container">

    <!-- Tittle -->
    <div class="heading-block text-center margin-bottom-80">
      <h2>Case Studies </h2>
      <span class="intro-style">Do you want to improve the online visibility of your brand </span>
    </div>

    <!-- Cases -->

    <div class="case">
      <ul class="row">

        <?php include 'assets/case.php' ?>
    </div>

    </ul>
    <!-- Button -->
    <div class="text-center margin-top-50"> <a href="#." class="btn btn-orange">View More</a> </div>
  </div>
</section>

<!-- Case Studies -->
<?php include 'assets/news.php' ?>


<section class="testimonial padding-top-100">
  <div class="container">

    <!-- Tittle -->
    <div class="heading-block text-center margin-bottom-80">
      <h2>Why Customer <i class="fa fa-heart"></i> us! </h2>
      <span class="intro-style">Do you want to improve the online visibility of your brand and
        drive more relevant traffic to your website? </span>
    </div>

    <!-- TESTIMONIALS SLIDER -->
    <div id="slider" class="flexslider">
      <ul class="slides">

        <!-- Slide 1 -->
        <li>
          <div class="row">
            <div class="col-md-8">
              <h6>tim rijkes / <span>CEO - Founder </span></h6>
              <p>“Here's the story of a lovely lady who was bringing up three very lovely girls. The first mate and his Skipper too will do their very best to make the others comfortable in their tropic island nest. I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you.” </p>
            </div>
            <div class="col-md-4"> <img src="images/testi-img-1.png" alt=""> </div>
          </div>
        </li>

        <!-- Slide 2 -->
        <li>
          <div class="row">
            <div class="col-md-8">
              <h6>WPMINES / <span>CEO - Founder </span></h6>
              <p>“Here's the story of a lovely lady who was bringing up three very lovely girls. The first mate and his Skipper too will do their very best to make the others comfortable in their tropic island nest. I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you. The first mate and his Skipper too will do their very best to” </p>
            </div>
            <div class="col-md-4"> <img src="images/testi-img-1.png" alt=""> </div>
          </div>
        </li>

        <!-- Slide 3 -->
        <li>
          <div class="row">
            <div class="col-md-8">
              <h6>M_ADNAN / <span>Front End Developer </span></h6>
              <p>“Here's the story of a mate and his Skipper too will lovely lady who was bringing up three very lovely girls. The first do their very best to make the others comfortable in their tropic island nest. I have always wanted to have a neighbor just like you. I've always wanted to mate and his Skipper too will live in a neighborhood with you.” </p>
            </div>
            <div class="col-md-4"> <img src="images/testi-img-1.png" alt=""> </div>
          </div>
        </li>

        <!-- Slide 4 -->
        <li>
          <div class="row">
            <div class="col-md-8">
              <h6>FATON / <span>Designer </span></h6>
              <p>“Here's the story of a lovely lady who was bringing up three very lovely girls. The first mate and his Skipper too will do lady who was bringing up three very lovely girls. their very best to make the others comfortable in their tropic island nest. I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you.” </p>
            </div>
            <div class="col-md-4"> <img src="images/testi-img-1.png" alt=""> </div>
          </div>
        </li>
      </ul>
    </div>

    <!-- TESTIMONIALS THUMB -->
    <div id="carousel" class="flexslider">
      <ul class="slides">
        <li> <img src="images/testi-thumb-img-1.png" alt=""> <span>Jhonny Dep</span> </li>
        <li> <img src="images/testi-thumb-img-2.png" alt=""> <span>Luck Walker</span> </li>
        <li> <img src="images/testi-thumb-img-3.png" alt=""> <span>tim rijkes</span> </li>
        <li> <img src="images/testi-thumb-img-4.png" alt=""> <span>Irene warner</span> </li>
      </ul>
    </div>
  </div>
</section>
</div>


<?php include 'footer.php' ?>