@php($lihat_profils = \App\Models\Master_profil::first())
<footer class="site-footer">
    <div class="site-footer__img">
        <img src="{{URL::asset('template/front/images/resources/site-footer-img.jpg')}}" alt="{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="footer-widget__logo">
                <a href="{{URL('/mobile')}}">
                    <img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}" alt="Logo {{$lihat_konfigurasi_aplikasis->nama_logo_konfigurasi_aplikasis}}">
                </a>
            </div>
        </div>
        <div class="site-footer__middle">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__Contact">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">{{$lihat_profils->nama_profils}}</h3>
                        </div>
                        <p class="footer-widget__Contact-text">{{$lihat_profils->keterangan_nama_profils}}</p>
                        <ul class="footer-widget__Contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-email"></span>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}</a></p>
                                </div>
                            </li>
                            @if(!empty($lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis))
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-phone-square"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="tel:{{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}</a></p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <div class="site-footer__social">
                            @foreach($lihat_sosial_medias as $sosial_medias)
                                <a href="{{$sosial_medias->url_sosial_medias}}" target="_blank"><i class="fab fa-{{$sosial_medias->icon_sosial_medias}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__link">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Link</h3>
                        </div>
                        <ul class="footer-widget__link-list list-unstyled">
                            <li><a href="{{URL('/mobile')}}">Beranda</a></li>
                            <li><a href="{{URL('/mobile/data-suara')}}">Data Suara</a></li>
                            <li><a href="{{URL('/mobile/quick-count')}}">Quick Count</a></li>
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
                        <p class="site-footer__bottom-text">© Copyright {{date('Y')}} by <a href="{{URL('/mobile')}}">{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>