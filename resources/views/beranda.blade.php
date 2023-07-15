@extends('layouts.app')
@section('content')

    <section class="main-slider">
        <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
            data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": true, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>

            @php($no_slideshows = 1)
            @foreach($lihat_slideshows as $slideshows)
                <div class="item main-slider__slide-1">
                    <div class="main-slider__bg"
                        style="background-image: url({{URL::asset('storage/'.$slideshows->gambar_slideshows)}});">
                    </div><!-- /.slider-one__bg -->
                    <div class="main-slider__shape-1">
                        <img src="{{URL::asset('template/front/images/shapes/main-slider-shape-1.png')}}" alt="">
                    </div>
                    <div class="main-slider__shape-2">
                        <img src="{{URL::asset('template/front/images/shapes/main-slider-shape-2.png')}}" alt="">
                    </div>
                    <div class="main-slider__shape-3">
                        <img src="{{URL::asset('template/front/images/shapes/main-slider-shape-3.png')}}" alt="">
                    </div>
                    <div class="main-slider__meta-box"></div>
                    <div class="container">
                        <div class="main-slider__content">
                            <p class="main-slider__sub-title">{{$slideshows->text1_slideshows}}</p>
                            <h2 class="main-slider__title">{!! nl2br($slideshows->text2_slideshows) !!}</h2>
                            <div class="main-slider__btn-box">
                            </div>
                        </div>
                    </div>
                </div>
                @php($no_slideshows++)
            @endforeach
            
        </div>
    </section>
    <!-- Main Sllider Start -->

    <!--Department One Start-->
    <section class="department-one">
        <div class="department-one__bg"
            style="background-image: url(template/front/images/backgrounds/department-one-bg.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="department-one__inner">
                        <ul class="department-one__list list-unstyled">
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="department-details.html">Your
                                            <br> Government</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-parthenon"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="department-details.html">Jobs &
                                            <br> Unemployment</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-suitcase"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="department-details.html">Business
                                            <br> & Industrials</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-industry"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="department-details.html">Roads &
                                            <br> Transportation</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-bus"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="department-details.html">Culture &
                                            <br> Recreations</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-lotus"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="department-one__text">Get our quick services from the municipal. <a href="">View
                                all services</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Department One End-->

    <!--About One Start-->
    <section class="about-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="about-one__shape-1 float-bob-x">
                            <img src="{{URL::asset('template/front/images/shapes/about-one-shape-1.png')}}" alt="">
                        </div>
                        <div class="about-one__shape-3 float-bob-y">
                            <img src="{{URL::asset('template/front/images/shapes/about-one-shape-3.png')}}" alt="">
                        </div>
                        <div class="about-one__img-box">
                            <div class="about-one__img">
                                <img src="{{URL::asset('storage/'.$lihat_profils->foto1_profils)}}" alt="">
                            </div>
                            <div class="about-one__img-2">
                                <img src="{{URL::asset('storage/'.$lihat_profils->foto2_profils)}}" alt="">
                            </div>
                            <div class="about-one__shape-2">
                                <img src="{{URL::asset('template/front/images/shapes/about-one-shape-2.png')}}" alt="">
                            </div>
                            <div class="about-one__video-link">
                                <a href="{{$lihat_profils->url_youtube_profils}}" class="video-popup">
                                    <div class="about-one__video-icon">
                                        <span class="fa fa-play"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="about-one__call-box">
                                <div class="about-one__call-box-content">
                                    <h4 class="about-one__call-number">{{$lihat_profils->nama_profils}}</h4>
                                    <p class="about-one__call-text">{{$lihat_profils->keterangan_nama_profils}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title text-left">
                            <div class="section-title__icon">
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="section-title__tagline">{{$lihat_profils->text1_profils}}</span>
                            <h2 class="section-title__title">{{$lihat_profils->text2_profils}}</h2>
                        </div>
                        {{$lihat_profils->sekilas_konten_profils}}
                        <div class="about-one__btn-box-and-signature">
                            <a href="{{URL('sosok')}}" class="about-one__btn thm-btn">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End-->

    <!--Feature One Start-->
    <section class="feature-one">
        <div class="container">
            <div class="row">
                <!--Feature One Single Start-->
                <div class="col-xl-4 col-lg-4">
                    <div class="feature-one__single">
                        <div class="feature-one__img-box">
                            <div class="feature-one__img">
                                <img src="{{URL::asset('template/front/images/resources/feature-1-1.jpg')}}" alt="">
                            </div>
                            <div class="feature-one__content">
                                <div class="feature-one__icon">
                                    <span class="icon-history"></span>
                                </div>
                                <h3 class="feature-one__title"><a href="our-services.html">History &
                                        <br> establishment</a></h3>
                            </div>
                            <div class="feature-one__content-two">
                                <div class="feature-one__content-two-top">
                                    <div class="feature-one__icon-2">
                                        <span class="icon-history"></span>
                                    </div>
                                    <h3 class="feature-one__title-2"><a href="our-services.html">History &
                                            <br> establishment</a></h3>
                                </div>
                                <div class="feature-one__content-two-bottom">
                                    <p class="feature-one__content-two-text">Aliquam viverra arcu. Donec aliquet
                                        blandit enim. Suspendisse id quam <br> sed eros luctus sit ame.</p>
                                    <div class="feature-one__content-two-btn-box">
                                        <a href="our-services.html" class="feature-one__content-two-read-more">Read
                                            More<i class="icon-right-arrow feature-one__content-two-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Feature One Single End-->
                <!--Feature One Single Start-->
                <div class="col-xl-4 col-lg-4">
                    <div class="feature-one__single">
                        <div class="feature-one__img-box">
                            <div class="feature-one__img">
                                <img src="{{URL::asset('template/front/images/resources/feature-1-2.jpg')}}" alt="">
                            </div>
                            <div class="feature-one__content">
                                <div class="feature-one__icon">
                                    <span class="icon-cityscape"></span>
                                </div>
                                <h3 class="feature-one__title"><a href="our-services.html">Tourism &
                                        <br> visitor guides</a></h3>
                            </div>
                            <div class="feature-one__content-two">
                                <div class="feature-one__content-two-top">
                                    <div class="feature-one__icon-2">
                                        <span class="icon-cityscape"></span>
                                    </div>
                                    <h3 class="feature-one__title-2"><a href="our-services.html">Tourism &
                                            <br> visitor guides</a></h3>
                                </div>
                                <div class="feature-one__content-two-bottom">
                                    <p class="feature-one__content-two-text">Aliquam viverra arcu. Donec aliquet
                                        blandit enim. Suspendisse id quam <br> sed eros luctus sit ame.</p>
                                    <div class="feature-one__content-two-btn-box">
                                        <a href="our-services.html" class="feature-one__content-two-read-more">Read
                                            More<i class="icon-right-arrow feature-one__content-two-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Feature One Single End-->
                <!--Feature One Single Start-->
                <div class="col-xl-4 col-lg-4">
                    <div class="feature-one__single">
                        <div class="feature-one__img-box">
                            <div class="feature-one__img">
                                <img src="{{URL::asset('template/front/images/resources/feature-1-3.jpg')}}" alt="">
                            </div>
                            <div class="feature-one__content">
                                <div class="feature-one__icon">
                                    <span class="icon-corporate"></span>
                                </div>
                                <h3 class="feature-one__title"><a href="our-services.html">Service &
                                        <br> departments</a></h3>
                            </div>
                            <div class="feature-one__content-two">
                                <div class="feature-one__content-two-top">
                                    <div class="feature-one__icon-2">
                                        <span class="icon-corporate"></span>
                                    </div>
                                    <h3 class="feature-one__title-2"><a href="our-services.html">Service &
                                            <br> departments</a></h3>
                                </div>
                                <div class="feature-one__content-two-bottom">
                                    <p class="feature-one__content-two-text">Aliquam viverra arcu. Donec aliquet
                                        blandit enim. Suspendisse id quam <br> sed eros luctus sit ame.</p>
                                    <div class="feature-one__content-two-btn-box">
                                        <a href="our-services.html" class="feature-one__content-two-read-more">Read
                                            More<i class="icon-right-arrow feature-one__content-two-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Feature One Single End-->
            </div>
        </div>
    </section>
    <!--Feature One End-->

    <!--Testimonial One Start-->
    <section class="testimonial-one">
        <div class="testimonial-one__bg"
            style="background-image: url(template/front/images/backgrounds/testimonial-one-bg.jpg);"></div>
        <div class="container">
            <div class="section-title text-center">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Testimoni</span>
                <h2 class="section-title__title">Testimonial {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</h2>
            </div>
            <div class="testimonial-one__bottom">
                @if(!$lihat_testimonis->isEmpty())
                    <div class="testimonial-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                        "items": 3,
                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":true,
                        "autoplay": false,
                        "nav":false,
                        "dots":false,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items":1
                            },
                            "768":{
                                "items":2
                            },
                            "992":{
                                "items": 2
                            }
                        }
                    }'>
                        @foreach($lihat_testimonis as $testimonis)
                            <div class="item">
                                <div class="testimonial-one__single">
                                    <div class="testimonial-one__single-inner">
                                        <div class="testimonial-one__shape-1">
                                            <img src="{{URL::asset('template/front/images/shapes/testimonial-one-shape-1.png')}}" alt="">
                                        </div>
                                        <div class="testimonial-one__shape-2">
                                            <img src="{{URL::asset('template/front/images/shapes/testimonial-one-shape-2.png')}}" alt="">
                                        </div>
                                        <div class="testimonial-one__quote">
                                            <span class="icon-quote"></span>
                                        </div>
                                        <p class="testimonial-one__text">{!! nl2br($testimonis->konten_testimonis) !!}</p>
                                        <div class="testimonial-one__client-info">
                                            <div class="testimonial-one__client-img-box">
                                                <div class="testimonial-one__client-img">
                                                    <img src="{{URL::asset('storage/'.$testimonis->foto_testimonis)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="testimonial-one__client-content">
                                                <h3 class="testimonial-one__client-name">{{$testimonis->nama_testimonis}}</h3>
                                                <p class="testimonial-one__client-sub-title">{{$testimonis->profesi_testimonis}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--Testimonial One End-->

    <!--Portfolio One Start-->
    <section class="portfolio-one">
        <div class="portfolio-one__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="portfolio-one__left">
                            <div class="section-title text-left">
                                <div class="section-title__icon">
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="section-title__tagline">Recent work</span>
                                <h2 class="section-title__title">Explore city beautiful
                                    <br> highlights portfolio</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="portfolio-one__right">
                            <div class="portfolio-one__text">
                                <p>Aliquam viverra arcu. Donec aliquet blandit enim feugiat. Suspendisse id quam sed
                                    eros tincidunt luctus sit amet eu nibh egestas tempus turpis, sit amet mattis
                                    magna varius non.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-one__bottom">
            <div class="container">
                <div class="portfolio-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                    "items": 3,
                    "margin": 60,
                    "smartSpeed": 700,
                    "loop":true,
                    "autoplay": true,
                    "nav":false,
                    "dots":false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        },
                        "1200":{
                            "items":3
                        }
                    }
                }'>
                    <!--Portfolio One Single Start-->
                    <div class="item">
                        <div class="portfolio-one__single">
                            <div class="portfolio-one__img-box">
                                <div class="portfolio-one__img">
                                    <img src="{{URL::asset('template/front/images/project/portfolio-1-1.jpg')}}" alt="">
                                </div>
                                <div class="portfolio-one__content">
                                    <p class="portfolio-one__sub-title">Culture</p>
                                    <h4 class="portfolio-one__title"><a href="portfolio-details.html">Town of
                                            Rome</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio One Single End-->
                    <!--Portfolio One Single Start-->
                    <div class="item">
                        <div class="portfolio-one__single mar-top">
                            <div class="portfolio-one__img-box">
                                <div class="portfolio-one__img">
                                    <img src="{{URL::asset('template/front/images/project/portfolio-1-2.jpg')}}" alt="">
                                </div>
                                <div class="portfolio-one__content">
                                    <p class="portfolio-one__sub-title">Culture</p>
                                    <h4 class="portfolio-one__title"><a href="portfolio-details.html">Town of
                                            Rome</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio One Single End-->
                    <!--Portfolio One Single Start-->
                    <div class="item">
                        <div class="portfolio-one__single">
                            <div class="portfolio-one__img-box">
                                <div class="portfolio-one__img">
                                    <img src="{{URL::asset('template/front/images/project/portfolio-1-3.jpg')}}" alt="">
                                </div>
                                <div class="portfolio-one__content">
                                    <p class="portfolio-one__sub-title">Culture</p>
                                    <h4 class="portfolio-one__title"><a href="portfolio-details.html">Town of
                                            Rome</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio One Single End-->
                    <!--Portfolio One Single Start-->
                    <div class="item">
                        <div class="portfolio-one__single mar-top">
                            <div class="portfolio-one__img-box">
                                <div class="portfolio-one__img">
                                    <img src="{{URL::asset('template/front/images/project/portfolio-1-4.jpg')}}" alt="">
                                </div>
                                <div class="portfolio-one__content">
                                    <p class="portfolio-one__sub-title">Culture</p>
                                    <h4 class="portfolio-one__title"><a href="portfolio-details.html">Town of
                                            Rome</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio One Single End-->
                    <!--Portfolio One Single Start-->
                    <div class="item">
                        <div class="portfolio-one__single">
                            <div class="portfolio-one__img-box">
                                <div class="portfolio-one__img">
                                    <img src="{{URL::asset('template/front/images/project/portfolio-1-5.jpg')}}" alt="">
                                </div>
                                <div class="portfolio-one__content">
                                    <p class="portfolio-one__sub-title">Culture</p>
                                    <h4 class="portfolio-one__title"><a href="portfolio-details.html">Town of
                                            Rome</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio One Single End-->
                </div>
            </div>
        </div>
    </section>
    <!--Portfolio One End-->

    <!--Brand One Start-->
    <section class="brand-one">
        <div class="container">
            <div class="brand-one__title">
                <p>Our partners & suppoters</p>
            </div>
            <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                "items": 3,
                "margin": 0,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "nav":false,
                "dots":false,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive":{
                    "0":{
                        "items":1
                    },
                    "768":{
                        "items":3
                    },
                    "992":{
                        "items": 5
                    }
                }
            }'>
                <!--Brand One Single-->
                <div class="brand-one__single">
                    <div class="brand-one__img">
                        <img src="{{URL::asset('template/front/images/brand/brand-1-1.png')}}" alt="">
                    </div>
                </div>
                <!--Brand One Single-->
                <div class="brand-one__single">
                    <div class="brand-one__img">
                        <img src="{{URL::asset('template/front/images/brand/brand-1-2.png')}}" alt="">
                    </div>
                </div>
                <!--Brand One Single-->
                <div class="brand-one__single">
                    <div class="brand-one__img">
                        <img src="{{URL::asset('template/front/images/brand/brand-1-3.png')}}" alt="">
                    </div>
                </div>
                <!--Brand One Single-->
                <div class="brand-one__single">
                    <div class="brand-one__img">
                        <img src="{{URL::asset('template/front/images/brand/brand-1-4.png')}}" alt="">
                    </div>
                </div>
                <!--Brand One Single-->
                <div class="brand-one__single">
                    <div class="brand-one__img">
                        <img src="{{URL::asset('template/front/images/brand/brand-1-5.png')}}" alt="">
                    </div>
                </div>
            </div>
            <!-- If we need navigation buttons -->
        </div>
    </section>
    <!--Brand One End-->

    <!--Event One Start-->
    <section class="event-one">
        <div class="event-one__shape-1">
            <img src="{{URL::asset('template/front/images/shapes/event-one-shape-1.jpg')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="event-one__left">
                        <div class="section-title text-left">
                            <div class="section-title__icon">
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="section-title__tagline">Latest events</span>
                            <h2 class="section-title__title">Upcoming city activities & <br>
                                events schedule</h2>
                        </div>
                        <ul class="event-one__points list-unstyled">
                            <li>
                                <div class="event-one__single">
                                    <div class="event-one__img-box">
                                        <div class="event-one__img">
                                            <img src="{{URL::asset('template/front/images/events/event-1-1.jpg')}}" alt="">
                                        </div>
                                        <div class="event-one__date">
                                            <p>30 <br> MAY</p>
                                        </div>
                                    </div>
                                    <div class="event-one__content">
                                        <div class="event-one__tag">
                                            <p>Celebration</p>
                                        </div>
                                        <ul class="event-one__meta list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <span class="fas fa-clock"></span>
                                                </div>
                                                <div class="text">
                                                    <p>08:00am - 05:00pm</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="fas fa-map-marker"></span>
                                                </div>
                                                <div class="text">
                                                    <p>New Hyde Park, NY 11040</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <h3 class="event-one__title"><a href="event-details.html">The city
                                                photography new
                                                contest</a></h3>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="event-one__single">
                                    <div class="event-one__img-box">
                                        <div class="event-one__img">
                                            <img src="{{URL::asset('template/front/images/events/event-1-2.jpg')}}" alt="">
                                        </div>
                                        <div class="event-one__date">
                                            <p>30 <br> MAY</p>
                                        </div>
                                    </div>
                                    <div class="event-one__content">
                                        <div class="event-one__tag">
                                            <p>Celebration</p>
                                        </div>
                                        <ul class="event-one__meta list-unstyled">
                                            <li>
                                                <div class="icon">
                                                    <span class="fas fa-clock"></span>
                                                </div>
                                                <div class="text">
                                                    <p>08:00am - 05:00pm</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="fas fa-map-marker"></span>
                                                </div>
                                                <div class="text">
                                                    <p>New Hyde Park, NY 11040</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <h3 class="event-one__title"><a href="event-details.html">Activities &
                                                events schedule</a></h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="event-one__right">
                        <div class="event-one__subscribe-top">
                            <div class="event-one__subscribe-top-bg"
                                style="background-image: url(template/front/images/backgrounds/event-one-subscribe-top-bg.jpg);">
                            </div>
                            <div class="event-one__subscribe-icon">
                                <span class="icon-newsletter"></span>
                            </div>
                            <p class="event-one__subscribe-text">Subscribe to
                                <br> our newslette for
                                <br> daily updates</p>
                            <p class="event-one__subscribe-text-2">Get latest news & events details</p>
                        </div>
                        <div class="event-one__subscribe-bottom">
                            <div class="event-one__subscribe-bottom-bg"
                                style="background-image: url(template/front/images/backgrounds/event-one-subscribe-bottom-bg.png);">
                            </div>
                            <form class="event-one__email-box">
                                <div class="event-one__email-input-box">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                                <button type="submit" class="event-one__subscribe-btn thm-btn">Subscribe</button>
                            </form>
                            <p class="event-one__subscribe-text-3">Never share your email with others.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Event One End-->

    <!--News One Start-->
    <section class="news-one">
        <div class="container">
            <div class="section-title text-center">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Swara Nusvantara</span>
                <h2 class="section-title__title">Swara Nusvantara Terbaru</h2>
            </div>
            <div class="row">
                @foreach($lihat_swara_nusvantaras as $swara_nusvantaras)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="news-one__single">
                            <div class="news-one__img-box">
                                <div class="news-one__img">
                                    <img src="{{URL::asset('storage/'.$swara_nusvantaras->gambar_swara_nusvantaras)}}" alt="">
                                </div>
                                <div class="news-one__date">
                                    @php($tanggal_publikasi_swara_nusvantaras = $swara_nusvantaras->tanggal_publikasi_swara_nusvantaras)
                                    @php($pecah_tanggal_publikasi_swara_nusvantaras = explode(' ',$tanggal_publikasi_swara_nusvantaras))
                                    <p>
                                        {{General::ubahDBKeTanggal($pecah_tanggal_publikasi_swara_nusvantaras[0])}}
                                        <br/>
                                        {{$pecah_tanggal_publikasi_swara_nusvantaras[1]}}
                                    </p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <div class="news-one__user-and-meta">
                                    <div class="news-one__user">
                                        <div class="icon">
                                            <span class="fas fa-tags"></span>
                                        </div>
                                        <div class="news-one__user-text">
                                            <p>{{$swara_nusvantaras->nama_kategori_swara_nusvantaras}}</p>
                                        </div>
                                    </div>
                                    <div class="news-one__meta">
                                        <div class="icon">
                                            <span class="fas fa-comments"></span>
                                        </div>
                                        <div class="text">
                                            <p>{{$swara_nusvantaras->total_komentar_swara_nusvantaras}} Komentar</p>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="news-one__title">{{$swara_nusvantaras->judul_swara_nusvantaras}}</h3>
                                <p>{!! General::potongText($swara_nusvantaras->konten_swara_nusvantaras,120) !!}</p>
                                <div class="news-one__btn">
                                    <a href="{{URL('/swara-nusvantara/'.$swara_nusvantaras->slug_kategori_swara_nusvantaras.'/'.$swara_nusvantaras->slug_swara_nusvantaras)}}">Baca Selengkapnya<i class="icon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--News One End-->

@endsection