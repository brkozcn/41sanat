<?php
include 'nedmin/netting/baglan.php';
include 'nedmin/func.php';
$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=?");
$ayarsor->execute(array(1));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda");
$hakkimizdasor->execute();
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);




?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>" />
  <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; //YAPILACAK DÜZGÜN ÇALIŞMAZ 
                                  ?>">
  <!-- Document Title -->
  <title><?php echo $ayarcek['ayar_title']; ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo $ayarcek['ayar_logo']?>" type="image">
  <link rel="icon" href="<?php echo $ayarcek['ayar_logo']?>" type="image">

  <!-- FontsOnline -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,500,700,800,900,300,100' rel='stylesheet' type='text/css'>

  <!-- StyleSheets -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
  <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />

  <!-- JavaScripts -->
  <script src="js/vendors/modernizr.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- LOADER ===========================================-->
  <!-- <div id="loader">
    <div class="loader">
      <div class="position-center-center">
        <div id="preloader6"> <span></span> <span></span> <span></span> <span></span> </div>
      </div>
    </div>
  </div> -->

  <!-- Page Wrapper -->
  <div id="wrap">

    <!-- Top bar -->
    <!-- <div class="container">
    <div class="row">
      <div class="col-md-2 noo-res"></div>
      <div class="col-md-10">
        <div class="top-bar">
          <div class="col-md-3">
            <ul class="social_icons">
              <li><a href="#."><i class="fa fa-facebook"></i></a></li>
              <li><a href="#."><i class="fa fa-twitter"></i></a></li>
              <li><a href="#."><i class="fa fa-google"></i></a></li>
            </ul>
          </div> -->

    <!-- Social Icon -->
    <!-- <div class="col-md-9">
            <ul class="some-info font-montserrat">
              <li><i class="fa fa-phone"></i> +1 548-554-451</li>
              <li><i class="fa fa-envelope"></i> Example@domain.com</li>
              <li><i class="fa fa-weixin"></i> LiveChat</li>
              <li><i class="fa fa-question-circle"></i> Support</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> -->

    <!-- Header -->
    <header class="header coporate-header">
      <div class="sticky">
        <div class="container">
          <div class="logo col-md-4">
            <a class="justify-content-start left" href="./"><img style="max-width 191px; max-height: 51px ;" src="<?php echo $ayarcek['ayar_logo'] ?>" alt=""></a>

            <div class="col-md-3 right justify-content-end">
              <ul class="social_icons ">
                <!-- <div class="col-md-4 "></div> -->
                <li><a href="<?php echo $ayarcek['ayar_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $ayarcek['ayar_twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo $ayarcek['ayar_instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
            </div>
            </ul>

          </div>


          <!-- Nav -->
          <nav>
            <?php
            // $url=$_SERVER['REQUEST_URI'];                       Domain Alınca Etkinleştirilecek
            $url = explode("/", $_SERVER['REQUEST_URI'])[2];
            // echo "<script>console.log('Debug Objects: " . $url . "');</script>"
            ?>
            <ul id="ownmenu" class="ownmenu">
              <?php
              $menusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_id ORDER BY menu_sira ASC limit 25");
              $menusor->execute(array(
                ':menu_id'=>0
            ));
              while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) {
              $menu_id=$menucek['menu_id'];

              $altmenusor = $db->prepare("SELECT * FROM menu WHERE menu_ust=:menu_id ORDER BY menu_sira");
                $altmenusor->execute(array(
                    ':menu_id'=>$menu_id
                ));
                $say=$altmenusor->rowCount();
       

              ?>
                <li class="dropdown">
                  <a href="<?php if (strlen($menucek['menu_url'] !== 0)) {
                              echo $menucek['menu_url'];
                            } else { ?>
                          menu-<?= seo($menucek['menu_ad']) . "-" . $menucek['menu_id'] ?>
                          <?php  } ?>
                          "><?php echo $menucek['menu_ad'] ?></a>
                
                <ul class="<?php if($say>0){
                 echo 'dropdown';
                } ?> ">
                <?php 
                
                while ($altmenucek = $altmenusor->fetch(PDO::FETCH_ASSOC)) { ?>
                <li>
                  <a href="<?php if (strlen($altmenucek['menu_url'] !== 0)) {
                              echo $altmenucek['menu_url'];
                            } else { ?>
                          menu-<?= seo($altmenucek['menu_ad']) . "-" . $altmenucek['menu_id'] ?>
                          <?php  } ?>
                          "><?php echo $altmenucek['menu_ad'] ?></a>
                </li>
                <?php } ?>
                </ul></li>
              <?php } ?>




              <!-- <li class="<?php if (stristr($url, "about.php")) {
                                echo "active";
                              } ?>"><a href="about.php"> Hakımızda </a></li> -->
              <!-- <li><a href="services.php"> SERVICES </a></li>
              <!-- <li class="<?php if (stristr($url, "case-studies.php")) {
                                echo "active";
                              } ?>"><a href="case-studies.php"> Çalışmalarımız</a></li> -->
              <!-- <li><a href="index.php">Sayfalar</a>
                <ul class="dropdown">
                  <li><a href="index.php">Anasayfa</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="case-studies.php">Case Studies</a></li>
                  <li><a href="blog.php">Blog</a></li>
                  <li><a href="blog-single.php">Blog Single</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="404-page.php">404 Ppage</a></li>
                  <!-- <li><a href="index-1.php">Index 2</a></li> 
                  <!-- <li><a href="services.php">Services</a></li> 
                  <!-- <li><a href="case-studies-single.php">Case Studies Single</a></li> 
                </ul>
              </li> -->
              <!-- <li class="<?php if (stristr($url, "blog.php") || stristr($url, "blog-single.php")) {
                                echo "active";
                              } ?>"><a href="blog.php"> BLOG </a></li>
              <li class="<?php if (stristr($url, "contact.php")) {
                            echo "active";
                          } ?>"><a href="contact.php"> İletişim</a></li> -->

              <!--======= SEARCH ICON =========-->
              <li class="search-nav right"><a href="#."><i class="fa fa-search"></i></a>
                <ul class="dropdown">
                  <li>
                    <form>
                      <!-- <input type="search" class="form-control" placeholder="Enter Your Keywords..." required> -->
                      <input type="search" class="form-control" placeholder="Bakımda!!" required>
                      <button type="submit"> SEARCH </button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>