<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis)}})">
    </div>
    <div class="container">
        <div class="page-header__inner">
            @if(Request::segment(2) == 'swara-nusvantara')
                <h2>Swara Nusvantara</h2>
            @endif
        </div>
    </div>
</section>