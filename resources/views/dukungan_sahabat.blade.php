@extends('layouts.app')
@section('content')

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(storage/{{$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis}})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Dukungan Sahabat</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="contact-page__top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                            <div class="contact-page__img-box">
                                <div class="contact-page__img">
                                    <img src="{{'storage/'.$lihat_kontak_kamis->gambar_kontak_kamis}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__right">
                            <div class="section-title text-left">
                                <div class="section-title__icon">
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="section-title__tagline">{{$lihat_kontak_kamis->text1_kontak_kamis}}</span>
                                <h2 class="section-title__title">{{$lihat_kontak_kamis->text2_kontak_kamis}}</h2>
                            </div>
                            <p class="contact-page__text">
                                {!! $lihat_kontak_kamis->konten_kontak_kamis !!}
                            </p>
                            <ul class="list-unstyled contact-page__contact-list">
                                @if(!empty($lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis))
                                    <li>
                                        <div class="icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="content">
                                            <p>Anda memiliki pertanyaan?</p>
                                            <h4><a href="tel:{{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}"><span>Bebas</span> {{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}</a></h4>
                                        </div>
                                    </li>
                                @endif
                                <li>
                                    <div class="icon">
                                        <span class="icon-email"></span>
                                    </div>
                                    <div class="content">
                                        <p>Tulis Email</p>
                                        <h4><a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}</a></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-page__bottom">
                <div class="contact-page__bottom-left">
                    <h4>Form Dukungan Sahabat</h4>
                </div>
                <div class="contact-page__bottom-right">
                    <div class="contact-page__social">
                        <div class="contact-page__social-shape-1 float-bob-x">
                            <img src="template/front/images/shapes/contact-page-shape-1.png" alt="">
                        </div>
                        <span>Sosial Media</span>
                        @foreach($lihat_sosial_medias as $sosial_medias)
                            <a href="{{$sosial_medias->url_sosial_medias}}"><i class="fab fa-{{$sosial_medias->icon_sosial_medias}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->

    <!--Contact One Start-->
    <section class="contact-one">
        <div class="contact-one__bg" style="background-image: url(template/front/images/backgrounds/contact-one-bg.png);">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Dukungan Sahabat</span>
                <h2 class="section-title__title"></h2>
            </div>
            <div class="contact-one__form-box">
                <form action="template/front/inc/sendemail.php" class="contact-one__form contact-form-validated"
                    novalidate="novalidate">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Your Name" name="name">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-one__input-box">
                                <input type="email" placeholder="Email Address" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__input-box text-message-box">
                                <textarea name="message" placeholder="Write Comment"></textarea>
                            </div>
                            <div class="contact-one__btn-box">
                                <button type="submit" class="thm-btn contact-one__btn">Kirim Dukungan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="result"></div>
            </div>
        </div>
    </section>
    <!--Contact One End-->

@endsection