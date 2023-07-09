<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" />
    <link rel="manifest" href="{{URL::asset('template/front/images/favicons/site.webmanifest')}}" />
    <meta name="description" content="{{$lihat_konfigurasi_aplikasis->deskripsi_konfigurasi_aplikasis}}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/animate/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/odometer/odometer.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/govity-icons/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/tiny-slider/tiny-slider.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/reey-font/stylesheet.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/owl-carousel/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/vegas/vegas.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/timepicker/timePicker.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/vendors/nice-select/nice-select.css')}}" />

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lobster&display=swap" rel="stylesheet">

    <!-- template styles -->
    <link rel="stylesheet" href="{{URL::asset('template/front/css/govity.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('template/front/css/govity-responsive.css')}}" />
    <style>
        .jam{
            color: #000 !important;
        }
    </style>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <header class="main-header">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="main-menu__wrapper-inner">
                        <div class="main-menu__logo">
                            <a href="{{URL('/')}}"><img src="{{URL::asset('storage/logo/logopublic.png')}}" alt=""></a>
                        </div>
                        <div class="main-menu__top">
                            <div class="main-menu__top-inner">
                                <div class="main-menu__top-left">
                                    <div class="main-menu__social">
                                        @foreach($lihat_sosial_medias as $sosial_medias)
                                            <a href="{{$sosial_medias->url_sosial_medias}}" target="_blank"><i class="fab fa-{{$sosial_medias->icon_sosial_medias}}"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="main-menu__top-right">
                                    <ul class="list-unstyled main-menu__contact-list">
                                        <li>
                                            <div class="icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="text">
                                                <p><a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled main-menu__top-menu">
                                        <li><b class="jam">{{General::ubahDBKeTanggal($tanggal_sekarang)}}, <onload="timeJavascript()" id="output"></b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu__bottom">
                            <div class="main-menu__bottom-inner">
                                <div class="main-menu__main-menu-box">
                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                    <ul class="main-menu__list">
                                        <li class="dropdown megamenu">
                                            <a href="{{URL('/')}}">Beranda </a>
                                        </li>
                                        <li>
                                            <a href="{{URL('sosok')}}">Sosok</a>
                                        </li>
                                        <li>
                                            <a href="{{URL('swara-nusvantara')}}">Swara Nusvantara</a>
                                        </li>
                                        <li>
                                            <a href="{{URL('laporan-sahabat')}}">Laporan Sahabat</a>
                                        </li>
                                        <li>
                                            <a href="{{URL('dukungan-sahabat')}}">Dukungan Sahabat</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-menu__right">
                                    <div class="main-menu__search-box">
                                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                    </div>
                                    <div class="main-menu__btn-box">
                                        <a href="contact.html" class="thm-btn main-menu__btn">Report Issue</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!-- Main Sllider Start -->
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
                                <div class="section-title__icon"></div>
                                <span class="section-title__tagline">{{$lihat_profils->text1_profils}}</span>
                                <h2 class="section-title__title">{{$lihat_profils->text2_profils}}</h2>
                            </div>
                            {{$lihat_profils->konten_profils}}
                            <div class="about-one__btn-box-and-signature">
                                <a href="about.html" class="about-one__btn thm-btn">Lihat Selengkapnya</a>
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

        <!--Services One Start-->
        <section class="services-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="services-one__left">
                            <div class="services-one__shape-2 img-bounce">
                                <img src="{{URL::asset('template/front/images/shapes/services-one-shape-2.png')}}" alt="">
                            </div>
                            <div class="services-one__img-box">
                                <div class="services-one__img">
                                    <img src="{{URL::asset('template/front/images/resources/services-one-img-1.png')}}" alt="">
                                    <div class="services-one__img-shadow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="services-one__right">
                            <div class="services-one__shape-1 float-bob-x">
                                <img src="{{URL::asset('template/front/images/shapes/services-one-shape-1.png')}}" alt="">
                            </div>
                            <div class="services-one__shape-3 float-bob-x">
                                <img src="{{URL::asset('template/front/images/shapes/services-one-shape-3.png')}}" alt="">
                            </div>
                            <div class="services-one__points-title-box">
                                <p>Explore online services & resource</p>
                            </div>
                            <div class="services-one__points-box">
                                <ul class="services-one__points-list list-unstyled">
                                    <li>
                                        <a href="parking-permission.html">Parking Permission<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="tax-return.html">File a Tax Return<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="birth-certificate.html">Order Birth Certificate<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="building-permission.html">Get Building Permission<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="driving-license.html">Apply for Driving License<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="report-polution.html">Report Polution<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                </ul>
                                <ul class="services-one__points-list list-unstyled">
                                    <li>
                                        <a href="report-polution.html">Public Service Identity<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="birth-certificate.html">Apply for a City Job<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="driving-license.html">Professional Licenses<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="building-permission.html">National Planning Framework<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="driving-license.html">Apply for Business License<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                    <li>
                                        <a href="parking-permission.html">Online Court Services<span
                                                class="fa fa-angle-right"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services One End-->

        <!--Video One Start-->
        <section class="video-one">
            <div class="video-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(template/front/images/backgrounds/video-one-bg.jpg);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video-one__inner">
                            <div class="video-one__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="video-one__video-icon">
                                        <span class="fa fa-play"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div>
                            <h2 class="video-one__video-title">We help you solve your
                                <br> city government problems</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Video One End-->

        <!--Documents One Start-->
        <section class="documents-one">
            <div class="container">
                <div class="documents-one__inner">
                    <div class="documents-one__left">
                        <p>Recent <br> documents</p>
                    </div>
                    <div class="documents-one__right">
                        <ul class="documents-one__points list-unstyled">
                            <li>
                                <div class="documents-one__single">
                                    <div class="documents-one__content">
                                        <div class="documents-one__icon">
                                            <span class="icon-download-circular-button"></span>
                                        </div>
                                        <h3 class="documents-one__title"><a href="about.html">Vehicle Parking
                                                License</a></h3>
                                        <p class="documents-one__text">Download the license details file</p>
                                    </div>
                                    <div class="documents-one__icon-two">
                                        <span class="icon-pdf-file"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="documents-one__single">
                                    <div class="documents-one__content">
                                        <div class="documents-one__icon">
                                            <span class="icon-download-circular-button"></span>
                                        </div>
                                        <h3 class="documents-one__title"><a href="about.html">City Board
                                                Applications</a></h3>
                                        <p class="documents-one__text">Download the license details file</p>
                                    </div>
                                    <div class="documents-one__icon-two">
                                        <span class="icon-pdf-file"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Documents One End-->

        <!--Counter One Start-->
        <section class="counter-one">
            <div class="counter-one__bg" style="background-image: url(template/front/images/backgrounds/counter-one-bg.jpg);">
            </div>
            <div class="container">
                <div class="counter-one__inner">
                    <ul class="counter-one__list list-unstyled">
                        <li>
                            <div class="counter-one__count">
                                <h3 class="odometer" data-count="82">00</h3>
                                <span class="">k</span>
                            </div>
                            <p class="counter-one__text">Total people lived
                                <br> in our city</p>
                        </li>
                        <li>
                            <div class="counter-one__count">
                                <h3 class="odometer" data-count="4">00</h3>
                                <span class="">th</span>
                            </div>
                            <p class="counter-one__text">Average home costs
                                <br> of ownership</p>
                        </li>
                        <li>
                            <div class="counter-one__count">
                                <h3 class="odometer" data-count="26">00</h3>
                                <span class="">%</span>
                            </div>
                            <p class="counter-one__text">Private & domestic
                                <br> garden land</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Counter One End-->

        <!--Team One Start-->
        <section class="team-one">
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__icon">
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="section-title__tagline">our team members</span>
                    <h2 class="section-title__title">Meet great city council
                        <br> members</h2>
                </div>
                <div class="team-one__inner">
                    <div class="row">
                        <!--Team One Single Start-->
                        <div class="col-xl-4 col-lg-4">
                            <div class="team-one__single">
                                <div class="team-one__shape-1">
                                    <img src="{{URL::asset('template/front/images/shapes/team-one-shape-1.png')}}" alt="">
                                </div>
                                <div class="team-one__img-box">
                                    <div class="team-one__img">
                                        <img src="{{URL::asset('template/front/images/team/team-1-1.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="team-one__content">
                                    <h3 class="team-one__name"><a href="team-details.html">Michale smith</a></h3>
                                    <p class="team-one__sub-title">Mayor</p>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Team One Single End-->
                        <!--Team One Single Start-->
                        <div class="col-xl-4 col-lg-4">
                            <div class="team-one__single">
                                <div class="team-one__shape-2">
                                    <img src="{{URL::asset('template/front/images/shapes/team-one-shape-2.png')}}" alt="">
                                </div>
                                <div class="team-one__img-box">
                                    <div class="team-one__img">
                                        <img src="{{URL::asset('template/front/images/team/team-1-2.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="team-one__content">
                                    <h3 class="team-one__name"><a href="team-details.html">Jessica brown</a></h3>
                                    <p class="team-one__sub-title">Mayor</p>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Team One Single End-->
                        <!--Team One Single Start-->
                        <div class="col-xl-4 col-lg-4">
                            <div class="team-one__single">
                                <div class="team-one__shape-3">
                                    <img src="{{URL::asset('template/front/images/shapes/team-one-shape-3.png')}}" alt="">
                                </div>
                                <div class="team-one__img-box">
                                    <div class="team-one__img">
                                        <img src="{{URL::asset('template/front/images/team/team-1-3.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="team-one__content">
                                    <h3 class="team-one__name"><a href="team-details.html">Harold cooper</a></h3>
                                    <p class="team-one__sub-title">City Developer</p>
                                    <div class="team-one__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Team One Single End-->
                    </div>
                </div>
            </div>
        </section>
        <!--Team One End-->

        <!--Testimonial One Start-->
        <section class="testimonial-one">
            <div class="testimonial-one__bg"
                style="background-image: url(template/front/images/backgrounds/testimonial-one-bg.jpg);"></div>
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__icon">
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="section-title__tagline">Our testimonials</span>
                    <h2 class="section-title__title">People are appreciating
                        <br> our city & work?</h2>
                </div>
                <div class="testimonial-one__bottom">
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
                        <!--Testimonial One Single Start-->
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
                                    <p class="testimonial-one__text">Leverage agile frameworks to provide a robust
                                        synopsis
                                        for
                                        high level overviews. Iterative approaches to corporate strategy data foster to
                                        collaborative thinking.</p>
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img-box">
                                            <div class="testimonial-one__client-img">
                                                <img src="{{URL::asset('template/front/images/testimonial/testimonial-1-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-one__client-content">
                                            <div class="testimonial-one__client-rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <h3 class="testimonial-one__client-name">Donald hardson</h3>
                                            <p class="testimonial-one__client-sub-title">CEO - CO Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial One Single End-->
                        <!--Testimonial One Single Start-->
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
                                    <p class="testimonial-one__text">Leverage agile frameworks to provide a robust
                                        synopsis
                                        for
                                        high level overviews. Iterative approaches to corporate strategy data foster to
                                        collaborative thinking.</p>
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img-box">
                                            <div class="testimonial-one__client-img">
                                                <img src="{{URL::asset('template/front/images/testimonial/testimonial-1-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-one__client-content">
                                            <div class="testimonial-one__client-rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <h3 class="testimonial-one__client-name">Aleesha brown</h3>
                                            <p class="testimonial-one__client-sub-title">CEO - CO Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial One Single End-->
                        <!--Testimonial One Single Start-->
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
                                    <p class="testimonial-one__text">Leverage agile frameworks to provide a robust
                                        synopsis
                                        for
                                        high level overviews. Iterative approaches to corporate strategy data foster to
                                        collaborative thinking.</p>
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img-box">
                                            <div class="testimonial-one__client-img">
                                                <img src="{{URL::asset('template/front/images/testimonial/testimonial-1-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-one__client-content">
                                            <div class="testimonial-one__client-rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <h3 class="testimonial-one__client-name">Aleesha martin</h3>
                                            <p class="testimonial-one__client-sub-title">CEO - CO Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial One Single End-->
                        <!--Testimonial One Single Start-->
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
                                    <p class="testimonial-one__text">Leverage agile frameworks to provide a robust
                                        synopsis
                                        for
                                        high level overviews. Iterative approaches to corporate strategy data foster to
                                        collaborative thinking.</p>
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__client-img-box">
                                            <div class="testimonial-one__client-img">
                                                <img src="{{URL::asset('template/front/images/testimonial/testimonial-1-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-one__client-content">
                                            <div class="testimonial-one__client-rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <h3 class="testimonial-one__client-name">David coper</h3>
                                            <p class="testimonial-one__client-sub-title">CEO - CO Founder</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial One Single End-->
                    </div>
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
                    <span class="section-title__tagline">Latest News</span>
                    <h2 class="section-title__title">Latest news & articles
                        <br> from the blog</h2>
                </div>
                <div class="row">
                    <!--News One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="news-one__single">
                            <div class="news-one__img-box">
                                <div class="news-one__img">
                                    <img src="{{URL::asset('template/front/images/blog/news-1-1.jpg')}}" alt="">
                                </div>
                                <div class="news-one__date">
                                    <p>30 <br> JAN</p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <div class="news-one__user-and-meta">
                                    <div class="news-one__user">
                                        <div class="news-one__user-img">
                                            <img src="{{URL::asset('template/front/images/blog/news-one-user-img.jpg')}}" alt="">
                                        </div>
                                        <div class="news-one__user-text">
                                            <p>by <br>Admin</p>
                                        </div>
                                    </div>
                                    <div class="news-one__meta">
                                        <div class="icon">
                                            <span class="fas fa-comments"></span>
                                        </div>
                                        <div class="text">
                                            <p>2 Comments</p>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="news-one__title"><a href="news-details.html">Supporting local business to
                                        bounce back</a>
                                </h3>
                                <div class="news-one__btn">
                                    <a href="news-details.html">Read More<i class="icon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                    <!--News One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="news-one__single">
                            <div class="news-one__img-box">
                                <div class="news-one__img">
                                    <img src="{{URL::asset('template/front/images/blog/news-1-2.jpg')}}" alt="">
                                </div>
                                <div class="news-one__date">
                                    <p>30 <br> JAN</p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <div class="news-one__user-and-meta">
                                    <div class="news-one__user">
                                        <div class="news-one__user-img">
                                            <img src="{{URL::asset('template/front/images/blog/news-one-user-img.jpg')}}" alt="">
                                        </div>
                                        <div class="news-one__user-text">
                                            <p>by <br>Admin</p>
                                        </div>
                                    </div>
                                    <div class="news-one__meta">
                                        <div class="icon">
                                            <span class="fas fa-comments"></span>
                                        </div>
                                        <div class="text">
                                            <p>2 Comments</p>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="news-one__title"><a href="news-details.html">The city photography new
                                        contest</a>
                                </h3>
                                <div class="news-one__btn">
                                    <a href="news-details.html">Read More<i class="icon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                    <!--News One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="news-one__single">
                            <div class="news-one__img-box">
                                <div class="news-one__img">
                                    <img src="{{URL::asset('template/front/images/blog/news-1-3.jpg')}}" alt="">
                                </div>
                                <div class="news-one__date">
                                    <p>30 <br> JAN</p>
                                </div>
                            </div>
                            <div class="news-one__content">
                                <div class="news-one__user-and-meta">
                                    <div class="news-one__user">
                                        <div class="news-one__user-img">
                                            <img src="{{URL::asset('template/front/images/blog/news-one-user-img.jpg')}}" alt="">
                                        </div>
                                        <div class="news-one__user-text">
                                            <p>by <br>Admin</p>
                                        </div>
                                    </div>
                                    <div class="news-one__meta">
                                        <div class="icon">
                                            <span class="fas fa-comments"></span>
                                        </div>
                                        <div class="text">
                                            <p>2 Comments</p>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="news-one__title"><a href="news-details.html">Leverage agile frameworks to
                                        provide</a>
                                </h3>
                                <div class="news-one__btn">
                                    <a href="news-details.html">Read More<i class="icon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--News One Single End-->
                </div>
            </div>
        </section>
        <!--News One End-->

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer__img">
                <img src="{{URL::asset('template/front/images/resources/site-footer-img.jpg')}}" alt="">
            </div>
            <div class="container">
                <div class="site-footer__top">
                    <div class="footer-widget__logo">
                        <a href="index.html"><img src="{{URL::asset('template/front/images/resources/footer-logo.png')}}" alt=""></a>
                    </div>
                    <div class="footer-widget__subscribe-box">
                        <div class="footer-widget__subscribe-text">
                            <p>Subscribe to Newsletter</p>
                        </div>
                        <form class="footer-widget__email-box mc-form" data-url="#">
                            <div class="footer-widget__email-input-box">
                                <input type="email" placeholder="Email Address" name="EMAIL">
                            </div>
                            <button type="submit" class="footer-widget__subscribe-btn thm-btn">Subscribe</button>
                        </form>
                        <div class="mc-form__response"></div><!-- /.mc-form__response -->
                    </div>
                </div>
                <div class="site-footer__middle">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__Contact">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Contact</h3>
                                </div>
                                <p class="footer-widget__Contact-text">80 Road Broklyn Street, 600 <br> New York, USA
                                </p>
                                <ul class="footer-widget__Contact-list list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-email"></span>
                                        </div>
                                        <div class="text">
                                            <p><a href="mailto:needhelp@company.com">needhelp@company.com</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="fas fa-phone-square"></span>
                                        </div>
                                        <div class="text">
                                            <p><a href="tel:+926668880000">+92 666 888 0000</a></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="site-footer__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__link">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Links</h3>
                                </div>
                                <ul class="footer-widget__link-list list-unstyled">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="events.html">Upcoming Events</a></li>
                                    <li><a href="news.html">Latest News</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__column footer-widget__departments">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Departments</h3>
                                </div>
                                <ul class="footer-widget__link-list list-unstyled">
                                    <li><a href="about.html">Health & Safety</a></li>
                                    <li><a href="about.html">Housing & Land</a></li>
                                    <li><a href="about.html">Legal & Finance</a></li>
                                    <li><a href="about.html">Transport & Traffic</a></li>
                                    <li><a href="about.html">Arts & Culture</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__explore">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Explore</h3>
                                </div>
                                <ul class="footer-widget__link-list list-unstyled">
                                    <li><a href="about.html">Administration</a></li>
                                    <li><a href="about.html">Fire Services</a></li>
                                    <li><a href="tax-return.html">Business & Taxation</a></li>
                                    <li><a href="about.html">Circular’s And Go’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                            <div class="footer-widget__column footer-widget__gallery">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Gallery</h3>
                                </div>
                                <ul class="footer-widget__gallery-list list-unstyled clearfix">
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-1.jpg')}}" alt="">
                                            <a href="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-1.jpg')}}"
                                                class="img-popup"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-2.jpg')}}" alt="">
                                            <a href="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-2.jpg')}}"
                                                class="img-popup"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-3.jpg')}}" alt="">
                                            <a href="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-3.jpg')}}"
                                                class="img-popup"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-4.jpg')}}" alt="">
                                            <a href="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-4.jpg')}}"
                                                class="img-popup"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-5.jpg')}}" alt="">
                                            <a href="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-5.jpg')}}"
                                                class="img-popup"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-widget__gallery-img">
                                            <img src="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-6.jpg')}}" alt="">
                                            <a href="{{URL::asset('template/front/images/gallery/footer-widget-gallery-img-6.jpg')}}"
                                                class="img-popup"><span class="fab fa-instagram"></span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <p class="site-footer__bottom-text">© Copyright 2023 by <a href="#">Govity Template</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{URL::asset('template/front/images/resources/logo-1.png')}}" width="94"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@govity.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>


    <script src="{{URL::asset('template/front/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jarallax/jarallax.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/odometer/odometer.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/swiper/swiper.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/wnumb/wNumb.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/wow/wow.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/isotope/isotope.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/countdown/countdown.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/vegas/vegas.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/timepicker/timePicker.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/circleType/jquery.circleType.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/circleType/jquery.lettering.min.js')}}"></script>
    <script src="{{URL::asset('template/front/vendors/nice-select/jquery.nice-select.min.js')}}"></script>


    <!-- template js -->
    <script src="{{URL::asset('template/front/js/govity.js')}}"></script>

    <script type="text/javascript">
        window.setTimeout("timeJavascript()",1000);
        function timeJavascript()
        {     
            var dateNow = new Date().toLocaleTimeString("en-US",{timeZone: "Asia/Jakarta", hour12: false});
            setTimeout("timeJavascript()",1000);
            document.getElementById("output").innerHTML = dateNow;
        }
    </script>
</body>

</html>