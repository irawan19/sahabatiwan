@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/quick_count/prosestambah') }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Tambah Quick Count</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
						{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
						@endif
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-col-form-label" for="tahun_quick_counts">Tahun <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('tahun_quick_counts')) }}" id="tahun_quick_counts" type="number" name="tahun_quick_counts" value="{{Request::old('tahun_quick_counts') == '' ? date('Y') : Request::old('tahun_quick_counts')}}">
									{{General::pesanErrorForm($errors->first('tahun_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="tps_quick_counts">No TPS <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('tps_quick_counts')) }}" id="tps_quick_counts" type="text" name="tps_quick_counts" value="{{Request::old('tps_quick_counts')}}">
									{{General::pesanErrorForm($errors->first('tps_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="rt_quick_counts">RT <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('rt_quick_counts')) }}" id="rt_quick_counts" type="text" name="rt_quick_counts" value="{{Request::old('rt_quick_counts')}}">
									{{General::pesanErrorForm($errors->first('rt_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="rw_quick_counts">RW <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('rw_quick_counts')) }}" id="rw_quick_counts" type="text" name="rw_quick_counts" value="{{Request::old('rw_quick_counts')}}">
									{{General::pesanErrorForm($errors->first('rw_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="jumlah_quick_counts">Jumlah <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('jumlah_quick_counts')) }}" id="jumlah_quick_counts" type="text" name="jumlah_quick_counts" value="{{Request::old('jumlah_quick_counts')}}">
									{{General::pesanErrorForm($errors->first('jumlah_quick_counts'))}}
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
											<option value="{{$provinsis->id_provinsis}}" {{ $selected }}>{{$provinsis->jumlah_provinsis}}</option>
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
												{{$ambil_kota_kabupatens->jumlah_kota_kabupatens}}
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
                                                {{$ambil_kecamatans->jumlah_kecamatans}}
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
                                                {{$ambil_kelurahans->jumlah_kelurahans}}
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
						@php($ambil_kembali = URL('dashboard/quick_count'))
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
										text: item.jumlah_kota_kabupatens
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
										text: item.jumlah_kota_kabupatens
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
										text: item.jumlah_kecamatans
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
										text: item.jumlah_kecamatans
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
										text: item.jumlah_kelurahans
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
										text: item.jumlah_kelurahans
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
