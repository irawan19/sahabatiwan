<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="{{URL('/')}}" aria-label="logo image"><img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}" width="94"
                    alt="" /></a>
        </div>
        <div class="mobile-nav__container"></div>
        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}</a>
            </li>
        </ul>
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                @foreach($lihat_sosial_medias as $sosial_medias)
                    <a href="{{$sosial_medias->url_sosial_medias}}" target="_blank" class="fab fa-{{$sosial_medias->icon_sosial_medias}}"></a>
                @endforeach
            </div>
        </div>
    </div>
</div>