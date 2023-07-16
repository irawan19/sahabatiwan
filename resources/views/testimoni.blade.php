@extends('layouts.app')
@section('content')

    @include('layouts.pageheader')

    <section class="contact-one">
        <div class="contact-one__bg" style="background-image: url(template/front/images/backgrounds/contact-one-bg.png);">
        </div>
        <div class="container">
            <div class="section-title text-center" style="margin-top:50px;">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Testimoni</span>
                <h2 class="section-title__title"></h2>
            </div>
            <div class="contact-one__form-box">
                @if($errors->isEmpty())
                    @if (Session::get('setelah_simpan.alert') == 'sukses')
                        <div class="alert alert-success" role="alert">Testimoni anda sudah masuk ke dalam sistem kami. Terimakasih atas testimoni anda.</div>
                    @endif
                @else
                    <div class="alert alert-danger" role="alert">Opss... Ada kesalahan saat memasukkan data</div>
                @endif
                <form action="{{URL('/testimoni/kirim')}}" enctype="multipart/form-data" method="POST" class="contact-one__form">
					{{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
							    <label class="labelform" for="userfile_foto_testimoni">Foto </label>
                                <br/>
                                <input id="userfile_foto_testimoni" type="file" name="userfile_foto_testimoni">
                                {{General::pesanErrorForm($errors->first('userfile_foto_testimoni'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Nama" name="nama_testimonis" value="{{Request::old('nama_testimonis')}}">
                                {{General::pesanErrorForm($errors->first('nama_testimonis'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Profesi" name="profesi_testimonis" value="{{Request::old('profesi_testimonis')}}">
                                {{General::pesanErrorForm($errors->first('profesi_testimonis'))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__input-box text-message-box">
                                <textarea name="konten_testimonis" placeholder="Konten">{{Request::old('konten_testimonis')}}</textarea>
                                {{General::pesanErrorForm($errors->first('konten_testimonis'))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__btn-box">
                                <button type="submit" class="thm-btn contact-one__btn">Kirim Testimoni</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="result"></div>
            </div>
        </div>
    </section>

    <section class="contact-page">
        <div class="container">
            <div class="contact-page__top">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                            <div class="contact-page__img-box">
                                <div class="contact-page__img">
                                    <img src="{{'storage/'.$lihat_kontak_kamis->gambar_kontak_kamis}}" alt="{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__right">
                            <div class="section-title text-left">
                                <div class="section-title__icon">
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="section-title__tagline">{{$lihat_kontak_kamis->text1_kontak_kamis}}</span>
                                <h2 class="section-title__title">{{$lihat_kontak_kamis->text2_kontak_kamis}}</h2>
                            </div>
                            <p class="contact-page__text">
                                {!! $lihat_kontak_kamis->konten_kontak_kamis !!}
                            </p>
                            <ul class="list-unstyled contact-page__contact-list">
                                @if(!empty($lihat_konfigurasi_aplikasis->profesi_konfigurasi_aplikasis))
                                    <li>
                                        <div class="icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="content">
                                            <p>Anda memiliki pertanyaan?</p>
                                            <h4><a href="tel:{{$lihat_konfigurasi_aplikasis->profesi_konfigurasi_aplikasis}}"><span>Bebas</span> {{$lihat_konfigurasi_aplikasis->profesi_konfigurasi_aplikasis}}</a></h4>
                                        </div>
                                    </li>
                                @endif
                                <li>
                                    <div class="icon">
                                        <span class="icon-email"></span>
                                    </div>
                                    <div class="content">
                                        <p>Tulis Email</p>
                                        <h4><a href="mailto:{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}">{{$lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis}}</a></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-page__bottom">
                <div class="contact-page__bottom-left"></div>
                <div class="contact-page__bottom-right">
                    <div class="contact-page__social">
                        <div class="contact-page__social-shape-1 float-bob-x">
                            <img src="template/front/images/shapes/contact-page-shape-1.png" alt="{{$lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
                        </div>
                        <span>Sosial Media</span>
                        @foreach($lihat_sosial_medias as $sosial_medias)
                            <a href="{{$sosial_medias->url_sosial_medias}}"><i class="fab fa-{{$sosial_medias->icon_sosial_medias}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection