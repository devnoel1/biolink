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
                  <h3> Blog </h3>
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                         <li class="breadcrumb-item"><a href="{{ url('', []) }}">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Blog</li>
                      </ol>
                   </nav>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-120 pb-60">
       <div class="container">
          <div class="row">
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="blog__item-5 mb-50">
                   <div class="blog__thumb-5 fix w-img">
                      <a href="blog-details.html">
                         <img src="front/img/blog/home-5/blog-4.jpg" alt="">
                      </a>
                   </div>
                   <div class="blog__content-5">
                      <div class="blog__meta-5">
                         <span class="date">28,March 20, 2021</span>
                         <span class="tag"><a href="#">Marketing</a></span>
                      </div>
                      <h3 class="blog__title-5"><a href="blog-details.html">Web design is now trending on freelancing platform</a></h3>
                      <a href="blog-details.html" class="link-btn">View More <i class="arrow_right"></i> </a>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="blog__item-5 mb-50">
                   <div class="blog__thumb-5 fix w-img">
                      <a href="blog-details.html">
                         <img src="front/img/blog/home-5/blog-5.jpg" alt="">
                      </a>
                   </div>
                   <div class="blog__content-5">
                      <div class="blog__meta-5">
                         <span class="date">28,March 20, 2021</span>
                         <span class="tag"><a href="#">Marketing</a></span>
                      </div>
                      <h3 class="blog__title-5"><a href="blog-details.html">Why we decide to build UX design tools platform?</a></h3>
                      <a href="blog-details.html" class="link-btn">View More <i class="arrow_right"></i> </a>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                <div class="blog__item-5 mb-50">
                   <div class="blog__thumb-5 fix w-img">
                      <a href="blog-details.html">
                         <img src="front/img/blog/home-5/blog-6.jpg" alt="">
                      </a>
                   </div>
                   <div class="blog__content-5">
                      <div class="blog__meta-5">
                         <span class="date">28,March 20, 2021</span>
                         <span class="tag"><a href="#">Marketing</a></span>
                      </div>
                      <h3 class="blog__title-5"><a href="blog-details.html">How to get your handmade website found on Google</a></h3>
                      <a href="blog-details.html" class="link-btn">View More <i class="arrow_right"></i> </a>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                <div class="blog__item-5 mb-50">
                   <div class="blog__thumb-5 fix w-img">
                      <a href="blog-details.html">
                         <img src="front/img/blog/home-5/blog-1.jpg" alt="">
                      </a>
                   </div>
                   <div class="blog__content-5">
                      <div class="blog__meta-5">
                         <span class="date">28,March 20, 2021</span>
                         <span class="tag"><a href="#">Marketing</a></span>
                      </div>
                      <h3 class="blog__title-5"><a href="blog-details.html">Exciting Examples of Hidden Menus in Web Design?</a></h3>
                      <a href="blog-details.html" class="link-btn">View More <i class="arrow_right"></i> </a>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.2s">
                <div class="blog__item-5 mb-50">
                   <div class="blog__thumb-5 fix w-img">
                      <a href="blog-details.html">
                         <img src="front/img/blog/home-5/blog-2.jpg" alt="">
                      </a>
                   </div>
                   <div class="blog__content-5">
                      <div class="blog__meta-5">
                         <span class="date">28,March 20, 2021</span>
                         <span class="tag"><a href="#">Marketing</a></span>
                      </div>
                      <h3 class="blog__title-5"><a href="blog-details.html">What is a digital agency & what can they do for my business?</a></h3>
                      <a href="blog-details.html" class="link-btn">View More <i class="arrow_right"></i> </a>
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1.5s">
                <div class="blog__item-5 mb-50">
                   <div class="blog__thumb-5 fix w-img">
                      <a href="blog-details.html">
                         <img src="front/img/blog/home-5/blog-3.jpg" alt="">
                      </a>
                   </div>
                   <div class="blog__content-5">
                      <div class="blog__meta-5">
                         <span class="date">28,March 20, 2021</span>
                         <span class="tag"><a href="#">Marketing</a></span>
                      </div>
                      <h3 class="blog__title-5"><a href="blog-details.html">What about the design, which are not published ?</a></h3>
                      <a href="blog-details.html" class="link-btn">View More <i class="arrow_right"></i> </a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- blog area end -->
@endsection
