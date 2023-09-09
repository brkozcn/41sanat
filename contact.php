<?php include'header.php' ?>
  
  <!--======= SUB BANNER =========-->
  <section class="sub-banner" style="background:url(images/bg/sub-banner.jpg) no-repeat;">
    <div class="container">
      <div class="position-center-center">
        <h2>CONTACT</h2>
        <ul class="breadcrumb">
          <li><a href="./">Home</a></li>
          <li>Contact</li>
        </ul>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Contact  -->
    <section class="contact-us light-gray-bg">
      <div class="container-fluid">
        <div class="row">
        
         <!-- MAP -->
          <div class="col-md-4">
            <div id="map"></div>
          </div>
          
           <!-- Contact From -->
          <div class="col-md-8">
            <h3 class="font-alegreya margin-top-50">Bizimle İletişime Geçin</h3>
            <div class="contact-form"> 
            
              <!-- FORM -->
              <form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
                <ul class="row">
                  <li class="col-sm-6">
                    <label>İSİM*
                      <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>MAİL ADRESİ*
                      <input type="text" class="form-control" name="email" id="email" placeholder="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>TELEFON NUMARASI*
                      <input type="text" class="form-control" name="company" id="company" placeholder="">
                    </label>
                  </li>
                  <li class="col-sm-6">
                    <label>KONU*
                      <input type="text" class="form-control" name="website" id="website" placeholder="">
                    </label>
                  </li>
                  <li class="col-sm-12">
                    <label>MESAJ*
                      <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                    </label>
                  </li>
                  <li class="col-sm-12 no-margin">
                    <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">SEND NOW</button>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Contact Info -->
    <section class="contact-info padding-top-80 padding-bottom-80">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="font-alegreya margin-top-30">İletişim Bilgileri</h3>
          </div>
          <div class="col-md-8">
            <ul class="row">
              <li class="col-sm-4"> <i class="fa fa-map-marker"></i>
                <h4 class="font-alegreya">Adres</h4>
                <p><?php echo $ayarcek['ayar_adres'] ?></p>
              </li>
              <li class="col-sm-4"> <i class="fa fa-clock-o"></i>
                <h4 class="font-alegreya">Mesai Saatleri</h4>
                <p>Hafta İçi : 10:00 AM - 17:00 PM</p>
                <p>Hafta Sonu : 12:00 AM - 17:00 PM </p>
                
              </li>
              <li class="col-sm-4"> <i class="fa fa-phone"></i>
                <h4 class="font-alegreya">GSM Numaramız</h4>
                <p><?php echo $ayarcek['ayar_telefon'] ?></p>
                <!-- <p> +91 123 456 89</p> -->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- End Content --> 

    <!-- begin map script--> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7z3qSfW7_1ArWHGs69jHLbLw-jOOGwuk"></script>
<script type="text/javascript">
/*==========  Map  ==========*/
var map;
function initialize_map() {
if ($('#map').length) {
  var myLatLng = new google.maps.LatLng(-37.814199, 144.961560);
  var mapOptions = {
    zoom: 17,
    center: myLatLng,
    scrollwheel: false,
    panControl: false,
    zoomControl: true,
    scaleControl: false,
    mapTypeControl: false,
    streetViewControl: false
  };
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    tittle: 'Envato',
    icon: 'images/map-locator.png'

  });
} else {
  return false;
}
}
google.maps.event.addDomListener(window, 'load', initialize_map);
</script>
<?php include 'footer.php' ?>