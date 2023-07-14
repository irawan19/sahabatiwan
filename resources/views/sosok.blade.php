@extends('layouts.app')
@section('content')
    
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis)}})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Sosok</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    
    <!--Team Details Start-->
    <section class="team-details">
        <div class="container">
            <div class="team-details__top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__left">
                            <div class="team-details__img">
                                <img src="{{URL::asset('storage/'.$lihat_profils->foto3_profils)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team-details__right">
                            <div class="team-details__top-content">
                                <h3 class="team-details__top-name">{{$lihat_profils->nama_profils}}</h3>
                                <p class="team-details__top-title">{{$lihat_profils->keterangan_nama_profils}}</p>
                                <div class="team-details__social">
                                    @foreach($lihat_sosial_medias as $sosial_medias)
                                        <a href="{{$sosial_medias->url_sosial_medias}}" target="_blank"><i class="fab fa-{{$sosial_medias->icon_sosial_medias}}"></i></a>
                                    @endforeach
                                </div>
                                <p class="team-details__top-text-1"></p>
                                <p class="team-details__top-text-2">{!! $lihat_profils->sekilas_konten_profils !!}</p>
                                <div class="team-details__contact"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-details__bottom">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="team-details__bottom-left">
                            <p class="team-details__bottom-left-text">{!! $lihat_profils->konten_profils !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Team Details End-->

@endsection