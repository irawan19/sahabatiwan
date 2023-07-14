@extends('layouts.app')
@section('content')
    
    @include('layouts.pageheader')

    <div class="news-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">
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
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="news-details__pagenation-box">
                            <ul class="list-unstyled news-details__pagenation">
                                <li>Everyone should live once in a smart city</li>
                                <li>The best city in world with amazing art & culture</li>
                            </ul>
                        </div>
                        <div class="comment-one">
                            <h3 class="comment-one__title">2 comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="assets/images/blog/comment-1-1.jpg" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin martin</h3>
                                    <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia nulla.
                                        Aliquam quis purus in justo pulvinar tempor. Aliquam tellus nulla,
                                        sollicitudin at euismod.</p>
                                    <a href="news-details.html" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="assets/images/blog/comment-1-2.jpg" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Sarah albert</h3>
                                    <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia nulla.
                                        Aliquam quis purus in justo pulvinar tempor. Aliquam tellus nulla,
                                        sollicitudin at euismod.</p>
                                    <a href="news-details.html" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Leave a comment</h3>
                            <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated"
                                novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email Address" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" placeholder="Write Comment"></textarea>
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="thm-btn comment-form__btn">Submit
                                                Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="result"></div>
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
                                                <a href="{{URL('swara-nusvantara/detail/'.$swara_nusvantara_populers->slug_kategori_swara_nusvantaras.'/'.$swara_nusvantara_populers->slug_swara_nusvantaras)}}">{{$swara_nusvantara_populers->judul_swara_nusvantaras}}</a>
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