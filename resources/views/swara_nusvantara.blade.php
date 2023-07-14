@extends('layouts.app')
@section('content')
    
    @include('layouts.pageheader')

    <div class="news-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-sidebar__left">
                        <div class="news-sidebar__content">
                            @if(Request::segment(2) == 'kategori')
                                <h4 class="titlekategori">Kategori {{$baca_kategori_swara_nusvantaras->nama_kategori_swara_nusvantaras}}</h4>
                            @endif
                            @foreach($lihat_swara_nusvantaras as $swara_nusvantaras)
                                <div class="news-sidebar__single">
                                    <div class="news-sidebar__img">
                                        <img src="{{URL('storage/'.$swara_nusvantaras->gambar_swara_nusvantaras)}}" alt="{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
                                        <div class="news-sidebar__date">
                                            @php($tanggal_publikasi_swara_nusvantaras = $swara_nusvantaras->tanggal_publikasi_swara_nusvantaras)
                                            @php($pecah_tanggal_publikasi_swara_nusvantaras = explode(' ',$tanggal_publikasi_swara_nusvantaras))
                                            <p>
                                                {{General::ubahDBKeTanggal($pecah_tanggal_publikasi_swara_nusvantaras[0])}}
                                                <br/>
                                                <br/>
                                                {{$pecah_tanggal_publikasi_swara_nusvantaras[1]}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="news-sidebar__content-box">
                                        <ul class="list-unstyled news-sidebar__meta">
                                            <li>
                                                <div class="icon">
                                                    <span class="fas fa-tags"></span>
                                                </div>
                                                <div class="news-one__user-text">
                                                    <p>{{$swara_nusvantaras->nama_kategori_swara_nusvantaras}}</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="fas fa-comments"></span>
                                                </div>
                                                <div class="text">
                                                    <p>{{$swara_nusvantaras->total_komentar_swara_nusvantaras}} Komentar</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <h3 class="news-sidebar__title">
                                            <a href="news-details.html">{{$swara_nusvantaras->judul_swara_nusvantaras}}</a>
                                        </h3>
                                        <p class="news-sidebar__text">{!! General::potongText($swara_nusvantaras->konten_swara_nusvantaras,200) !!}</p>
                                        <a href="news-details.html" class="news-sidebar__read-more">LIhat Selengkapnya<span class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="news-sidebar__load-more">
                            {{ $lihat_swara_nusvantaras->appends(Request::except('page'))->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="{{URL('swara-nusvantara/cari')}}" method="get" class="sidebar__search-form">
                                <input type="search" placeholder="Cari Swara Nusvantara" name="cari_swara_nusvantara">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Populer</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach($lihat_swara_nusvantara_populers as $swara_nusvantara_populers)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{URL::asset('storage/'.$swara_nusvantara_populers->gambar_swara_nusvantaras)}}" alt="{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <span class="sidebar__post-content-meta"><i
                                                        class="fas fa-tags"></i>{{$swara_nusvantara_populers->nama_kategori_swara_nusvantaras}}</span>
                                                <a href="news-details.html">{{$swara_nusvantaras->judul_swara_nusvantaras}}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Kategori</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach($lihat_kategori_swara_nusvantaras as $kategori_swara_nusvantaras)
                                    <li>
                                        <a href="{{URL('swara-nusvantara/kategori/'.$kategori_swara_nusvantaras->slug_kategori_swara_nusvantaras)}}">{{$kategori_swara_nusvantaras->nama_kategori_swara_nusvantaras}}<span class="icon-right-arrow"></span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">Komentar</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                @foreach($lihat_komentar_swara_nusvantaras as $komentar_swara_nusvantaras)
                                    <li>
                                        <div class="sidebar__comments-icon">
                                            <i class="fas fa-comment"></i>
                                        </div>
                                        <div class="sidebar__comments-text-box">
                                            <p>{!! $komentar_swara_nusvantaras->konten_komentar_swara_nusvantaras !!}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection