@extends('mobile.layouts.app')
@section('content')

    <section class="contact-one">
        <div class="contact-one__bg" style="background-image: url(template/front/images/backgrounds/contact-one-bg.png);">
        </div>
        <div class="container">
            <div class="section-title text-center" style="margin-top:50px;">
                <div class="section-title__icon">
                    <span class="fa fa-star"></span>
                </div>
                <span class="section-title__tagline">Quick Count</span>
                <h2 class="section-title__title"></h2>
            </div>
            <div class="contact-one__form-box">
                @if($errors->isEmpty())
                    @if (Session::get('setelah_simpan.alert') == 'sukses')
                        <div class="alert alert-success" role="alert">{{Session::get('setelah_simpan.text')}}</div>
                    @elseif (Session::get('setelah_simpan.alert') == 'error')
                        <div class="alert alert-danger" role="alert">{{Session::get('setelah_simpan.text')}}</div>
                    @endif
                @else
                    <div class="alert alert-danger" role="alert">Opss... Ada kesalahan saat memasukkan data</div>
                @endif
                <form action="{{URL('/mobile/data-suara/prosestambah')}}" method="POST" class="contact-one__form">
					{{ csrf_field() }}
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="number" placeholder="Tahun" name="tahun_quick_counts" value="{{Request::old('tahun_quick_counts') == '' ? date('Y') : Request::old('tahun_quick_counts')}}">
                                {{General::pesanErrorForm($errors->first('tahun_quick_counts'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
				                <select class="form-control select2" id="provinsis_id" name="provinsis_id">
				                	@foreach($lihat_provinsis as $provinsis)
				                    	@php($selected = '')
					                    @if(Request::old('provinsis_id') == '')
					                    	@if($provinsis->id_provinsis == 13)
					                    		@php($selected = 'selected')
					                    	@endif
					                    @else
					                    	@if($provinsis->id_provinsis == Request::old('provinsis_id'))
					                    		@php($selected = 'selected')
					                    	@endif
					                    @endif
									    <option value="{{$provinsis->id_provinsis}}" {{ $selected }}>{{$provinsis->nama_provinsis}}</option>
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
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="text" placeholder="No TPS" name="tps_quick_counts" value="{{Request::old('tps_quick_counts')}}">
                                {{General::pesanErrorForm($errors->first('tps_quick_counts'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="number" placeholder="RT" name="rt_quick_counts" value="{{Request::old('rt_quick_counts')}}">
                                {{General::pesanErrorForm($errors->first('rt_quick_counts'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="number" placeholder="RW" name="rw_quick_counts" value="{{Request::old('rw_quick_counts')}}">
                                {{General::pesanErrorForm($errors->first('rw_quick_counts'))}}
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-one__input-box">
                                <input type="number" placeholder="Jumlah" name="jumlah_quick_counts" value="{{Request::old('jumlah_quick_counts')}}">
                                {{General::pesanErrorForm($errors->first('jumlah_quick_counts'))}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-one__btn-box">
                                <button type="submit" class="thm-btn contact-one__btn">Kirim Quick Count</button>
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