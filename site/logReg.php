<?php
session_start();
$login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Мой аккаунт';
$count = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '';
?>

<!DOCTYPE html>
<html class="wide wow-animation desktop landscape mac-os rd-navbar-static-linked" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Site Title-->
    <title>Вход | Газета</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="icon" href="imgProd/saturn.png">
    <!-- Stylesheets-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
  <body>
    <div class="preloader loaded">
      <div class="preloader-body">
        <div class="preloader-item"></div>
      </div>
    </div>
    <!-- Page-->
    <div class="page animated" style="animation-duration: 500ms;">
      <!-- Page Header-->
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
          </nav>
        </div>
      </header>
      
      <!-- Section Login/register-->
      <section class="section section-variant-1 bg-gray-100">
        <div class="container">
          <div class="row row-50 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
              <div class="card-login-register" id="card-l-r">
                <div class="card-top-panel">
                  <div class="card-top-panel-left">
                    <h5 class="card-title card-title-login">Войти</h5>
                    <h5 class="card-title card-title-register">Зарегистрироваться</h5>
                  </div>
                  <div class="card-top-panel-right"><span class="card-subtitle"><span class="card-subtitle-login">Зарегистрироваться</span><span class="card-subtitle-register">Войти</span></span>
                    <button class="card-toggle" data-custom-toggle="#card-l-r"><span class="card-toggle-circle"></span></button>
                  </div>
                </div>



                <div class="card-form card-form-login">
                  <form class="rd-form rd-mailform" novalidate="novalidate" method="post" action="enter.php" id="enterForm"> 
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="elogin">Login</label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="elogin" type="text" name="login" required><span class="form-validation"></span>
                    </div>
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="epassword">Password</label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="epassword" type="password" name="password" required><span class="form-validation"></span>
                    </div>
                    <button class="button button-lg button-primary button-block" type="submit">Войти</button>
                  </form>

                  <div id="errorModalEnter" class="modalEnter">
                    <div class="modal-contentEnter">
                      <span class="closeEnter">&times;</span>
                      <p id="errorMessageEnter"></p>
                    </div>
                  </div>

                  <div class="group-sm group-sm-justify group-middle">
                    <a class="button button-telegram button-icon button-icon-left button-round" href="#"><span class="icon fa fa-telegram"></span><span>Telegram</span></a>
                    <a class="button button-vk button-icon button-icon-left button-round" href="#"><span class="icon fa fa-vk"></span><span>Vk</span></a>
                  </div>
                </div>




                <div class="card-form card-form-register">
                  <form id="registerForm" class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="js/register.php" novalidate="novalidate">
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="email">E-mail</label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="email" type="email" name="email" required>
                      <span class="form-validation"></span>
                    </div>
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="login">Login</label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="login" type="text" name="login" required>
                      <span class="form-validation"></span>
                    </div>
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="password">Password</label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="password" type="password" name="password" required>
                      <span class="form-validation"></span>
                    </div>
                    <div class="form-wrap">
                      <label class="form-label rd-input-label" for="repeat_password">Repeat Password</label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="repeat_password" type="password" name="repeat_password" required>
                      <span class="form-validation"></span>
                    </div>
                    <button class="button button-lg button-primary button-block" type="submit">Создать аккаунт</button>
                  </form>

                  <div id="errorModal" class="modal">
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <p id="errorMessage"></p>
                    </div>
                  </div>

                  <div class="group-sm group-sm-justify group-middle">
                    <a class="button button-telegram button-icon button-icon-left button-round" href="#"><span class="icon fa fa-telegram"></span><span>Telegram</span></a>
                    <a class="button button-vk button-icon button-icon-left button-round" href="#"><span class="icon fa fa-vk"></span><span>Vk</span></a>
                  </div>
                </div>
                
                

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
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
    <script src="js/windreg.js"></script>
    <script src="windlog.js"></script>
    <script src="akk.js"></script>

  </body>
</html>