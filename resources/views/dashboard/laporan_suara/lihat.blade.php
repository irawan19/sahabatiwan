@extends('dashboard.layouts.app')
@section('content')

    <div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form method="GET" action="{{ URL('dashboard/laporan_suara/cari') }}">
					@csrf
					<div class="card-header">
						<div class="row">
							<div class="col-sm-6">
								<strong>Laporan Suara</strong>
							</div>
							<div class="col-sm-6 right-align">
								{{General::cetak($link_laporan_suara, 'dashboard/laporan_suara/cetak')}}
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="form-col-form-label" for="provinsis_id">Provinsi</label>
									<select class="form-control select2" id="provinsis_id" name="provinsis_id">
										@foreach($lihat_provinsis as $provinsis)
											@php($selected = '')
					                        @if($hasil_provinsi == '')
					                        	@if($provinsis->id_provinsis == 13)
					                        		@php($selected = 'selected')
					                        	@endif
					                        @else
					                        	@if($provinsis->id_provinsis == $hasil_provinsi)
					                        		@php($selected = 'selected')
					                        	@endif
					                        @endif
											<option value="{{$provinsis->id_provinsis}}" {{ $selected }}>{{$provinsis->nama_provinsis}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kota_kabupatens_id">Kota / Kabupaten</label>
									<select class="form-control select2" id="kota_kabupatens_id" name="kota_kabupatens_id">
										@if($hasil_kota_kabupaten != '')
											<option value="{{$hasil_kota_kabupaten}}">
												@php($ambil_kota_kabupatens = \App\Models\Master_kota_kabupaten::where('id_kota_kabupatens',intval($hasil_kota_kabupaten))
																									->first())
												{{$ambil_kota_kabupatens->nama_kota_kabupatens}}
											</option>
										@endif
									</select>
								</div>
                            </div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="form-col-form-label" for="kecamatans_id">Kecamatan</label>
									<select class="form-control select2" id="kecamatans_id" name="kecamatans_id">
										@if($hasil_kecamatan != '')
                                            <option value="{{$hasil_kecamatan}}">
                                                @php($ambil_kecamatans = \App\Models\Master_kecamatan::where('id_kecamatans',intval($hasil_kecamatan))
                                                                                                    ->first())
                                                {{$ambil_kecamatans->nama_kecamatans}}
                                            </option>
                                        @endif
									</select>
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kelurahans_id">Kelurahan</label>
									<select class="form-control select2" id="kelurahans_id" name="kelurahans_id">
										@if($hasil_kelurahan != '')
                                            <option value="{{$hasil_kelurahan}}">
                                                @php($ambil_kelurahans = \App\Models\Master_kelurahan::where('id_kelurahans',intval($hasil_kelurahan))
                                                                                                    ->first())
                                                {{$ambil_kelurahans->nama_kelurahans}}
                                            </option>
                                        @endif
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<select class="form-control select2" id="cari_tahun" name="cari_tahun">
										@php($satu_tahun_sebelumnya = date('Y', strtotime('- 1 years')))
										@php($satu_tahun_selanjutnya = date('Y', strtotime('+ 1 years')))
										@for($tahun = $satu_tahun_sebelumnya; $tahun <= $satu_tahun_selanjutnya; $tahun++)
											@php($selected = '')
											@if(!empty($hasil_tahun))
												@if($tahun == $hasil_tahun)
													@php($selected = 'selected')
												@endif
											@else
												@if($tahun == Request::old('cari_tahun'))
													@php($selected = 'selected')
												@endif
											@endif
											<option value="{{$tahun}}" {{ $selected }}>{{$tahun}}</option>
										@endfor
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<input class="form-control" id="input2-group2" type="text" name="cari_kata" placeholder="Cari" value="{{$hasil_kata}}">
							</div>
						</div>
					</div>
					<div class="card-footer right-align">
						{{General::reset()}}
						{{General::pencarian()}}
					</div>
				</form>
			</div>
		</div>

		<div class="col-sm-12">
			<div class="card">
              	<div class="card-header">
					<strong>Data</strong>
              	</div>
				<div class="card-body">
                    <div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
				    		<thead>
				    			<tr>
				    				<th class="nowrap">No</th>
				    				<th class="nowrap">No TPS</th>
				    				<th class="nowrap">RT</th>
				    				<th class="nowrap">RW</th>
				    				<th class="nowrap">Provinsi</th>
				    				<th class="nowrap">Kota/Kabupaten</th>
				    				<th class="nowrap">Kecamatan</th>
				    				<th class="nowrap">Kelurahan</th>
				    				<th class="nowrap">Jumlah Data Suara</th>
				    				<th class="nowrap">Jumlah Quick Count</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_laporan_suaras->isEmpty())
									@php($no = 1)
		            				@foreach($lihat_laporan_suaras as $laporan_suaras)
								    	<tr>
								    		<td class="nowrap">{{$no}}</td>
								    		<td class="nowrap">{{$laporan_suaras->tps_quick_counts}}</td>
								    		<td class="nowrap">{{$laporan_suaras->rt_quick_counts}}</td>
								    		<td class="nowrap">{{$laporan_suaras->rw_quick_counts}}</td>
								    		<td class="nowrap">{{$laporan_suaras->nama_provinsis}}</td>
								    		<td class="nowrap">{{$laporan_suaras->nama_kota_kabupatens}}</td>
								    		<td class="nowrap">{{$laporan_suaras->nama_kecamatans}}</td>
								    		<td class="nowrap">{{$laporan_suaras->nama_kelurahans}}</td>
								    		<td class="nowrap">{{$laporan_suaras->jumlah_quick_counts}}</td>
								    		<td class="nowrap">{{$laporan_suaras->jumlah_data_suaras}}</td>
								    	</tr>
										@php($no++)
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_quick_count) != 0)
											<td colspan="10" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="9" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@endif
									</tr>
								@endif
				    		</tbody>
				    	</table>
				    </div>
				</div>
			</div>
		</div>
	</div>

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
							url: '{{URL("dashboard/wilayah/kota-kabupaten")}}/'+idprovinsis,
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
							url: '{{URL("dashboard/wilayah/kota-kabupaten")}}/'+idprovinsis,
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
							url: '{{URL("dashboard/wilayah/kecamatan")}}/'+idkotakabupatens,
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
							url: '{{URL("dashboard/wilayah/kecamatan")}}/'+idkotakabupatens,
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
							url: '{{URL("dashboard/wilayah/kelurahan")}}/'+idkecamatans,
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
							url: '{{URL("dashboard/wilayah/kelurahan")}}/'+idkecamatans,
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

			$('.resetbutton').on('click', function() {
				$('#provinsis_id').val(13).trigger('change');
				$('#kota_kabupatens_id').val('').trigger('change');
				$('#kecamatans_id').val('').trigger('change');
				$('#kelurahans_id').val('').trigger('change');
				$('#jenis_kelamin').val('').trigger('change');
				$('#usia').val('').trigger('change');
				$('#cari_kata').val('');
			});
		});
	</script>

@endsection