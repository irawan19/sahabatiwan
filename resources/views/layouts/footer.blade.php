@php($lihat_profils = \App\Models\Master_profil::first())
@php($lihat_lima_swara_nusvantara = \App\Models\Master_swara_nusvantara::selectRaw('nama_kategori_swara_nusvantaras,
                                                                                    slug_kategori_swara_nusvantaras,
                                                                                    judul_swara_nusvantaras,
                                                                                    slug_swara_nusvantaras')
                                                                        ->join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                        ->where('tanggal_publikasi_swara_nusvantaras','<=', date('Y-m-d H:i:s'))
                                                                        ->orderBy('tanggal_publikasi_swara_nusvantaras','desc')
                                                                        ->limit(5)
                                                                        ->get()))
@php($lihat_galeris = \App\Models\Master_galeri::limit(6)->get())
<footer class="site-footer">
    <div class="site-footer__img">
        <img src="{{URL::asset('template/front/images/resources/site-footer-img.jpg')}}" alt="{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="footer-widget__logo">
                <a href="{{URL('/')}}">
                    <img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}" alt="Logo {{$lihat_konfigurasi_aplikasis->nama_logo_konfigurasi_aplikasis}}">
                </a>
            </div>
            <div class="footer-widget__subscribe-box">
                <div class="footer-widget__subscribe-text">
                    <p>Langganan Swara Nusvantara</p>
                </div>
                <form class="footer-widget__email-box formlangganan" method="POST" action="{{URL('subscribe')}}">
					{{ csrf_field() }}
                    <div class="footer-widget__email-input-box">
                        <input type="email" id="email_subscribes" placeholder="Masukkan email anda..." name="email_subscribes">
                    </div>
                    <button type="button" class="footer-widget__subscribe-btn thm-btn btnemailsubcribe">
                        Berlangganan
                    </button>
                </form>
                <div class="mc-form__response">
                    <p class="errorform erroremailsubscribe" style="display:none">email harus diisi.</p>
                    <p class="successemailsubscribe" style="display:none">Email anda berhasil terdaftar untuk langganan swara nusvatara.</p>
                </div>
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
                            <li><a href="{{URL('/')}}">Beranda</a></li>
                            <li><a href="{{URL('/sosok')}}">Sosok</a></li>
                            <li><a href="{{URL('/swara-nusvantara')}}">Swara Nusvantara</a></li>
                            <li><a href="{{URL('/laporan-sahabat')}}">Laporan Sahabat</a></li>
                            <li><a href="{{URL('/dukungan-sahabat')}}">Dukungan Sahabat</a></li>
                            <li><a href="{{URL::asset('storage/android/sahabatiwan.apk')}}">Download Android</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__link">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Swara Nusvantara</h3>
                        </div>
                        <ul class="footer-widget__link-list list-unstyled">
                            @foreach($lihat_lima_swara_nusvantara as $lima_swara_nusvantaras)
                                <li><a href="{{URL('swara-nusvantara/detail/'.$lima_swara_nusvantaras->slug_kategori_swara_nusvantaras.'/'.$lima_swara_nusvantaras->slug_swara_nusvantaras)}}">{{$lima_swara_nusvantaras->judul_swara_nusvantaras}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="footer-widget__column footer-widget__gallery">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Galeri</h3>
                        </div>
                        <ul class="footer-widget__gallery-list list-unstyled clearfix">
                            @foreach($lihat_galeris as $galeris)
                                <li>
                                    <div class="footer-widget__gallery-img">
                                        <img src="{{URL::asset('storage/'.$galeris->foto_galeris)}}" width="80px" alt="{{$galeris->judul_galeris}}">
                                        <a data-caption="{{$galeris->judul_galeris}}" data-fancybox="{{$galeris->judul_galeris}}" href="{{URL::asset('storage/'.$galeris->foto_galeris)}}">
                                            <span class="fab fa-instagram"></span>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
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
                        <p class="site-footer__bottom-text">© Copyright {{date('Y')}} by <a href="{{URL('/')}}">{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.btnemailsubcribe').on('click', function() {
			emailsubscribe = $('#email_subscribes').val();
            if(emailsubscribe == '') {
                $('.erroremailsubscribe').css('display','block');
            } else {
                $('.erroremailsubscribe').css('display','none');
                var headerRequest = {
                            'X-CSRF-Token': $('meta[name="_token"]').attr('content'),
                            };
                $.ajax({
                            url: '{{URL("subscribe")}}',
                            type: "POST",
                            dataType: 'JSON',
						    headers: headerRequest,
                            data: {email_subscribes: emailsubscribe},
                            success: function(data)
                            {
                                emailsubscribeberanda = $('#email_subscribesberanda').val('');
                                $('.successemailsubscribe').css('display','block');
                            },
                            error: function(data) {
                                console.log(data);
                            }
                    });
            }
        });
    });
</script>