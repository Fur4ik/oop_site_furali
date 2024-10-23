<?php
session_start();
$login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Мой аккаунт';
$count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '';
?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Автомобильный салон | Газета</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="imgProd/saturn.png">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="preloader-item"></div>
      </div>
    </div>
    <!-- Page-->
    <div class="page">
      <!-- Header-->
      <header class="section page-header rd-navbar-dark">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="166px" data-xl-stick-up-offset="166px" data-xxl-stick-up-offset="166px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
         

            <div class="rd-navbar-main-bottom rd-navbar-darker">
              <div class="rd-navbar-main-container container">
                <!-- Navbar -->
                                  <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Главная</a>
                                    </li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="carDealership.php">Автомобильный салон</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="phoneMarket.php">Рынок телефонов</a>
                                    </li>
                                    
                                  </ul>
                                  <div class="rd-navbar-panel-item rd-navbar-panel-item-right">
                                    <ul class="list-inline list-inline-bordered">
                                    <li>
                                        <div class="cart-inline-toggled-outer">
                                          <a href="cart.php"><button class="link link-cart toggle-original" data-rd-navbar-toggle="#cart-inline"><span class="link-cart-icon fl-bigmug-line-shopping202"></span><span class="link-cart-counter"><?php echo $count; ?></span></button></a>
                                        </div>
                                      </li>
                                        <a class="link link-icon link-icon-left link-classic"  href="#" id="loginLink" style="color:#35ad79"><span class="icon fl-bigmug-line-login12"></span><span class="link-icon-text"><?php echo $login; ?></span></a>
                                        <div id="logoutModal" class="modalAkk">
                                          <div class="modal-contentAkk">
                                            <span class="closeAkk">&times;</span>
                                            <p class="heading-component-title" style="color:#000000">Выйти?</p>
                                            <button class="button button-xs" id="confirmLogout">Да</button>
                                            <button class="button button-xs" id="cancelLogout">Нет</button>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
              </div>
            </div>
            <div class="rd-navbar-main">
              <div class="rd-navbar-main-top">
                  <h3 class="shop-do-glav">АВТОМОБИЛЬНЫЙ САЛОН</h3>
                  <h3 class="shop-glav">“ЭТО ЧТО ЗА АППАРАТ”</h3>
              </div>
              
            </div>
          </nav>
        </div>
      </header>
      <!-- News-->
      <section class="section section-md bg-gray-100">
        <div class="container">
          <div class="row row-50">


            <!-- левая колонна -->
            <div class="col-lg-8">
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Популярные предложения</h5>
                    <a><input class="button button-xs button-gray-outline" type="text" id="searchInput" placeholder="Поиск по названию" onkeyup="filterProducts()"></a>
                  </div>

                  <!-- <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Поиск по названию" onkeyup="filterProducts()">
                  </div> -->
                </article>
                <div class="row row-30"> <!-- тут наши товары --></div>
              </div>
            </div>


          </div>
        </div>
      </section>
      <!-- Footer-->
      <footer class="section footer-classic footer-classic-dark context-dark">
        <div class="footer-classic-aside footer-classic-darken">
          <div class="container">
            <div class="layout-justify">
              <!-- Rights-->
              <p class="rights">Не воспринимать этот сайт всерьез. Он создан в исключительно развлекательных целях.  Все герои вымышлены, совпадения случайны, отсылки специальны.  Авторы ничего не употребляли, у них просто больная фантазия.</p>
              <nav class="nav-minimal">
                <ul class="nav-minimal-list">
                  <li><img src="imgProd/saturn.png" height="16" width="16">FurAli</li>
                  <li>2024</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/loadData.js"></script>
    <script src="akk.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="js/toastr_settings.js"></script>
  </body>
</html>