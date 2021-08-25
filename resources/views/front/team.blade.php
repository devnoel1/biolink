@extends('layouts.front-layout')

@section('content')

        <!-- page title area start -->
        <section class="page__title-area page__title-height d-flex align-items-center fix p-relative z-index-1" data-background="front/img/page-title/page-title.jpg">
            <div class="page__title-shape">
               <img class="page-title-dot-4" src="front/img/page-title/dot-4.png" alt="">
               <img class="page-title-dot" src="front/img/page-title/dot.png" alt="">
               <img class="page-title-dot-2" src="front/img/page-title/dot-2.png" alt="">
               <img class="page-title-dot-3" src="front/img/page-title/dot-3.png" alt="">
               <img class="page-title-plus" src="front/img/page-title/plus.png" alt="">
               <img class="page-title-triangle" src="front/img/page-title/triangle.png" alt="">
            </div>
              <div class="container">
                 <div class="row">
                    <div class="col-xxl-12">
                       <div class="page__title-wrapper text-center">
                          <h3> Team </h3>
                           <nav aria-label="breadcrumb">
                              <ol class="breadcrumb justify-content-center">
                                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Team</li>
                              </ol>
                           </nav>
                       </div>
                    </div>
                 </div>
              </div>
           </section>
           <!-- page title area end -->

            <!-- team area start -->
            <section class="team__area grey-bg-3 pt-120 pb-70 overflow-y-visible p-relative">
               <div class="team__shape">
                  <img class="team-dot" src="{{ asset('front/img/icon/team/home-2/team-dot.png') }}" alt="">
                  <img class="team-triangle" src="{{ asset('front/img/icon/team/home-2/team-triangle.png') }}" alt="">
               </div>
               <div class="container">
                  <div class="row align-items-end">
                     <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-8">
                        <div class="section__title-wrapper mb-70 wow fadeInUp" data-wow-delay=".3s">
                           <span class="section__pre-title blue">Team</span>
                           <h2 class="section__title section__title-2">Our expert team thinking creative</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team__item mb-40">
                           <div class="team__thumb w-img p-relative mb-20 fix">
                              <img src="{{ asset('front/img/team/home-2/team-1.jpg') }}" alt="">

                              <div class="team__social">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team__content">
                              <h3 class="team__title"><a href="team-details.html">Habib Hemel</a></h3>
                              <span class="team__position">UI UX Designer</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="team__item mb-40">
                           <div class="team__thumb w-img p-relative mb-20 fix">
                              <img src="{{ asset('front/img/team/home-2/team-2.jpg') }}" alt="">

                              <div class="team__social">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team__content">
                              <h3 class="team__title"><a href="team-details.html">Nathaneal Down</a></h3>
                              <span class="team__position">Developer</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="team__item mb-40">
                           <div class="team__thumb w-img p-relative mb-20 fix">
                              <img src="{{ asset('front/img/team/home-2/team-3.jpg') }}" alt="">

                              <div class="team__social">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team__content">
                              <h3 class="team__title"><a href="team-details.html">Russell Sprout</a></h3>
                              <span class="team__position">Supporter</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                        <div class="team__item mb-40">
                           <div class="team__thumb w-img p-relative mb-20 fix">
                              <img src="front/img/team/home-2/team-4.jpg" alt="">

                              <div class="team__social">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team__content">
                              <h3 class="team__title"><a href="team-details.html">Parsley Montana</a></h3>
                              <span class="team__position">Supporter</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.2s">
                        <div class="team__item mb-40">
                           <div class="team__thumb w-img p-relative mb-20 fix">
                              <img src="front/img/team/home-2/team-5.jpg" alt="">

                              <div class="team__social">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team__content">
                              <h3 class="team__title"><a href="team-details.html">Illian Decap</a></h3>
                              <span class="team__position">Envato Customer</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.5s">
                        <div class="team__item mb-40">
                           <div class="team__thumb w-img p-relative mb-20 fix">
                              <img src="front/img/team/home-2/team-6.jpg" alt="">

                              <div class="team__social">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="team__content">
                              <h3 class="team__title"><a href="team-details.html">Jonas John</a></h3>
                              <span class="team__position">Creator</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- team area start -->

            <!-- cta area start -->
            <section class="cta__area blue-bg-10 pt-140 pb-130 p-relative fix z-index-1">
               <div class="cta__shape">
                  <img class="cta-4-shape" src="front/img/cta/home-4/cta-shape.png" alt="">
               </div>
               <div class="container">
                  <div class="row">
                     <div class="col-xxl-8 offset-xxl-2">
                        <div class="cta__content-4 text-center">
                           <div class="section__title-wrapper section__title-wrapper-4 section__title-white text-center mb-45 wow fadeInUp" data-wow-delay=".3s">
                              <h2 class="section__title section__title-4">Our Free Trial for 14-days Today</h2>
                              <p>Get the word out and sell more with sleek email messages that.</p>
                           </div>
                           <div class="cta__form mb-25 wow fadeInUp" data-wow-delay=".5s">
                              <form action="#">
                                 <input type="email" placeholder="Enter Your Email">
                                 <button type="submit">Start Free Trial</button>
                              </form>
                           </div>
                           <div class="cta__features wow fadeInUp" data-wow-delay=".7s">
                              <ul>
                                 <li>Product support</li>
                                 <li>Free trial</li>
                                 <li>Connect Customer</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- cta area end -->
@endsection
