@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/quick_count/prosesedit/'.$edit_quick_counts->id_quick_counts) }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Edit Quick Count</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-col-form-label" for="tahun_quick_counts">Tahun <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('tahun_quick_counts')) }}" id="tahun_quick_counts" type="number" name="tahun_quick_counts" value="{{Request::old('tahun_quick_counts') == '' ? $edit_quick_counts->tahun_quick_counts : Request::old('tahun_quick_counts')}}">
									{{General::pesanErrorForm($errors->first('tahun_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="tps_quick_counts">No TPS <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('tps_quick_counts')) }}" id="tps_quick_counts" type="text" name="tps_quick_counts" value="{{Request::old('tps_quick_counts') == '' ? $edit_quick_counts->tps_quick_counts : Request::old('tps_quick_counts') }}">
									{{General::pesanErrorForm($errors->first('tps_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="rt_quick_counts">RT <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('rt_quick_counts')) }}" id="rt_quick_counts" type="text" name="rt_quick_counts" value="{{Request::old('rt_quick_counts') == '' ? $edit_quick_counts->rt_quick_counts : Request::old('rt_quick_counts') }}">
									{{General::pesanErrorForm($errors->first('rt_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="rw_quick_counts">RW <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('rw_quick_counts')) }}" id="rw_quick_counts" type="text" name="rw_quick_counts" value="{{Request::old('rw_quick_counts') == '' ? $edit_quick_counts->rw_quick_counts : Request::old('rw_quick_counts') }}">
									{{General::pesanErrorForm($errors->first('rw_quick_counts'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="jumlah_quick_counts">Jumlah <b style="color:red">*</b></label>
									<input class="form-control {{ General::validForm($errors->first('jumlah_quick_counts')) }}" id="jumlah_quick_counts" type="text" name="jumlah_quick_counts" value="{{Request::old('jumlah_quick_counts') == '' ? $edit_quick_counts->jumlah_quick_counts : Request::old('jumlah_quick_counts') }}">
									{{General::pesanErrorForm($errors->first('jumlah_quick_counts'))}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-col-form-label" for="provinsis_id">Provinsi <b style="color:red">*</b></label>
									<select class="form-control select2" id="provinsis_id" name="provinsis_id">
										@foreach($edit_provinsis as $provinsis)
											@php($selected = '')
											@if(Request::old('provinsis_id') == '')
												@if($provinsis->id_provinsis == 13)
													@php($selected = 'selected')
												@endif
											@else
												@if($provinsis->id_provinsis == $edit_quick_counts->id_provinsis)
													@php($selected = 'selected')
												@endif
											@endif
											<option value="{{$provinsis->id_provinsis}}" {{ $selected }}>{{$provinsis->nama_provinsis}}</option>
										@endforeach
									</select>
									{{General::pesanErrorForm($errors->first('provinsis_id'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kota_kabupatens_id">Kota Kabupaten <b style="color:red">*</b></label>
									<select class="form-control select2" id="kota_kabupatens_id" name="kota_kabupatens_id">
										@foreach($edit_kota_kabupatens as $kota_kabupatens)
											@php($selected = '')
											@if(Request::old('kota_kabupatens_id') == '')
												@if($kota_kabupatens->id_kota_kabupatens == $edit_quick_counts->kota_kabupatens_id)
													@php($selected = 'selected')
												@endif
											@else
												@if($kota_kabupatens->id_kota_kabupatens == Request::old('kota_kabupatens_id'))
													@php($selected = 'selected')
												@endif
											@endif
											<option value="{{$kota_kabupatens->id_kota_kabupatens}}" {{ $selected }}>{{$kota_kabupatens->nama_kota_kabupatens}}</option>
										@endforeach
									</select>
									{{General::pesanErrorForm($errors->first('kota_kabupatens_id'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kecamatans_id">Kecamatan <b style="color:red">*</b></label>
									<select class="form-control select2" id="kecamatans_id" name="kecamatans_id">
										@foreach($edit_kecamatans as $kecamatans)
											@php($selected = '')
											@if(Request::old('kecamatans_id') == '')
												@if($kecamatans->id_kecamatans == $edit_quick_counts->kecamatans_id)
													@php($selected = 'selected')
												@endif
											@else
												@if($kecamatans->id_kecamatans == Request::old('kecamatans_id'))
													@php($selected = 'selected')
												@endif
											@endif
											<option value="{{$kecamatans->id_kecamatans}}" {{ $selected }}>{{$kecamatans->nama_kecamatans}}</option>
										@endforeach
									</select>
									{{General::pesanErrorForm($errors->first('kecamatans_id'))}}
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kelurahans_id">Kelurahan <b style="color:red">*</b></label>
									<select class="form-control select2" id="kelurahans_id" name="kelurahans_id">
										@foreach($edit_kelurahans as $kelurahans)
											@php($selected = '')
											@if(Request::old('kelurahans_id') == '')
												@if($kelurahans->id_kelurahans == $edit_quick_counts->kelurahans_id)
													@php($selected = 'selected')
												@endif
											@else
												@if($kelurahans->id_kelurahans == Request::old('kelurahans_id'))
													@php($selected = 'selected')
												@endif
											@endif
											<option value="{{$kelurahans->id_kelurahans}}" {{ $selected }}>{{$kelurahans->nama_kelurahans}}</option>
										@endforeach
									</select>
									{{General::pesanErrorForm($errors->first('kelurahans_id'))}}
								</div>
							</div>
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::perbarui()}}
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