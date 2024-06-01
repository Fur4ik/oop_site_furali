<?php
session_start();
$login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Мой аккаунт';
$count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '';
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Главная | Газета</title>
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
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
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
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">Главная</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="carDealership.php">Автомобильный салон</a>
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

                                      <li>
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
                  <h3 class="do-glav">ЕЖЕНЕДЕЛЬНИК ЗАВОДЧАНИНА</h3>
                  <h3 class="glav">ГАЗЕТА</h3>
                  <h3 class="under-glav">*БЕСПЛАТНЫЕ ЧАСТНЫЕ ОБЪЯВЛЕНИЯ</h3>
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
            <div class="col-lg-8 col-lg-8-index">
              <div class="main-component">
                <!-- Heading Component-->
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Популярные объявления
                    </h5><a class="button button-xs button-gray-outline" href="#">Все объявления</a>
                  </div>
                </article>
                <div class="row row-30"> <!-- все наши категории -->
                  <div class="col-md-12">
                    <article class="post-gloria"><img src="imgProd/A.png" alt="" width="769" height="429"/>
                      <div class="post-gloria-main">
                        <h3 class="post-gloria-title"><a href="#">Как-то случился забив кафедры физики и прикладной  математики...</a></h3>
                        <div class="post-gloria-meta">
                          <!-- Badge-->
                          <div class="badge badge-primary">Анекдоты
                          </div>
                          <div class="post-gloria-time"><span class="icon mdi mdi-clock"></span>
                            <time datetime="2020">Июнь 30, 2024</time>
                          </div>
                        </div>
                        <div class="post-gloria-text">
                          <svg version="1.1" x="0px" y="0px" width="6.888px" height="4.68px" viewbox="0 0 6.888 4.68" enable-background="new 0 0 6.888 4.68" xml:space="preserve">
                            <path d="M1.584,0h1.8L2.112,4.68H0L1.584,0z M5.112,0h1.776L5.64,4.68H3.528L5.112,0z"></path>
                          </svg>
                          <p>Каждую неделю шутим на насущные темы</p>
                        </div><a class="button" href="#">Подробнее</a>
                      </div>
                    </article>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- правая колонна -->
            <!-- Aside Block-->
            <div class="col-lg-4">
              <aside class="aside-components">
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">События
                      </h5><a class="button button-xs button-gray-outline" href="#">Все новости</a>
                    </div>
                  </article>
                  <!-- List Post Classic-->
                  <div class="list-post-classic">
                    <!-- событие 1-->
                    <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="#"></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="#">Погода: 30 июня будет самый жаркий день за всю историю</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2020">Июнь 30, 2024</time>
                                          </div>
                                        </div>
                    </article>
                    <!-- событие 2-->
                    <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="#"></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="#">Лайт вэйт: мезоморф накачался, лишь посмотрев на штангу</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2020">Июнь 30, 2024</time>
                                          </div>
                                        </div>
                    </article>
                    <!-- событие 3-->
                    <article class="post-classic">
                                        <div class="post-classic-aside"><a class="post-classic-figure" href="#"></a></div>
                                        <div class="post-classic-main">
                                          <p class="post-classic-title"><a href="#">Тв-Программа: Благодаря двум этим эфирам вы 
                                            сможете:...</a></p>
                                          <div class="post-classic-time"><span class="icon mdi mdi-clock"></span>
                                            <time datetime="2020">Июнь 30, 2024</time>
                                          </div>
                                        </div>
                    </article>
                  </div>
                </div>
                <div class="aside-component">
                  <!-- Heading Component-->
                  <article class="heading-component">
                    <div class="heading-component-inner">
                      <h5 class="heading-component-title">Мы в соцсетях
                      </h5>
                    </div>
                  </article>
                  <!-- Buttons Media-->
                  <div class="group-sm group-flex"><a class="button-media button-media-facebook" href="#">
                      <h4 class="button-media-title">300k</h4>
                      <p class="button-media-action">Подписаться<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-telegram"></span></a><a class="button-media button-media-twitter" href="#">
                      <h4 class="button-media-title">120k</h4>
                      <p class="button-media-action">Подписаться<span class="icon material-icons-add_circle_outline icon-sm"></span></p><span class="button-media-icon fa-vk"></span></a>
                  </div>
                </div>
                <div class="aside-component">
                  <div class="owl-carousel-outer-navigation">
                    <!-- Heading Component-->
                    <article class="heading-component">
                      <div class="heading-component-inner">
                        <h5 class="heading-component-title">Магазин
                        </h5>
                        <div class="owl-carousel-arrows-outline">
                          <div class="owl-nav">
                            <button class="owl-arrow owl-arrow-prev"></button>
                            <button class="owl-arrow owl-arrow-next"></button>
                          </div>
                        </div>
                      </div>
                    </article>
                    <!-- Owl Carousel-->
                    <div class="owl-carousel owl-spacing-1" data-items="1" data-dots="false" data-nav="true" data-autoplay="true" data-autoplay-speed="4000" data-stage-padding="0" data-loop="false" data-margin="30" data-mouse-drag="false" data-nav-custom=".owl-carousel-outer-navigation">
                      



                      <article class="product"> <a href="carDealership.php">
                        <header class="product-header">
                          <!-- Badge-->
                          <div class="badge badge-red">hot<span class="icon material-icons-whatshot"></span>
                          </div>
                          <div class="product-figure"><img src="imgProd/C5.png"  width="270" height="210"/></div>
                          <div class="product-buttons">
                            <div class="product-button product-button-share fl-bigmug-line-share27" style="font-size: 22px">
                              <ul class="product-share">
                                <li class="product-share-item"><span>Share</span></li>
                                <li class="product-share-item"><a class="icon fa fa-telegram" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-vk" href="#"></a></li>
                              </ul>
                            </div>
                            <a class="product-button fl-bigmug-line-shopping202" href="#" style="font-size: 26px"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="carDealership.php">TESLA PLEID</a></h6>
                          <div class="product-price"><span class="heading-6 product-price-new">12 000 000 ₽</span>
                          </div>
                        </footer>
                      </a>
                      </article>





                      <article class="product"> <a href="phoneMarket.php">
                        <header class="product-header">
                          <!-- Badge-->
                          <div class="badge badge-shop">new
                          </div>
                          <div class="product-figure"><img src="imgProd/P1.png" width="270" height="210"/></div>
                          <div class="product-buttons">
                            <div class="product-button product-button-share fl-bigmug-line-share27" style="font-size: 22px">
                              <ul class="product-share">
                                <li class="product-share-item"><span>Share</span></li>
                                <li class="product-share-item"><a class="icon fa fa-telegram" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-vk" href="#"></a></li>
                              </ul>
                            </div><a class="product-button fl-bigmug-line-shopping202" href="#" style="font-size: 26px"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="phoneMarket.php">СМАРТФОН APPLE IPHONE 15 PRO MAX</a></h6>
                          <div class="product-price"><span class="heading-6 product-price-new">140 990 ₽</span>
                          </div>
                        </footer>
                      </a>
                      </article>


                      <article class="product"> <a href="carDealership.php">
                        <header class="product-header">
                          <!-- Badge-->
                          <div class="badge badge-red">hot<span class="icon material-icons-whatshot"></span>
                          </div>
                          <div class="product-figure"><img src="imgProd/C3.png" width="270" height="210"/></div>
                          <div class="product-buttons">
                            <div class="product-button product-button-share fl-bigmug-line-share27" style="font-size: 22px">
                              <ul class="product-share">
                                <li class="product-share-item"><span>Share</span></li>
                                <li class="product-share-item"><a class="icon fa fa-telegram" href="#"></a></li>
                                <li class="product-share-item"><a class="icon fa fa-vk" href="#"></a></li>
                              </ul>
                            </div><a class="product-button fl-bigmug-line-shopping202" href="#" style="font-size: 26px"></a>
                          </div>
                        </header>
                        <footer class="product-content">
                          <h6 class="product-title"><a href="carDealership.php">KAMAZ SPORT</a></h6>
                          <div class="product-price"><span class="heading-6 product-price-new">10 000 000 ₽</span>
                          </div>
                        </footer>
                      </a>
                      </article>
                    </div>
                  </div>
                </div>
              </aside>
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
    <script src="js/loadCategories.js"></script>
    <script src="akk.js"></script>

  </body>
</html>