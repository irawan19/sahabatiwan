@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/data_suara/prosestambah') }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Tambah Data Suara</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
						@endif
						@if (Session::get('setelah_simpan.alert') == 'error')
							{{ General::pesanFlashErrorForm(Session::get('setelah_simpan.text')) }}
						@endif
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-col-form-label" for="tahun_data_suaras">Tahun <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('tahun_data_suaras')) }}" id="tahun_data_suaras" type="number" name="tahun_data_suaras" value="{{Request::old('tahun_data_suaras') == '' ? date('Y') : Request::old('tahun_data_suaras')}}">
									{{General::pesanErrorForm($errors->first('tahun_data_suaras'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="nama_data_suaras">Nama <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('nama_data_suaras')) }}" id="nama_data_suaras" type="text" name="nama_data_suaras" value="{{Request::old('nama_data_suaras')}}">
									{{General::pesanErrorForm($errors->first('nama_data_suaras'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="tps_data_suaras">No TPS <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('tps_data_suaras')) }}" id="tps_data_suaras" type="text" name="tps_data_suaras" value="{{Request::old('tps_data_suaras')}}">
									{{General::pesanErrorForm($errors->first('tps_data_suaras'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="rt_data_suaras">RT <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('rt_data_suaras')) }}" id="rt_data_suaras" type="text" name="rt_data_suaras" value="{{Request::old('rt_data_suaras')}}">
									{{General::pesanErrorForm($errors->first('rt_data_suaras'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="rw_data_suaras">RW <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('rw_data_suaras')) }}" id="rw_data_suaras" type="text" name="rw_data_suaras" value="{{Request::old('rw_data_suaras')}}">
									{{General::pesanErrorForm($errors->first('rw_data_suaras'))}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-col-form-label" for="provinsis_id">Provinsi <b style="color:red">*</b></label>
									<select class="form-control select2" id="provinsis_id" name="provinsis_id">
										@foreach($tambah_provinsis as $provinsis)
											@php($selected = '')
					                    	@if($provinsis->id_provinsis == 13)
					                    		@php($selected = 'selected')
					                    	@endif
											<option value="{{$provinsis->id_provinsis}}" {{ $selected }}>{{$provinsis->nama_provinsis}}</option>
										@endforeach
									</select>
									{{General::pesanErrorForm($errors->first('provinsis_id'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kota_kabupatens_id">Kota Kabupaten <b style="color:red">*</b></label>
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
								<div class="form-group">
									<label class="form-col-form-label" for="kecamatans_id">Kecamatan <b style="color:red">*</b></label>
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
								<div class="form-group">
									<label class="form-col-form-label" for="kelurahans_id">Kelurahan <b style="color:red">*</b></label>
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
					<div class="card-footer right-align">
						{{General::simpan()}}
						{{General::simpankembali()}}
						@if(request()->session()->get('halaman') != '')
						@php($ambil_kembali = request()->session()->get('halaman'))
						@else
						@php($ambil_kembali = URL('dashboard/data_suara'))
						@endif
						{{General::batal($ambil_kembali)}}
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			//Provinsi
			idprovinsis = $('#provinsis_id').val();
			if (idprovinsis == null) {
				$('#kota_kabupatens_id').select2({
					width: '100%'
					, placeholder: 'Pilih provinsi terlebih dahulu...'
				, });
			} else {
				$('#kota_kabupatens_id').select2({
					width: '100%'
					, placeholder: 'Pilih provinsi terlebih dahulu...'
					, ajax: {
						url: '{{URL("kota-kabupaten")}}/' + idprovinsis
						, dataType: 'json'
						, delay: 250
						, type: "GET"
						, data: function(params) {
							var queryParameters = {
								term: params.term
							}
							return queryParameters;
						}
						, processResults: function(data) {
							return {
								results: $.map(data, function(item) {
									return {
										text: item.nama_kota_kabupatens
										, id: item.id_kota_kabupatens
									, }
								})
							};
						}
						, cache: true
					}
				});
			}

			$('#provinsis_id').on('change', function() {
				$('#kota_kabupatens_id').val('').trigger("change");
				idprovinsis = $(this).val();
				$('#kota_kabupatens_id').select2({
					width: '100%'
					, placeholder: 'Pilih provinsi terlebih dahulu...'
					, ajax: {
						url: '{{URL("kota-kabupaten")}}/' + idprovinsis
						, dataType: 'json'
						, delay: 250
						, type: "GET"
						, data: function(params) {
							var queryParameters = {
								term: params.term
							}
							return queryParameters;
						}
						, processResults: function(data) {
							return {
								results: $.map(data, function(item) {
									return {
										text: item.nama_kota_kabupatens
										, id: item.id_kota_kabupatens
									, }
								})
							};
						}
						, cache: true
					}
				});
			});
			//Provinsi

			//Kota Kabupaten
			idkotakabupatens = $('#kota_kabupatens_id').val();
			if (idkotakabupatens == null) {
				$('#kecamatans_id').select2({
					width: '100%'
					, placeholder: 'Pilih kota kabupaten terlebih dahulu...'
				, });
			} else {
				$('#kecamatans_id').select2({
					width: '100%'
					, placeholder: 'Pilih kota kabupaten terlebih dahulu...'
					, ajax: {
						url: '{{URL("kecamatan")}}/' + idkotakabupatens
						, dataType: 'json'
						, delay: 250
						, type: "GET"
						, data: function(params) {
							var queryParameters = {
								term: params.term
							}
							return queryParameters;
						}
						, processResults: function(data) {
							return {
								results: $.map(data, function(item) {
									return {
										text: item.nama_kecamatans
										, id: item.id_kecamatans
									, }
								})
							};
						}
						, cache: true
					}
				});
			}

			$('#kota_kabupatens_id').on('change', function() {
				$('#kecamatans_id').val('').trigger("change");
				idkotakabupatens = $(this).val();
				$('#kecamatans_id').select2({
					width: '100%'
					, placeholder: 'Pilih kota kabupaten terlebih dahulu...'
					, ajax: {
						url: '{{URL("kecamatan")}}/' + idkotakabupatens
						, dataType: 'json'
						, delay: 250
						, type: "GET"
						, data: function(params) {
							var queryParameters = {
								term: params.term
							}
							return queryParameters;
						}
						, processResults: function(data) {
							return {
								results: $.map(data, function(item) {
									return {
										text: item.nama_kecamatans
										, id: item.id_kecamatans
									, }
								})
							};
						}
						, cache: true
					}
				});
			});
			//Kota Kabupaten

			//Kecamatan
			idkecamatans = $('#kecamatans_id').val();
			if (idkecamatans == null) {
				$('#kelurahans_id').select2({
					width: '100%'
					, placeholder: 'Pilih kecamatan terlebih dahulu...'
				, });
			} else {
				$('#kelurahans_id').select2({
					width: '100%'
					, placeholder: 'Pilih kecamatan terlebih dahulu...'
					, ajax: {
						url: '{{URL("kelurahan")}}/' + idkecamatans
						, dataType: 'json'
						, delay: 250
						, type: "GET"
						, data: function(params) {
							var queryParameters = {
								term: params.term
							}
							return queryParameters;
						}
						, processResults: function(data) {
							return {
								results: $.map(data, function(item) {
									return {
										text: item.nama_kelurahans
										, id: item.id_kelurahans
									, }
								})
							};
						}
						, cache: true
					}
				});
			}

			$('#kecamatans_id').on('change', function() {
				$('#kelurahans_id').val('').trigger("change");
				idkecamatans = $(this).val();
				$('#kelurahans_id').select2({
					width: '100%'
					, placeholder: 'Pilih kecamatan terlebih dahulu...'
					, ajax: {
						url: '{{URL("kelurahan")}}/' + idkecamatans
						, dataType: 'json'
						, delay: 250
						, type: "GET"
						, data: function(params) {
							var queryParameters = {
								term: params.term
							}
							return queryParameters;
						}
						, processResults: function(data) {
							return {
								results: $.map(data, function(item) {
									return {
										text: item.nama_kelurahans
										, id: item.id_kelurahans
									, }
								})
							};
						}
						, cache: true
					}
				});
			});
			//Kecamatan
		});

	</script>

@endsection
