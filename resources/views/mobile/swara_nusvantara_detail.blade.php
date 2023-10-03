@extends('mobile.layouts.app')
@section('content')
    
    @include('mobile.layouts.pageheader')

    <div class="news-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        @if($errors->isEmpty())
                            @if (Session::get('setelah_simpan.alert') == 'sukses')
                                <div class="alert alert-success" role="alert">Komentar anda sudah masuk ke dalam sistem kami. Kami akan mereview komentar anda. Terimakasih atas komentar anda.</div>
                            @endif
                        @else
                            <div class="alert alert-danger" role="alert">Opss... Ada kesalahan saat memasukkan komentar</div>
                        @endif
                        <div class="news-details__img-box">
                            <div class="news-details__img">
                                <img src="{{URL::asset('storage/'.$lihat_swara_nusvantaras->gambar_swara_nusvantaras)}}" alt="{{$lihat_swara_nusvantaras->judul_swara_nusvantaras}}">
                            </div>
                            <div class="news-details__date">
                                @php($tanggal_publikasi_swara_nusvantaras = $lihat_swara_nusvantaras->tanggal_publikasi_swara_nusvantaras)
                                @php($pecah_tanggal_publikasi_swara_nusvantaras = explode(' ',$tanggal_publikasi_swara_nusvantaras))
                                <p>
                                    {{General::ubahDBKeTanggal($pecah_tanggal_publikasi_swara_nusvantaras[0])}}
                                    <br/>
                                    <br/>
                                    {{$pecah_tanggal_publikasi_swara_nusvantaras[1]}}
                                </p>
                            </div>
                        </div>
                        <div class="news-details__content">
                            <ul class="news-details__meta list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-tags"></span>
                                    </div>
                                    <div class="news-one__user-text">
                                        <p>{{$lihat_swara_nusvantaras->nama_kategori_swara_nusvantaras}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-comments"></span>
                                    </div>
                                    <div class="text">
                                        <p>{{$lihat_swara_nusvantaras->total_komentar_swara_nusvantaras}} Komentar</p>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="news-details__title-1">{{$lihat_swara_nusvantaras->judul_swara_nusvantaras}}</h3>
                            <p class="news-details__text-1">
                                {!! $lihat_swara_nusvantaras->konten_swara_nusvantaras !!}
                            </p>
                        </div>
                        <div class="news-details__bottom">
                            <p class="news-details__tags"></p>
                            <div class="news-details__social-list">
                                <a href="https://twitter.com/share?url={{URL::current()}}&text={{$lihat_swara_nusvantaras->judul_swara_nusvantaras}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{URL::current()}}" target="_blank"><i class="fab fa-facebook"></i></a>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Berikan komentar</h3>
                            <form action="{{URL('mobile/swara-nusvantara/komentar/kirim')}}" method="POST" class="comment-one__form"
                                novalidate="novalidate">
					            {{ csrf_field() }}
                                <input type="hidden" name="id_swara_nusvantaras" value="{{$lihat_swara_nusvantaras->id_swara_nusvantaras}}">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" name="nama_komentar_swara_nusvantaras" placeholder="Nama" value="{{Request::old('nama_komentar_swara_nusvantaras')}}">
                                        {{General::pesanErrorForm($errors->first('nama_komentar_swara_nusvantaras'))}}
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email" name="email_komentar_swara_nusvantaras" value="{{Request::old('email_komentar_swara_nusvantaras')}}">
                                            {{General::pesanErrorForm($errors->first('email_komentar_swara_nusvantaras'))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="konten_komentar_swara_nusvantaras" placeholder="Komentar">{!! Request::old('konten_komentar_swara_nusvantaras') !!}</textarea>
                                            {{General::pesanErrorForm($errors->first('konten_komentar_swara_nusvantaras'))}}
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="thm-btn comment-form__btn">Kirim Komentar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="result"></div>
                            <div class="comment-one">
                                <h3 class="comment-one__title">{{$lihat_swara_nusvantaras->total_komentar_swara_nusvantaras}} Komentar</h3>
                                @foreach($lihat_komentars as $komentars)
                                <div class="comment-one__single">
                                    <div class="comment-one__image">
                                        <img src="assets/images/blog/comment-1-1.jpg" alt="">
                                    </div>
                                    <div class="comment-one__content">
                                        <h3>{{$komentars->nama_komentar_swara_nusvantaras}}</h3>
                                        {!! nl2br($konten_komentar_swara_nusvantaras) !!}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection