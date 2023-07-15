@extends('layouts.app')
@section('content')
    
    @include('layouts.pageheader')

    <div class="news-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="section-title text-left">
                        <h2 class="section-title__title">Hasil Pencarian</h2>
                    </div>
                    <ul class="event-one__points list-unstyled">
                        @foreach($lihat_swara_nusvantaras as $swara_nusvantaras)
                            <li>
                                <a href="{{URL('swara-nusvantara/detail/'.$swara_nusvantaras->slug_kategori_swara_nusvantaras.'/'.$swara_nusvantaras->slug_swara_nusvantaras)}}">
                                    <div class="event-one__single">
                                        <div class="event-one__content">
                                            <h3 class="event-one__title">
                                                {{$swara_nusvantaras->judul_swara_nusvantaras}}
                                            </h3>
                                            <p>{!! General::potongText($swara_nusvantaras->konten_swara_nusvantaras, 200) !!}
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection