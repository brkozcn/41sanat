<section class="home-slider">
    <div class="tp-banner-container">
      <div class="tp-banner-fix">
        <ul>
          
        <?php

                                $slidersor = $db->prepare("SELECT * FROM slider where slider_durum='1' ORDER BY slider_id DESC limit 20  ");
                                $slidersor->execute();
                                while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
          <!-- Slider 1 -->
          <li data-transition="fade" data-slotamount="7"> <img src="<?php echo $slidercek['slider_resimyol'] ?>"  data-bgposition="center top" alt="" /> 
            
            
          </li>
          <?php } ?>
          <!-- Slider-1 End -->
        </ul>
      </div>
    </div>
  </section>

<?php 
'<!-- Layer -->
            <div class="tp-caption sft tp-resizeme font-extra-bold" 
                  data-x="right" data-hoffset="0"
                  data-y="center" data-voffset="0" 
                  data-speed="700" 
                  data-start="700" 
                  data-easing="easeOutBack"
                  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-elementdelay="0.1" 
                  data-endelementdelay="0.1" 
                  data-endspeed="300" 
                  data-captionhidden="on"> <img src="images/slides/img--1-1.png" alt="" > </div>
            
            <!-- Layer -->
            <div class="tp-caption sfb tp-resizeme font-bold" 
                  data-x="left" data-hoffset="40"
                  data-y="center" data-voffset="-100"
                  data-speed="500" 
                  data-start="700" 
                  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                  data-easing="Back.easeOut" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-elementdelay="0.1" 
                  data-endelementdelay="0.1"
                  data-endspeed="300" 
                  data-captionhidden="on"
                  style="color: #fff; font-size: 48px; font-weight: normal; letter-spacing:0px; line-height:55px;"> Internet Marketing Solutions <br>
              Fast and Affortable </div>
            
            <!-- Layer -->
            <div class="tp-caption sfb tp-resizeme" 
                  data-x="left" data-hoffset="40"
                  data-y="center" data-voffset="30"
                  data-speed="500" 
                  data-start="1000" 
                  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                  data-easing="Back.easeOut" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-elementdelay="0.1" 
                  data-endelementdelay="0.1" 
                  data-endspeed="300" 
                  data-captionhidden="on"
                  style="color: #fff; font-size: 30px; font-weight: normal; line-height:36px;"> Do you want to improve the online visibility of <br> your brand  and drive more relevant traffic <br> to your website.</div>
            
            <!-- Layer -->
            <div class="tp-caption sfb tp-resizeme font-crimson" 
                  data-x="left" data-hoffset="40"
                  data-y="center" data-voffset="150"
                  data-speed="500" 
                  data-start="1300" 
                  data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                  data-easing="Back.easeOut" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-elementdelay="0.1" 
                  data-endelementdelay="0.1" 
                  data-endspeed="300" 
                  data-captionhidden="on"
                  > <a href="#." class="btn">Learn More</a> <a href="#." class="btn btn-white margin-left-20">Get a quote</a> </div>'
?> 