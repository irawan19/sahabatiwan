@extends('layouts.app')
@section('content')

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(storage/{{$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis}})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <h2>Dukungan Sahabat</h2>
            </div>
        </div>
    </section>

    <section class="contact-page">
        <div class="container">
            <div class="contact-page__top">
                @if($errors->isEmpty())
                    <div class="alert alert-success" style="display:none" role="alert">Dukungan anda sudah masuk ke dalam sistem kami. Terimakasih atas dukungan anda.</div>
                @else
                    <div class="alert alert-danger" role="alert">Opss... Ada kesalahan saat memasukkan data</div>
                @endif
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                            <div class="contact-page__img-box">
                                <div class="contact-page__img">
                                    <img src="{{'storage/'.$lihat_kontak_kamis->gambar_kontak_kamis}}" alt="">
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
                                @if(!empty($lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis))
                                    <li>
                                        <div class="icon">
                                            <span class="icon-telephone"></span>
                                        </div>
                                        <div class="content">
                                            <p>Anda memiliki pertanyaan?</p>
                                            <h4><a href="tel:{{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}"><span>Bebas</span> {{$lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis}}</a></h4>
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
                <div class="contact-page__bottom-left">
                    <h4>Form Dukungan Sahabat</h4>
                </div>
                <div class="contact-page__bottom-right">
                    <div class="contact-page__social">
                        <div class="contact-page__social-shape-1 float-bob-x">
                            <img src="template/front/images/shapes/contact-page-shape-1.png" alt="">
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

    <section class="contact-one">
        <div class="contact-one__bg" style="background-image: url(template/front/images/backgrounds/contact-one-bg.png);">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Dukungan Sahabat</span>
                <h2 class="section-title__title"></h2>
            </div>
            <div class="contact-one__form-box">
                <form action="{{URL('/dukungan-sahabat/kirim')}}" enctype="multipart/form-data" method="POST" class="contact-one__form">
					{{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
							    <label class="labelform" for="userfile_ktp_dukungan_sahabat">KTP </label>
                                <br/>
                                <input id="userfile_ktp_dukungan_sahabat" type="file" name="userfile_ktp_dukungan_sahabat">
                                {{General::pesanErrorForm($errors->first('userfile_ktp_dukungan_sahabat'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Nama" name="nama_dukungan_sahabats" value="{{Request::old('nama_dukungan_sahabats')}}">
                                {{General::pesanErrorForm($errors->first('nama_dukungan_sahabats'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="Telepon" name="telepon_dukungan_sahabats" value="{{Request::old('telepon_dukungan_sahabats')}}">
                                {{General::pesanErrorForm($errors->first('telepon_dukungan_sahabats'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="NIK" name="nik_dukungan_sahabats" value="{{Request::old('nik_dukungan_sahabats')}}">
                                {{General::pesanErrorForm($errors->first('nik_dukungan_sahabats'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
				                <select class="form-control select2" id="provinsis_id" name="provinsis_id">
				                	@foreach($lihat_provinsis as $provinsis)
									    <option value="{{$provinsis->id_provinsis}}" {{ Request::old('provinsis_id') == $provinsis->id_provinsis ? $select='selected' : $select='' }}>{{$provinsis->nama_provinsis}}</option>
				                	@endforeach
				                </select>
                                {{General::pesanErrorForm($errors->first('provinsis_id'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <select class="form-control select2" id="kota_kabupatens_id" name="kota_kabupatens_id">
                                    @if(Request::old('kota_kabupatens_id') != NULL)
                                        <option value="{{Request::old('kota_kabupatens_id')}}">
                                            @php($ambil_kota_kabupatens = \App\Models\Master_kota_kabupaten::where('id_kota_kabupatens',intval(Request::old('kota_kabupatens_id')))
                                                                                                ->first())
                                            {{$ambil_kota_kabupatens->nama_kota_kabupatens}}
                                        </option>
                                    @endif
                                </select>
							    {{General::pesanErrorForm($errors->first('kota_kabupatens_id'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <div class="contact-one__input-box">
                                    <select class="form-control select2" id="kecamatans_id" name="kecamatans_id">
                                        @if(Request::old('kecamatans_id') != NULL)
                                            <option value="{{Request::old('kecamatans_id')}}">
                                                @php($ambil_kecamatans = \App\Models\Master_kecamatan::where('id_kecamatans',intval(Request::old('kecamatans_id')))
                                                                                                    ->first())
                                                {{$ambil_kecamatans->nama_kecamatans}}
                                            </option>
                                        @endif
                                    </select>
                                    {{General::pesanErrorForm($errors->first('kecamatans_id'))}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <div class="contact-one__input-box">
                                    <select class="form-control select2" id="kelurahans_id" name="kelurahans_id">
                                        @if(Request::old('kelurahans_id') != NULL)
                                            <option value="{{Request::old('kelurahans_id')}}">
                                                @php($ambil_kelurahans = \App\Models\Master_kelurahan::where('id_kelurahans',intval(Request::old('kelurahans_id')))
                                                                                                    ->first())
                                                {{$ambil_kelurahans->nama_kelurahans}}
                                            </option>
                                        @endif
                                    </select>
                                    {{General::pesanErrorForm($errors->first('kelurahans_id'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__input-box text-message-box">
                                <textarea name="alamat_dukungan_sahabats" placeholder="Alamat">{{Request::old('alamat_dukungan_sahabats')}}</textarea>
                                {{General::pesanErrorForm($errors->first('alamat_dukungan_sahabats'))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__btn-box">
                                <button type="submit" class="thm-btn contact-one__btn">Kirim Dukungan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="result"></div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            //Provinsi
                idprovinsis = $('#provinsis_id').val();
                if(idprovinsis == null)
                {
                    $('#kota_kabupatens_id').select2({
                        width: '100%',
                        placeholder: 'Pilih provinsi terlebih dahulu...',
                    });
                }
                else
                {
                    $('#kota_kabupatens_id').select2({
                        width: '100%',
                        placeholder: 'Pilih provinsi terlebih dahulu...',
                        ajax: {
                            url: '{{URL("kota-kabupaten")}}/'+idprovinsis,
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function (params) {
                                var queryParameters = {
                                    term: params.term
                                }
                                return queryParameters;
                            },
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.nama_kota_kabupatens,
                                            id: item.id_kota_kabupatens,
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                }

                $('#provinsis_id').on('change', function(){
                    $('#kota_kabupatens_id').val('').trigger("change");
                    idprovinsis = $(this).val();
                    $('#kota_kabupatens_id').select2({
                        width: '100%',
                        placeholder: 'Pilih provinsi terlebih dahulu...',
                        ajax: {
                            url: '{{URL("kota-kabupaten")}}/'+idprovinsis,
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function (params) {
                                var queryParameters = {
                                    term: params.term
                                }
                                return queryParameters;
                            },
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.nama_kota_kabupatens,
                                            id: item.id_kota_kabupatens,
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                });
            //Provinsi

            //Kota Kabupaten
            idkotakabupatens = $('#kota_kabupatens_id').val();
                if(idkotakabupatens == null)
                {
                    $('#kecamatans_id').select2({
                        width: '100%',
                        placeholder: 'Pilih kota kabupaten terlebih dahulu...',
                    });
                }
                else
                {
                    $('#kecamatans_id').select2({
                        width: '100%',
                        placeholder: 'Pilih kota kabupaten terlebih dahulu...',
                        ajax: {
                            url: '{{URL("kecamatan")}}/'+idkotakabupatens,
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function (params) {
                                var queryParameters = {
                                    term: params.term
                                }
                                return queryParameters;
                            },
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.nama_kecamatans,
                                            id: item.id_kecamatans,
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                }

                $('#kota_kabupatens_id').on('change', function(){
                    $('#kecamatans_id').val('').trigger("change");
                    idkotakabupatens = $(this).val();
                    $('#kecamatans_id').select2({
                        width: '100%',
                        placeholder: 'Pilih kota kabupaten terlebih dahulu...',
                        ajax: {
                            url: '{{URL("kecamatan")}}/'+idkotakabupatens,
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function (params) {
                                var queryParameters = {
                                    term: params.term
                                }
                                return queryParameters;
                            },
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.nama_kecamatans,
                                            id: item.id_kecamatans,
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                });
            //Kota Kabupaten

            //Kecamatan
                idkecamatans = $('#kecamatans_id').val();
                if(idkecamatans == null)
                {
                    $('#kelurahans_id').select2({
                        width: '100%',
                        placeholder: 'Pilih kecamatan terlebih dahulu...',
                    });
                }
                else
                {
                    $('#kelurahans_id').select2({
                        width: '100%',
                        placeholder: 'Pilih kecamatan terlebih dahulu...',
                        ajax: {
                            url: '{{URL("kelurahan")}}/'+idkecamatans,
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function (params) {
                                var queryParameters = {
                                    term: params.term
                                }
                                return queryParameters;
                            },
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.nama_kelurahans,
                                            id: item.id_kelurahans,
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                }

                $('#kecamatans_id').on('change', function(){
                    $('#kelurahans_id').val('').trigger("change");
                    idkecamatans = $(this).val();
                    $('#kelurahans_id').select2({
                        width: '100%',
                        placeholder: 'Pilih kecamatan terlebih dahulu...',
                        ajax: {
                            url: '{{URL("kelurahan")}}/'+idkecamatans,
                            dataType: 'json',
                            delay: 250,
                            type: "GET",
                            data: function (params) {
                                var queryParameters = {
                                    term: params.term
                                }
                                return queryParameters;
                            },
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.nama_kelurahans,
                                            id: item.id_kelurahans,
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });
                });
                //Kecamatan
        });
    </script>

@endsection