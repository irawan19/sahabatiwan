<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            <div class="main-menu__wrapper-inner">
                <div class="main-menu__logo">
                    <a href="{{URL('/')}}"><img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}" alt="logo {{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}"></a>
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
                                        <p>{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}</p>
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
                                <a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}" class="thm-btn main-menu__btn">Kirim Email</a>
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