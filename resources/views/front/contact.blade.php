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
                <h3>Contact </h3>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                         <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Contact</li>
                      </ol>
                   </nav>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- page title area end -->

  <!-- contact area start  -->
  <section class="contact__area pb-150 p-relative z-index-1">
     <div class="container">
        <div class="row">
           <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
              <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
                 <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                       <div class="contact__info pr-80">
                          <h3 class="contact__title">Let's talk</h3>

                          <div class="contact__details">
                             <ul>
                                <li>
                                   <h4>Our Location</h4>
                                   <p>12 Mirpur DOHS, Cantonment, avenue6, road 6, Area 6300, Bedevs </p>
                                </li>
                                <li>
                                   <h4>Email Adress</h4>
                                   <p><a href="https://Fanplug.net/cdn-cgi/l/email-protection#592a2c2929362b2d3d3c2a32193e34383035773a3634"><span class="__cf_email__" data-cfemail="d4a7a1a4a4bba6a0b0b1a7bf94b3b9b5bdb8fab7bbb9">[email&#160;protected]</span></a></p>
                                   <p><a href="https://Fanplug.net/cdn-cgi/l/email-protection#472e292128352a262e282907202a262e2b6924282a"><span class="__cf_email__" data-cfemail="523b3c343d203f333b3d3c12353f333b3e7c313d3f">[email&#160;protected]</span></a></p>
                                </li>
                                <li>
                                   <h4>Hotline Number</h4>
                                   <p><a href="tel:+(046)-320-474-458">+ (046) 320 474 458</a></p>
                                   <p><a href="tel:+(123)-213-147-897">+ (123) 213 147 897</a></p>
                                </li>
                             </ul>
                          </div>
                       </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                       <div class="contact__form">
                          <form action="#">
                             <input type="text" placeholder="Name">
                             <input type="email" placeholder="Email">
                             <input type="subject" placeholder="Subject">
                             <textarea placeholder="Message"></textarea>
                             <button type="submit" class="w-btn w-btn-blue-5 w-btn-6 w-btn-14">Send Massage</button>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </section>
  <!-- contact area end  -->

 <!-- contact support area start -->
 <section class="contact__support p-relative pb-110">
    <div class="contact__shape">
       <img src="front/img/contact/shape.png" alt="">
    </div>
    <div class="container">
       <div class="row">
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
             <div class="contact__item-inner hover__active mb-30">
                <div class="contact__item text-center transition-3 white-bg">
                   <div class="contact__icon d-flex justify-content-center align-items-end">
                      <img src="front/img/contact/call.png" alt="">
                   </div>
                   <div class="contact__content">
                      <h3 class="contact__title-2"><a href="#">Quick Answers</a></h3>
                      <p>Absolutely bladdered he  blimey guvnor agency. </p>
                      <a href="#" class="link-btn">Read More <i class="arrow_right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
             <div class="contact__item-inner hover__active mb-30">
                <div class="contact__item text-center transition-3 white-bg">
                   <div class="contact__icon d-flex justify-content-center align-items-end">
                      <img src="front/img/contact/message.png" alt="">
                   </div>
                   <div class="contact__content">
                      <h3 class="contact__title-2"><a href="#">Customer Support</a></h3>
                      <p>Absolutely bladdered he  blimey guvnor agency. </p>
                      <a href="#" class="link-btn">Help & Support<i class="arrow_right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
             <div class="contact__item-inner hover__active mb-30">
                <div class="contact__item text-center transition-3 white-bg">
                   <div class="contact__icon d-flex justify-content-center align-items-end">
                      <img src="front/img/contact/social.png" alt="">
                   </div>
                   <div class="contact__content">
                      <h3 class="contact__title-2"><a href="#">We are Social</a></h3>
                      <p>Absolutely bladdered he  blimey guvnor agency. </p>
                      <a href="#" class="link-btn">Join our Community<i class="arrow_right"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- contact support area end -->

 <!-- contact form area start -->
 <section class="contact__map">
    <div class="container-fluid p-0">
       <div class="row g-0">
          <div class="col-xxl-12">
             <div class="contact__map wow fadeInUp" data-wow-delay=".3s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.4800810528923!2d90.36797221544877!3d23.837080434546706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14a3366b005%3A0x901b07016468944c!2z4Kau4Ka_4Kaw4Kaq4KeB4KawIOCmoeCmvyzgppMs4KaP4KaH4KaaLOCmj-CmuCwg4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1615723408957!5m2!1sbn!2sbd"></iframe>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- contact form area end -->
@endsection
