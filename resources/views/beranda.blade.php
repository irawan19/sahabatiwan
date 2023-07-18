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
                    </div>
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
                                    <h3 class="department-one__title">
                                        <a href="{{URL('/')}}">Beranda</a>
                                        <br/>
                                        <br/>
                                    </h3>
                                    <div class="department-one__icon">
                                        <span class="icon-parthenon"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title">
                                        <a href="{{URL('sosok')}}">Sosok</a>
                                        <br/>
                                        <br/>
                                    </h3>
                                    <div class="department-one__icon">
                                        <span class="icon-career-choice"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title">
                                        <a href="{{URL('swara-nusvantara')}}">Swara Nusvantara</a>
                                    </h3>
                                    <div class="department-one__icon">
                                        <span class="icon-newsletter"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="{{URL('laporan-sahabat')}}">Laporan Sahabat</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-police-badge"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="department-one__single">
                                <div class="department-one__content">
                                    <h3 class="department-one__title"><a href="{{URL('dukungan-sahabat')}}">Dukungan Sahabat</a></h3>
                                    <div class="department-one__icon">
                                        <span class="icon-goals"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="about-one__shape-1 float-bob-x">
                            <img src="{{URL::asset('template/front/images/shapes/about-one-shape-1.png')}}" alt="">
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

    <section class="feature-one">
        <div class="container">
            <div class="row">
                @foreach($lihat_programs as $programs)
                    <div class="col-xl-4 col-lg-4">
                        <div class="feature-one__single">
                            <div class="feature-one__img-box">
                                <div class="feature-one__img">
                                    <img src="{{URL::asset('storage/'.$programs->gambar_programs)}}" alt="">
                                </div>
                                <div class="feature-one__content">
                                    <div class="feature-one__icon">
                                        <img src="{{URL::asset('storage/'.$programs->icon_programs)}}" width="64px" alt="">
                                    </div>
                                    <h3 class="feature-one__title"><a href="#">{{$programs->nama_programs}}</a></h3>
                                </div>
                                <div class="feature-one__content-two">
                                    <div class="feature-one__content-two-top">
                                        <div class="feature-one__icon-2">
                                            <img src="{{URL::asset('storage/'.$programs->icon_programs)}}" style="filter: brightness(0) invert(1);" width="64px" alt="">
                                        </div>
                                        <h3 class="feature-one__title-2"><a href="#">{{$programs->nama_programs}}</a></h3>
                                    </div>
                                    <div class="feature-one__content-two-bottom">
                                        <p class="feature-one__content-two-text" style="font-size:12px !important;">{!! $programs->konten_programs !!}</p>
                                        <div class="feature-one__content-two-btn-box"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                                                    <img src="{{URL::asset('storage/'.$testimonis->foto_testimonis)}}" width="100px" alt="Testimoni {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
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

    <section class="brand-one">
        <div class="container">
            <div class="section-title text-center">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Galeri</span>
            </div>
            <div class="brand-one__title">
                <p>Foto Galeri</p>
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
                @foreach($lihat_galeris as $galeris)
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <a data-caption="{{$galeris->judul_galeris}}" data-fancybox="{{$galeris->judul_galeris}}" href="{{URL::asset('storage/'.$galeris->foto_galeris)}}">
                                <img src="{{URL::asset('storage/'.$galeris->foto_galeris)}}" alt="{{$galeris->judul_galeris}}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                            <span class="section-title__tagline">Swara Nusvantara</span>
                            <h2 class="section-title__title">Terpopuler</h2>
                        </div>
                        <ul class="event-one__points list-unstyled">
                            @foreach($lihat_swara_nusvantara_populers as $swara_nusvantara_populers)
                                <li>
                                    <a href="{{URL('swara-nusvantara/detail/'.$swara_nusvantara_populers->slug_kategori_swara_nusvantaras.'/'.$swara_nusvantara_populers->slug_swara_nusvantaras)}}">
                                        <div class="event-one__single">
                                            <div class="event-one__img-box">
                                                <div class="event-one__img">
                                                    <img src="{{URL::asset('storage/'.$swara_nusvantara_populers->gambar_swara_nusvantaras)}}" width="166px" height="166px" alt="">
                                                </div>
                                                <div class="event-one__date">
                                                    @php($tanggal_publikasi_swara_nusvantara_populers = $swara_nusvantara_populers->tanggal_publikasi_swara_nusvantaras)
                                                    @php($pecah_tanggal_publikasi_swara_nusvantara_populers = explode(' ',$tanggal_publikasi_swara_nusvantara_populers))
                                                    <p>
                                                        {{General::ubahDBKeTanggal($pecah_tanggal_publikasi_swara_nusvantara_populers[0])}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="event-one__content">
                                                <div class="event-one__tag">
                                                    <p>{{$swara_nusvantara_populers->nama_kategori_swara_nusvantaras}}</p>
                                                </div>
                                                <ul class="event-one__meta list-unstyled">
                                                    <li>
                                                        <div class="icon">
                                                            <span class="fas fa-clock"></span>
                                                        </div>
                                                        <div class="text">
                                                            <p>{{$pecah_tanggal_publikasi_swara_nusvantara_populers[1]}}</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <span class="fas fa-comments"></span>
                                                        </div>
                                                        <div class="text">
                                                            <p>{{$swara_nusvantara_populers->total_komentar_swara_nusvantaras}}</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <h3 class="event-one__title"><a href="{{URL('swara-nusvantara/detail/'.$swara_nusvantara_populers->slug_kategori_swara_nusvantaras.'/'.$swara_nusvantara_populers->slug_swara_nusvantaras)}}">{{$swara_nusvantara_populers->judul_swara_nusvantaras}}</a></h3>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="event-one__right">
                        <div class="event-one__subscribe-top">
                            <div class="event-one__subscribe-top-bg"
                                style="background-image: url({{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->gambar_subscribe_konfigurasi_aplikasis)}});">
                            </div>
                            <div class="event-one__subscribe-icon">
                                <span class="icon-newsletter"></span>
                            </div>
                            <p class="event-one__subscribe-text">Berlangganan
                                <br> Swara Nusvantara
                            <p class="event-one__subscribe-text-2">Dapatkan pembaruan</p>
                        </div>
                        <div class="event-one__subscribe-bottom">
                            <div class="event-one__subscribe-bottom-bg"
                                style="background-image: url(template/front/images/backgrounds/event-one-subscribe-bottom-bg.png);">
                            </div>
                            <form class="event-one__email-box formlanggananberanda" method="POST" action="{{URL('subscribe')}}">
                                {{ csrf_field() }}
                                <div class="event-one__email-input-box">
                                    <input type="email" id="email_subscribesberanda" placeholder="Masukkan email anda..."  name="email_subscribesberanda">
                                </div>
                                <button type="button" class="event-one__subscribe-btn thm-btn btnemailsubcribeberanda">Berlangganan</button>
                            </form>
                            <div class="mc-form__response">
                                <p class="errorform erroremailsubscribeberanda" style="display:none">email harus diisi.</p>
                                <p class="successemailsubscribeberanda" style="display:none">Email anda berhasil terdaftar untuk langganan swara nusvatara.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="portfolio-one">
        <div class="portfolio-one__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="portfolio-one__left">
                            <div class="fb-page" data-href="https://www.facebook.com/profile.php?id=100094352257691" data-tabs="timeline" data-width="500" data-height="741" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/profile.php?id=100094352257691" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/profile.php?id=100094352257691">Sahabat Iwan</a></blockquote></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="portfolio-one__right">
                            <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/reel/Cu1xtFKrEoa/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/Cu1xtFKrEoa/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/Cu1xtFKrEoa/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Iwan Nurdin (@sahabatiwan5)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="portfolio-one__right">
                            <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@sahabatiwan/video/7253462546018012417" data-video-id="7253462546018012417" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@sahabatiwan" href="https://www.tiktok.com/@sahabatiwan?refer=embed">@sahabatiwan</a> <p>Pasal 33</p> <a target="_blank" title="♬ original sound  - sahabatiwan" href="https://www.tiktok.com/music/original-sound-sahabatiwan-7253462932632177409?refer=embed">♬ original sound  - sahabatiwan</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('.btnemailsubcribeberanda').on('click', function() {
                emailsubscribeberanda = $('#email_subscribesberanda').val();
                if(emailsubscribeberanda == '') {
                    $('.erroremailsubscribeberanda').css('display','block');
                } else {
                    $('.erroremailsubscribeberanda').css('display','none');
                    var headerRequest = {
                                'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                                };
                    $.ajax({
                                url: '{{URL("subscribe")}}',
                                type: "POST",
                                dataType: 'JSON',
                                headers: headerRequest,
                                data: {email_subscribes: emailsubscribeberanda},
                                success: function(data)
                                {
                                    emailsubscribeberanda = $('#email_subscribesberanda').val('');
                                    $('.successemailsubscribeberanda').css('display','block');
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                        });
                }
            });
        });
    </script>

@endsection