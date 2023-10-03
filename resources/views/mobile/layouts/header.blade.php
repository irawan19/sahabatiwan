<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__logo">
                    <a href="{{URL('/mobile')}}"><img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}" alt="logo {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}"></a>
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
                                        <p>
                                            <a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}">
                                                {{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}
                                            </a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled main-menu__top-menu">
                                <li></li>
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
                                    <a href="{{URL('/mobile')}}">Beranda </a>
                                </li>
                                <li>
                                    <a href="{{URL('/mobile/data-suara')}}">Data Suara</a>
                                </li>
                                <li>
                                    <a href="{{URL('/mobile/quick-count')}}">Quick Count</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu__right">
                            @if(!empty($lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis))
                                <div class="main-menu__call">
                                    <div class="main-menu__call-icon">
                                        <span class="icon-telephone"></span>
                                    </div>
                                    <div class="main-menu__call-content">
                                        <p class="main-menu__call-sub-title">Telepon</p>
                                        <h5 class="main-menu__call-number"><a href="tel:{{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}</a></h5>
                                    </div>
                                </div>
                            @endif
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