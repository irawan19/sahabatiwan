@extends('mobile.layouts.app')
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
                            <div class="about-one__video-link" style="top:-55px !important">
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
                    </div>
                </div>
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
                <span class="section-title__tagline">Apa Kata Mereka</span>
                <h2 class="section-title__title">Apa Kata Mereka {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</h2>
            </div>
            <div class="testimonial-one__bottom">
                @if(!$lihat_apa_kata_merekas->isEmpty())
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
                        @foreach($lihat_apa_kata_merekas as $apa_kata_merekas)
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
                                        <p class="testimonial-one__text">{!! nl2br($apa_kata_merekas->konten_apa_kata_merekas) !!}</p>
                                        <div class="testimonial-one__client-info">
                                            <div class="testimonial-one__client-img-box">
                                                <div class="testimonial-one__client-img">
                                                    <div style=
                                                        "background-color: #cccccc;
                                                        background-image: url({{URL::asset("storage/".$apa_kata_merekas->foto_apa_kata_merekas)}});
                                                        background-position: center;
                                                        background-repeat: no-repeat;
                                                        border-radius: 50%;
                                                        background-size: cover;
                                                        width: 140px;
                                                        height: 140px;
                                                        ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial-one__client-content">
                                                <h3 class="testimonial-one__client-name">{{$apa_kata_merekas->nama_apa_kata_merekas}}</h3>
                                                <p class="testimonial-one__client-sub-title">{{$apa_kata_merekas->profesi_apa_kata_merekas}}</p>
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
                                    <a href="{{URL('/mobile/swara-nusvantara/detail/'.$swara_nusvantaras->slug_kategori_swara_nusvantaras.'/'.$swara_nusvantaras->slug_swara_nusvantaras)}}">Baca Selengkapnya<i class="icon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection