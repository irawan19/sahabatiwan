<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis)}})">
    </div>
    <div class="container">
        <div class="page-header__inner">
            @if(Request::segment(1) == 'sosok')
                <h2>Sosok</h2>
            @elseif(Request::segment(1) == 'swara-nusvantara')
                <h2>Swara Nusvantara</h2>
            @elseif(Request::segment(1) == 'laporan-sahabat')
                <h2>Laporan Sahabat</h2>
            @elseif(Request::segment(1) == 'dukungan-sahabat')
                <h2>Dukungan Sahabat</h2>
            @endif
        </div>
    </div>
</section>