<section class="light-gray-bg solution padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- Tittle -->
        <div class="heading-block text-center margin-bottom-40">
        <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; display:inline-flex;">41 </h2> <h2 style="display:inline"> Sanat Hakkında  </h2>
          <!-- <span>Do you want to improve the online visibility of your brand and traffic to your website?</span>  -->
        </div>
        <ul class="row text-center">
          
          <!-- Web Analytics -->
          <li class="col-md-3"> <img src="images/icon-1.png" alt="">
            <h6><?php echo $hakkimizdacek['hakkimizda_baslik'] ?></h6>
            <p><?php if ($_SERVER['REQUEST_URI'] == '/hakkimizda') {
              echo $hakkimizdacek['hakkimizda_icerik']
            ?>

          <?php } else {
              echo substr($hakkimizdacek['hakkimizda_icerik'], 0, 125);

          ?>
            <a href="http://www.41sanat.com/hakkimizda">...</a>

          <?php } ?></p>
          </li>
          
          <!-- Keyword Targeting -->
          <li class="col-md-3"> <img src="images/icon-2.png" alt="">
            <h6><?php echo $hakkimizdacek['hakkimizda_baslik2'] ?></h6>
            <p><?php if ($_SERVER['REQUEST_URI'] == '/hakkimizda') {
              echo $hakkimizdacek['hakkimizda_icerik2']
            ?>

          <?php } else {
              echo substr($hakkimizdacek['hakkimizda_icerik2'], 0, 125);

          ?>
            <a href="http://www.41sanat.com/hakkimizda">...</a>

          <?php } ?></p>
          </li>
          
          <!-- Technical Service -->
          <li class="col-md-3"> <img src="images/icon-3.png" alt="">
            <h6>Vizyonumuz</h6>
            <p> <?php if ($_SERVER['REQUEST_URI'] == '/hakkimizda') {
              echo $hakkimizdacek['hakkimizda_vizyon']
            ?>

          <?php } else {
              echo substr($hakkimizdacek['hakkimizda_vizyon'], 0, 125);

          ?>
            <a href="http://www.41sanat.com/hakkimizda">...</a>

          <?php } ?></p>
          </li>
          
          <!-- Support Center -->
          <li class="col-md-3"> <img src="images/icon-4.png" alt="">
            <h6>Misyonumuz</h6>
            <p><?php if ($_SERVER['REQUEST_URI'] == '/hakkimizda') {
              echo $hakkimizdacek['hakkimizda_misyon']
            ?>

          <?php } else {
              echo substr($hakkimizdacek['hakkimizda_misyon'], 0, 125);

          ?>
            <a href="http://www.41sanat.com/hakkimizda">...</a>

          <?php } ?></p>
          </li>
        </ul>
      </div>
    </section>