<!doctype html>
<html class="no-js" lang="zxx">

<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>FanPlug | Single Bio Link for everything</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/img/favicon.png') }}">
      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('front/css/preloader.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/meanmenu.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/animate.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/backToTop.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.min.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/fontAwesome5Pro.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/elegantFont.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/default.css') }}">
      <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
   </head>
   <body>

      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <div class="object" id="object_one"></div>
               <div class="object" id="object_two" style="left:20px;"></div>
               <div class="object" id="object_three" style="left:40px;"></div>
               <div class="object" id="object_four" style="left:60px;"></div>
               <div class="object" id="object_five" style="left:80px;"></div>
            </div>
         </div>
      </div>
      <!-- pre loader area end -->

      <!-- back to top start -->
      <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      <!-- back to top end -->

      <!-- header area start -->
      <header>
         <div id="header-sticky" class="header__area {{ Request::is('/')? 'header__transparent':'' }} header__padding">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-3 col-xl-3 col-lg-2 col-md-6 col-6">
                     <div class="logo">
                        <a href="{{ url('', []) }}">
                           <img src="{{ asset('front/img/logo/logo.png') }}" alt="logo">
                        </a>
                     </div>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-7 d-none d-lg-block">
                     <div class="main-menu">
                        <nav id="mobile-menu">
                           <ul>
                              <li><a href="{{ url('blog', []) }}">Blog</a></li>
                              <li><a href="{{ url('team', []) }}">Team</a></li>
                              <li><a href="{{ url('help', []) }}">Help</a></li>

                              <li><a href="{{ url('contact', []) }}">Contact</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-6">
                     <div class="header__right text-end d-flex align-items-center justify-content-end">
                        <div class="header__right-btn d-none d-md-flex align-items-center">
                           <a href="{{ url('signin', []) }}" class="header__btn">login</a>
                           <a href="{{ url('signup', []) }}" class="w-btn ml-45">sign up free</a>
                        </div>
                        <div class="sidebar__menu d-lg-none">
                           <div class="sidebar-toggle-btn" id="sidebar-toggle">
                               <span class="line"></span>
                               <span class="line"></span>
                               <span class="line"></span>
                           </div>
                       </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header area end -->

      <!-- sidebar area start -->
      <div class="sidebar__area">
         <div class="sidebar__wrapper">
            <div class="sidebar__close">
               <button class="sidebar__close-btn" id="sidebar__close-btn">
               <span><i class="fal fa-times"></i></span>
               <span>close</span>
               </button>
            </div>
            <div class="sidebar__content">
               <div class="logo mb-40">
                  <a href="{{ url('', []) }}">
                  <img src="{{ asset('front/img/logo/logo.png') }}" alt="logo">
                  </a>
               </div>
               <div class="mobile-menu"></div>
               <div class="sidebar__info mt-350">
                  <a href="{{ url('signin', []) }}" class="w-btn w-btn-4 d-block mb-15 mt-15">login</a>
                  <a href="{{ url('signup', []) }}" class="w-btn d-block">sign up</a>
               </div>
            </div>
         </div>
      </div>
      <!-- sidebar area end -->
      <div class="body-overlay"></div>
      <!-- sidebar area end -->

      <main>

        @yield('content')

      </main>

      <!-- footer area start -->
      <footer class="footer__area grey-bg-3 pt-270 p-relative">
         <div class="footer__shape">
            <img class="footer-circle-1" src="{{ asset('front/img/icon/footer/home-1/circle-1.png') }}" alt="">
            <img class="footer-circle-2" src="{{ asset('front/img/icon/footer/home-1/circle-2.png') }}" alt="">
         </div>
         <div class="footer__top pb-65">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                     <div class="footer__widget mb-50">
                        <div class="footer__widget-title mb-25">
                           <div class="footer__logo">
                              <a href="index.html">
                                 <img src="{{ asset('front/img/logo/logo.png') }}" alt="logo">
                              </a>
                           </div>
                        </div>
                        <div class="footer__widget-content">
                           <p>Ever since we started using  we’ve , and more.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                     <div class="footer__widget mb-50 footer__pl-70">
                        <div class="footer__widget-title mb-25">
                           <h3>Overview</h3>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__link">
                              <ul>
                                 <li><a href="#">Terms</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Cookies</a></li>
                                 <li><a href="#">Integrations</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                     <div class="footer__widget mb-50 footer__pl-90">
                        <div class="footer__widget-title mb-25">
                           <h3>Customer</h3>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__link">
                              <ul>
                                 <li><a href="#">Home</a></li>
                                 <li><a href="#">Product</a></li>
                                 <li><a href="#">Pricing</a></li>
                                 <li><a href="#">Integrations</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay=".9s">
                     <div class="footer__widget mb-50">
                        <div class="footer__widget-title mb-25">
                           <h3>Product</h3>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__link">
                              <ul>
                                 <li><a href="#">Getting Started</a></li>
                                 <li><a href="#">Style Guide</a></li>
                                 <li><a href="#">Licences</a></li>
                                 <li><a href="#">Changelog</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="1.2s">
                     <div class="footer__widget mb-50 float-md-end fix">
                        <div class="footer__widget-title mb-25">
                           <h3>Follow Us</h3>
                        </div>
                        <div class="footer__widget-content">
                           <div class="footer__social">
                              <ul>
                                 <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                 <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer__bottom">
            <div class="container">
               <div class="footer__copyright">
                  <div class="row">
                     <div class="col-xxl-12 wow fadeInUp" data-wow-delay=".5s">
                        <div class="footer__copyright-wrapper text-center">
                           <p>© 2021 <a href="#">Fanplug</a> All rights reserved. </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer area end -->

      <!-- JS here -->
      <script src="{{ asset('front/js/vendor/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ asset('front/js/vendor/waypoints.min.js') }}"></script>
      <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('front/js/jquery.meanmenu.js') }}"></script>
      <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('front/js/jquery.fancybox.min.js') }}"></script>
      <script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('front/js/parallax.min.js') }}"></script>
      <script src="{{ asset('front/js/backToTop.js') }}"></script>
      <script src="{{ asset('front/js/jquery.counterup.min.js') }}"></script>
      <script src="{{ asset('front/js/ajax-form.js') }}"></script>
      <script src="{{ asset('front/js/wow.min.js') }}"></script>
      <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
      <script src="{{ asset('front/js/main.js') }}"></script>
   </body>

</html>

