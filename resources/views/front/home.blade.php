@extends('layouts.front-layout')


@section('content')
 <!-- hero area start -->
 <section class="hero__area hero__height p-relative d-flex align-items-center" data-background="front/img/hero/home-1/hero-bg.jpg">
    <div class="hero__shape">
       <img class="hero-circle-1" src="front/img/icon/hero/home-1/circle-1.png" alt="">
       <img class="hero-circle-2" src="front/img/icon/hero/home-1/circle-2.png" alt="">
       <img class="hero-triangle-1" src="front/img/icon/hero/home-1/triangle-1.png" alt="">
       <img class="hero-triangle-2" src="front/img/icon/hero/home-1/triangle-2.png" alt="">
    </div>
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xxl-7 col-xl-6 col-lg-6">
             <div class="hero__content pr-80">
                <h2 class="hero__title wow fadeInUp" data-wow-delay=".3s">The Only Link You’ll Ever Need</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">Easily promote new releases, tickets, and merchandise.
                   Get superior insights with plays, downloads, and sales reporting.</p>
                   <div class="hero__btn-4">
                      <a href="sign-up.html" class="w-btn-round mr-25 wow fadeInUp" data-wow-delay=".9s">Get Started for Free</a>
                      <a href="sign-in.html" class="w-btn-round w-btn-round-2 wow fadeInUp" data-wow-delay="1.2s">Already on FanPlug? Login</a>
                   </div>

             </div>
          </div>
          <div class="col-xxl-5 col-xl-6 col-lg-6">
             <div class="hero__thumb text-end ml-220">
                <div class="hero__thumb-wrapper p-relative ">
                   <img class="hero-circle" src="front/img/hero/home-1/hero-circle.png" alt="">

                   <div class="hero__thumb-shape shape-1">
                      <img src="front/img/hero/home-1/hero-1.png" alt="">
                   </div>
                   <div class="hero__thumb-shape shape-2">
                      <img src="front/img/hero/home-1/hero-2.png" alt="">
                   </div>
                   <div class="hero__thumb-shape shape-3">
                      <img src="front/img/hero/home-1/hero-3.png" alt="">
                   </div>
                   <div class="hero__thumb-shape shape-4">
                      <img src="front/img/hero/home-1/hero-4.png" alt="">
                   </div>
                   <div class="hero__thumb-shape shape-5">
                      <img src="front/img/hero/home-1/hero-5.png" alt="">
                   </div>
                   <div class="hero__thumb-shape shape-3">
                      <img src="front/img/hero/home-1/hero-phone.png" alt="">
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- hero area end -->

 <!-- services area start -->
 <section class="services__area p-relative pt-150 pb-130">
    <div class="services__shape">
       <img class="services-circle-1" src="front/img/icon/services/home-1/circle-1.png" alt="">
       <img class="services-circle-2" src="front/img/icon/services/home-1/circle-2.png" alt="">
       <img class="services-dot" src="front/img/icon/services/home-1/dot.png" alt="">
       <img class="services-triangle" src="front/img/icon/services/home-1/triangle.png" alt="">
    </div>
    <div class="container">
       <div class="row">
          <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-6 col-md-10 offset-md-1 p-0">
             <div class="section__title-wrapper text-center mb-75 wow fadeInUp" data-wow-delay=".3s">
                <h2 class="section__title">Get Answers, Insights Result in Simple Steps.</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
             <div class="services__inner hover__active mb-30 wow fadeInUp" data-wow-delay=".3s">
                <div class="services__item white-bg text-center transition-3 ">
                   <div class="services__icon mb-25 d-flex align-items-end justify-content-center">
                      <img src="front/img/icon/services/home-1/services-1.png" alt="">
                   </div>
                   <div class="services__content">
                      <h3 class="services__title"><a href="services-details.html">Customize your Fanplug</a></h3>
                      <p>Make your Fanplug pop. Embody your brand through custom colors, fonts and images.</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
             <div class="services__inner hover__active active mb-30 wow fadeInUp" data-wow-delay=".5s">
                <div class="services__item white-bg mb-30 text-center transition-3" >
                   <div class="services__icon mb-25 d-flex align-items-end justify-content-center">
                      <img src="front/img/icon/services/home-1/services-2.png" alt="">
                   </div>
                   <div class="services__content">
                      <h3 class="services__title"><a href="services-details.html">Great Analytics and Insights</a></h3>
                      <p>Gain valuable insight into your traffic and discover which content is performing with your audience.</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
             <div class="services__inner hover__active mb-30 wow fadeInUp" data-wow-delay=".7s">
                <div class="services__item white-bg text-center transition-3">
                   <div class="services__icon mb-25 d-flex align-items-end justify-content-center">
                      <img src="front/img/icon/services/home-1/services-4.png" alt="">
                   </div>
                   <div class="services__content">
                      <h3 class="services__title"><a href="services-details.html">Powerful Third-Party Integrations</a></h3>
                      <p>Collect email subscribers, connect with third-party analytics and remarket to your audience.</p>
                   </div>
                </div>
             </div>
          </div>
          <!-- <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
             <div class="services__inner hover__active mb-30 wow fadeInUp" data-wow-delay=".9s">
                <div class="services__item white-bg text-center transition-3"">
                   <div class="services__icon mb-25 d-flex align-items-end justify-content-center">
                      <img src="front/img/icon/services/home-1/services-4.png" alt="">
                   </div>
                   <div class="services__content">
                      <h3 class="services__title"><a href="services-details.html">Technology</a></h3>
                      <p>Absolutely bladdered he  blimey guvnor.</p>
                   </div>
                </div>
             </div>
          </div> -->
       </div>
       <div class="row">
          <div class="col-xxl-12">
             <div class="features__more text-center mt-50">
                <a href="sign-up.html" class="w-btn w-btn-6 w-btn-5">View all Features</a>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- services area end -->

 <!-- about area start -->
 <section class="about__area pb-120 p-relative">
    <div class="about__shape">
       <img class="about-triangle" src="front/img/icon/about/home-1/triangle.png" alt="">
       <img class="about-circle" src="front/img/icon/about/home-1/circle.png" alt="">
       <img class="about-circle-2" src="front/img/icon/about/home-1/circle-2.png" alt="">
       <img class="about-circle-3" src="front/img/icon/about/home-1/circle-3.png" alt="">
    </div>
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-9">
             <div class="about__wrapper mb-10">
                <div class="section__title-wrapper mb-25">
                   <h2 class="section__title">Use it anywhere</h2>
                   <p>Take your Fanplug wherever your audience is, to help them to discover all your important content. Direct eyeballs to your most important content everywhere you are online. A simple to use brandable and beautiful microsite.
                   </p>
                </div>


                <!-- <a href="contact.html" class="w-btn w-btn-3 w-btn-1">Get Started</a> -->
             </div>
          </div>
          <div class="col-xxl-6 offset-xxl-1 col-xl-6 col-lg-6 col-md-10 order-first order-lg-last">
             <div class="about__thumb-wrapper p-relative ml-40 fix text-end">
                <img src="front/img/about/home-1/about-bg.png" alt="">
                <div class="about__thumb p-absolute">
                   <img class="bounceInUp wow about-big" data-wow-delay=".3s" src="front/img/about/home-1/m-marc.png" alt="">
                   <img class="about-sm" src="front/img/about/home-1/about-1-1.png" alt="">
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- about area end -->

 <!-- about area start -->
 <section class="about__area pb-160 pt-80 p-relative">
    <div class="about__shape">
       <img class="about-plus" src="front/img/icon/about/home-1/plus.png" alt="">
       <img class="about-triangle-2" src="front/img/icon/about/home-1/triangle-2.png" alt="">
       <img class="about-circle-4" src="front/img/icon/about/home-1/circle-4.png" alt="">
       <img class="about-circle-5" src="front/img/icon/about/home-1/circle-5.png" alt="">
    </div>
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xxl-6 col-xl-6 col-lg-6">
             <div class="about__thumb-wrapper p-relative ml--30 fix mr-70">
                <img src="front/img/about/home-1/about-bg-2.png" alt="">
                <div class="about__thumb about__thumb-2 p-absolute wow fadeInUp" data-wow-delay=".3s">
                   <img class="about-big bounceInUp wow" data-wow-delay=".5s" src="front/img/about/home-1/m-elsie.png" alt="">
                   <img class="about-sm about-sm-2"  src="front/img/about/home-1/about-2-1.png" alt="">
                </div>
             </div>
          </div>
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-9">
             <div class="about__wrapper about__wrapper-2 ml-60 mb-30">
                <div class="section__title-wrapper mb-25">
                   <h2 class="section__title">Link to everywhere</h2>
                   <p>Fanplug is the launchpad to your latest video, article, recipe, tour, store, website, social post - everywhere you are online. Hype up your fans for new releases and preload your launch day success.</p>
                </div>
                <!-- <ul>
                   <li>Intergate With Popular Softwares item</li>
                   <li>Instantly Create Your Crowdfunding Platform</li>
                </ul>
                <a href="contact.html" class="w-btn w-btn-3 w-btn-1">Get Started</a> -->
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- about area end -->

 <!-- about area start -->
 <section class="about__area pb-120 p-relative">
    <div class="about__shape">
       <img class="about-triangle" src="front/img/icon/about/home-1/triangle.png" alt="">
       <img class="about-circle" src="front/img/icon/about/home-1/circle.png" alt="">
       <img class="about-circle-2" src="front/img/icon/about/home-1/circle-2.png" alt="">
       <img class="about-circle-3" src="front/img/icon/about/home-1/circle-3.png" alt="">
    </div>
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-9">
             <div class="about__wrapper mb-10">
                <div class="section__title-wrapper mb-25">
                   <h2 class="section__title">Easily managed</h2>
                   <p>Creating a Fanplug takes seconds. Use our simple drag-and-drop editor to effortlessly manage your content. Link to your track or album across all services with our highly customisable smart link pages.</p>
                </div>
                <!-- <ul>
                   <li>Intergate With Popular Softwares item</li>
                   <li>Instantly Create Your Crowdfunding Platform</li>
                </ul> -->
                <!-- <a href="contact.html" class="w-btn w-btn-3 w-btn-1">Get Started</a> -->
             </div>
          </div>
          <div class="col-xxl-6 offset-xxl-1 col-xl-6 col-lg-6 col-md-10 order-first order-lg-last">
             <div class="about__thumb-wrapper p-relative ml-40 fix text-end">
                <img src="front/img/about/home-1/about-bg.png" alt="">
                <div class="about__thumb p-absolute">
                   <img class="bounceInUp wow about-big" data-wow-delay=".3s" src="front/img/about/home-1/m-noir.png" alt="">
                   <img class="about-sm" src="front/img/about/home-1/about-1-1.png" alt="">
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- about area end -->

 <!-- pricing area start -->
 <section class="price__area grey-bg pt-105 pb-90">
    <div class="container">
       <div class="row">
          <div class="col-xxl-7 col-xl-7 col-lg-8">
             <div class="section__title-wrapper mb-65 wow fadeInUp" data-wow-delay=".3s">
                <h2 class="section__title">Plans for Everyone. Start now with a free trial. No credit card required.</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
             <div class="price__item white-bg mb-30 transition-3 fix wow fadeInUp" data-wow-delay=".3s">
                <div class="price__offer mb-15">
                   <span>Free</span>
                </div>
                <div class="price__tag mb-15">
                   <h3>$0</h3>
                </div>
                <div class="price__text mb-25">
                   <p>Make smarter marketing decisions with trackable links for your music, merch, tickets, social bios, and more.</p>
                </div>
                <div class="price__features mb-40">
                   <ul>
                      <li>Release, social bio, ticket, playlist, and content links</li>
                      <li>Customize campaign names (lnk.to/campaign-name)</li>
                      <li>Customize and reorder services</li>
                      <li>Link insights</li>
                      <li>Fanplug exclusive streaming insights</li>
                   </ul>
                </div>
                <a href="sign-up.html" class="w-btn w-btn-4 w-100 price__btn">Try for free</a>

             </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
             <div class="price__item hover__active active white-bg mb-30 transition-3 fix wow fadeInUp" data-wow-delay=".5s">
                <div class="price__offer mb-15">
                   <span>Basic</span>
                </div>
                <div class="price__tag mb-15">
                   <h3>$30<span>Monthly</span></h3>
                </div>
                <div class="price__text mb-25">
                   <p>Level up your marketing with pre-release campaigns, branded smart links, and custom landing pages.</p>
                </div>
                <div class="price__features mb-40">
                   <ul>
                      <li>All features included in Starter, plus:</li>
                      <li>Pre-save links</li>
                      <li>Customize subdomains (artist.lnk.to)</li>
                      <li>Add custom stores</li>
                      <li>Pre-save insights</li>
                      <li>2 user licenses</li>
                   </ul>
                </div>
                <a href="sign-up.html" class="w-btn w-btn-4 w-100 price__btn">Try for free</a>
             </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
             <div class="price__item white-bg mb-30 transition-3 fix wow fadeInUp" data-wow-delay=".6s">
                <div class="price__offer mb-15">
                   <span>Enterprise</span>
                </div>
                <div class="price__tag mb-15">
                   <h3>$200<span>Yearly</span></h3>
                </div>
                <div class="price__text mb-25">
                   <p>Level up your marketing with pre-release campaigns, branded smart links, and custom landing pages.</p>
                </div>
                <div class="price__features mb-40">
                   <ul>
                      <li>All features included in Starter, plus:</li>
                      <li>Pre-save links</li>
                      <li>Customize subdomains (artist.lnk.to)</li>
                      <li>Add custom stores</li>
                      <li>Pre-save insights</li>
                      <li>2 user licenses</li>
                   </ul>
                </div>
                <a href="sign-up.html" class="w-btn w-btn-4 w-100 price__btn">Try for free</a>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- pricing area end -->

 <!-- testimonial area start -->
 <section class="testimonial__area pt-150 pb-70 p-relative overflow-y-visible">
    <div class="circle-animation testimonial">
       <span></span>
    </div>
    <div class="testimonial__shape">
       <img class="testimonial-circle-1" src="front/img/icon/testimonial/home-1/circle-1.png" alt="">
       <img class="testimonial-circle-2" src="front/img/icon/testimonial/home-1/circle-2.png" alt="">
    </div>
    <div class="container">
       <div class="row">
          <div class="col-xxl-6 offset-xxl-3 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
             <div class="section__title-wrapper text-center section-padding mb-65 wow fadeInUp" data-wow-delay=".3s">
                <h2 class="section__title">What People Say About Our Products.</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xxl-12">
             <div class="testimonial__slider owl-carousel wow fadeInUp" data-wow-delay=".5s">
                <div class="testimonial__item white-bg transition-3 mb-110">
                   <div class="testimonial__thumb mb-25">
                      <img src="front/img/testimonial/home-1/testi-5.png" alt="">
                   </div>
                   <div class="testimonial__text mb-25">
                      <p>‘’ With Fanplug, I now create links for my music faster than ever before—no need to put in every single link from each distributor manually.

                         It’s easy to use and the link looks stunningly professional.

                         Fanplug has helped me reach thousands of followers around the world.

                          ’’ </p>
                   </div>
                   <div class="testimonial__author">
                      <h3>Shinna</h3>
                      <span>Developer</span>
                   </div>
                </div>
                <div class="testimonial__item white-bg transition-3 mb-110">
                   <div class="testimonial__thumb mb-25">
                      <img src="front/img/testimonial/home-1/testi-6.png" alt="">
                   </div>
                   <div class="testimonial__text mb-25">
                      <p>‘’Fanplug has increased my streams and made it easier for fans to find my music on streaming platforms.

                         It’s also a great tool to keep track of visitors, clicks, and to identify where my fans are located. ’’ </p>
                   </div>
                   <div class="testimonial__author">
                      <h3>Steve Smith</h3>
                      <span>Designer</span>
                   </div>
                </div>
                <div class="testimonial__item white-bg transition-3 mb-110">
                   <div class="testimonial__thumb mb-25">
                      <img src="front/img/testimonial/home-1/testi-1.png" alt="">
                   </div>
                   <div class="testimonial__text mb-25">
                      <p>‘’With the Fanplug platform, we’ve significantly improved our internal processes and simplified the communication for our touring artists.

                         Fans are now only two clicks away from buying a ticket to a show, and with Insights, we know what works best—which varies quite a bit from artist to artist. ’’ </p>
                   </div>
                   <div class="testimonial__author">
                      <h3>Hilary Ouse</h3>
                      <span>Developer</span>
                   </div>
                </div>
                <div class="testimonial__item white-bg transition-3 mb-110">
                   <div class="testimonial__thumb mb-25">
                      <img src="front/img/testimonial/home-1/testi-2.png" alt="">
                   </div>
                   <div class="testimonial__text mb-25">
                      <p>‘’With Fanplug, I now create links for my music faster than ever before—no need to put in every single link from each distributor manually.

                         It’s easy to use and the link looks stunningly professional.

                         Fanplug has helped me reach thousands of followers around the world.H ’’ </p>
                   </div>
                   <div class="testimonial__author">
                      <h3>Elon Gated</h3>
                      <span>Designer</span>
                   </div>
                </div>
                <div class="testimonial__item white-bg transition-3 mb-110">
                   <div class="testimonial__thumb mb-25">
                      <img src="front/img/testimonial/home-1/testi-3.png" alt="">
                   </div>
                   <div class="testimonial__text mb-25">
                      <p>‘’Fanplug has increased my streams and made it easier for fans to find my music on streaming platforms.

                         It’s also a great tool to keep track of visitors, clicks, and to identify where my fans are located. ’’ </p>
                   </div>
                   <div class="testimonial__author">
                      <h3>Victor </h3>
                      <span>Developer</span>
                   </div>
                </div>
                <div class="testimonial__item white-bg transition-3 mb-110">
                   <div class="testimonial__thumb mb-25">
                      <img src="front/img/testimonial/home-1/testi-4.png" alt="">
                   </div>
                   <div class="testimonial__text mb-25">
                      <p>‘’With the Fanplug platform, we’ve significantly improved our internal processes and simplified the communication for our touring artists.

                         Fans are now only two clicks away from buying a ticket to a show, and with Insights, we know what works best—which varies quite a bit from artist to artist.  ’’ </p>
                   </div>
                   <div class="testimonial__author">
                      <h3>Lily Gomz</h3>
                      <span>Developer</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- testimonial area end -->

 <!-- faq area start -->
 <section class="faq__area  pt-140 pb-140">
    <div class="container">
       <div class="row">
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
             <div class="faq__wrapper wow fadeInUp" data-wow-delay=".3s">
                <div class="accordion" id="accordionExample">
                   <div class="accordion-item">
                     <h2 class="accordion-header" id="headingOne">
                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         What to do if you can’t access ?
                       </button>
                     </h2>
                     <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                         <p>FanPlug link levels the playing field with powerful tools to help artists succeed worldwide.</p>
                       </div>
                     </div>
                   </div>
                   <div class="accordion-item">
                     <h2 class="accordion-header" id="headingTwo">
                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                         How to start an online store in 2021 ?
                       </button>
                     </h2>
                     <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                         <p>FanPlug link levels the playing field with powerful tools to help artists succeed worldwide.</p>
                       </div>
                     </div>
                   </div>
                   <div class="accordion-item border-none">
                     <h2 class="accordion-header" id="headingThree">
                       <button class="accordion-button collapsed pb-0 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                         How to can i subscribe and get started ?
                       </button>
                     </h2>
                     <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                       <div class="accordion-body">
                         <p>FanPlug.link levels the playing field with powerful tools to help artists succeed worldwide./p>
                       </div>
                     </div>
                   </div>
                 </div>
             </div>
          </div>
          <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6 col-md-8">
             <div class="faq__content">
                <div class="section__title-wrapper section__title-wrapper-2 mb-35 wow fadeInUp" data-wow-delay=".5s">
                   <h2 class="section__title section__title-2">Loved and trusted by over 40k+ users!</h2>
                   <p>FanPlug link levels the playing field with powerful tools to help artists succeed worldwide.</p>
                </div>
                <div class="faq__counter wow fadeInUp" data-wow-delay=".7s">
                   <ul>
                      <li>
                         <h3 class="pink"><span class="counter">130,876</span></h3>
                         <p>Happy Clients</p>
                      </li>
                      <li>
                         <h3 class="blue"><span class="counter">156</span></h3>
                         <p>Projects</p>
                      </li>
                      <li>
                         <h3 class="yellow"><span class="counter">40,000</span></h3>
                         <p>Trusted Users</p>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- faq area end -->

 <!-- cta area start -->
 <section class="cta__area mb--149 p-relative">
    <div class="circle-animation cta-1">
       <span></span>
    </div>
    <div class="circle-animation cta-1 cta-2">
       <span></span>
    </div>
    <div class="circle-animation cta-3">
       <span></span>
    </div>
    <div class="container">
       <div class="cta__inner p-relative fix z-index-1 wow fadeInUp" data-wow-delay=".5s">
          <div class="cta__shape">
             <img class="circle" src="front/img/cta/home-1/cta-circle.png" alt="">
             <img class="circle-2" src="front/img/cta/home-1/cta-circle-2.png" alt="">
             <img class="circle-3" src="front/img/cta/home-1/cta-circle-3.png" alt="">
             <img class="triangle-1" src="front/img/cta/home-1/cta-triangle.png" alt="">
             <img class="triangle-2" src="front/img/cta/home-1/cta-triangle-2.png" alt="">
          </div>
          <div class="row">
             <div class="col-xxl-12">
                <div class="cta__wrapper d-lg-flex justify-content-between align-items-center">
                   <div class="cta__content">
                      <h3 class="cta__title">Take it for a spin <br> Get Started with Fanplug</h3>
                   </div>
                   <div class="cta__btn">
                      <a href="sign-up.html" class="w-btn w-btn-white">Try for Free</a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- cta area end -->
@endsection
