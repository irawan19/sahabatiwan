@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form method="GET" action="{{ URL('dashboard/laporan_dukungan_sahabat/cari') }}">
					@csrf
					<div class="card-header">
						<div class="row">
							<div class="col-sm-6">
								<strong>Laporan Dukungan Sahabat</strong>
							</div>
							<div class="col-sm-6 right-align">
								{{General::cetak($link_laporan_dukungan_sahabat, 'dashboard/laporan_dukungan_sahabat/cetak')}}
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
								<div class="form-group">
									<label class="form-col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
				                    <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin">
										@php($selected = '')
										@php($selected_laki = '')
										@php($selected_perempuan = '')
										@if($hasil_jenis_kelamin == 'Laki-laki')
											@php($selected = '')
											@php($selected_laki = 'selected')
											@php($selected_perempuan = '')
										@elseif($hasil_jenis_kelamin == 'Perempuan')
											@php($selected = '')
											@php($selected_laki = '')
											@php($selected_perempuan = 'selected')
										@else
											@php($selected = 'selected')
											@php($selected_laki = '')
											@php($selected_perempuan = '')
										@endif
										<option value="" {{$selected}}>Semua</option>
										<option value="Laki-laki" {{ $selected_laki }}>Laki-laki</option>
										<option value="Perempuan" {{ $selected_perempuan }}>Perempuan</option>
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
								<div class="form-group">
									<label class="form-col-form-label" for="usia">Usia</label>
				                    <select class="form-control select2" id="usia" name="usia">
										@php($selected = '')
										@php($selected1730 = '')
										@php($selected3140 = '')
										@php($selected4150 = '')
										@php($selected51 = '')
										@if($hasil_usia == '17-30')
											@php($selected = '')
											@php($selected1730 = 'selected')
											@php($selected3140 = '')
											@php($selected4150 = '')
											@php($selected51 = '')
										@elseif($hasil_usia == '31-40')
											@php($selected = '')
											@php($selected1730 = '')
											@php($selected3140 = 'selected')
											@php($selected4150 = '')
											@php($selected51 = '')
										@elseif($hasil_usia == '41-50')
											@php($selected = '')
											@php($selected1730 = '')
											@php($selected3140 = '')
											@php($selected4150 = 'selected')
											@php($selected51 = '')
										@elseif($hasil_usia == '51')
											@php($selected = '')
											@php($selected1730 = '')
											@php($selected3140 = '')
											@php($selected4150 = '')
											@php($selected51 = 'selected')
										@else
											@php($selected = 'selected')
											@php($selected1730 = '')
											@php($selected3140 = '')
										@endif
										<option value="" {{$selected}}>Semua</option>
										<option value="17-30" {{$selected1730}}>17 - 30</option>
										<option value="31-40" {{$selected3140}}>31- 40</option>
										<option value="41-50" {{$selected4150}}>41 - 50</option>
										<option value="51" {{$selected51}}>51 - 60+</option>
				                    </select>
		                      	</div>
							</div>
							<div class="col-sm-12">
								<div class="input-group">
									<input class="form-control" id="cari_kata" type="text" name="cari_kata" placeholder="Cari" value="{{$hasil_kata}}">
								</div>
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
					<strong>Wilayah</strong>
              	</div>
              	<div class="card-body">
                	<div class="c-chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  		<canvas id="canvaswilayah" width="745" height="372" style="display: block; width: 745px; height: 372px;" class="chartjs-render-monitor"></canvas>
                	</div>
              	</div>
            </div>
		</div>

		<div class="col-sm-6">
			<div class="card">
              	<div class="card-header">
					<strong>Jenis Kelamin</strong>
              	</div>
              	<div class="card-body">
                	<div class="c-chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  		<canvas id="canvasjeniskelamin" width="745" height="372" style="display: block; width: 745px; height: 372px;" class="chartjs-render-monitor"></canvas>
                	</div>
              	</div>
            </div>
		</div>

		<div class="col-sm-6">
			<div class="card">
              	<div class="card-header">
					<strong>Usia</strong>
              	</div>
              	<div class="card-body">
                	<div class="c-chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  		<canvas id="canvasusia" width="745" height="372" style="display: block; width: 745px; height: 372px;" class="chartjs-render-monitor"></canvas>
                	</div>
              	</div>
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
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">KTP</th>
				    				<th class="nowrap">NIK</th>
				    				<th class="nowrap">Provinsi</th>
				    				<th class="nowrap">Kota/Kab</th>
				    				<th class="nowrap">Kecamatan</th>
				    				<th class="nowrap">Kelurahan</th>
				    				<th class="nowrap">Alamat</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Jenis Kelamin</th>
				    				<th class="nowrap">Telepon</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_laporan_dukungan_sahabats->isEmpty())
		            				@foreach($lihat_laporan_dukungan_sahabats as $laporan_dukungan_sahabats)
								    	<tr>
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($laporan_dukungan_sahabats->tanggal_daftar)}}</td>
								    		<td class="nowrap">
												<a data-fancybox="gallery" href="{{URL::asset('storage/'.$laporan_dukungan_sahabats->ktp_dukungan_sahabats)}}">
													<img src="{{ URL::asset('storage/'.$laporan_dukungan_sahabats->ktp_dukungan_sahabats) }}" width="64">
												</a>
											</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nik_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_provinsis}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_kota_kabupatens}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_kecamatans}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_kelurahans}}</td>
								    		<td class="nowrap">{!! $laporan_dukungan_sahabats->alamat_dukungan_sahabats !!}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->jenis_kelamin_dukungan_sahabats}}</td>
								    		<td class="nowrap">
												<a href="tel:{{URL($laporan_dukungan_sahabats->telepon_dukungan_sahabats)}}">
													{{$laporan_dukungan_sahabats->telepon_dukungan_sahabats}}
												</a>
											</td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_laporan_dukungan_sahabat) != 0)
											<td colspan="12" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
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
											<td colspan="11" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
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

	@php($labelwilayah 		= [])
	@php($totalwilayah 		= [])
	@php($warnawilayah 		= [])
	@foreach($lihat_laporan_dukungan_sahabats_wilayah as $laporan_dukungan_sahabat)
		@php($labelwilayah[] 			= $laporan_dukungan_sahabat->nama_kelurahans.' : '.round($laporan_dukungan_sahabat->where('kelurahans_id',$laporan_dukungan_sahabat->id_kelurahans)->count() / $laporan_dukungan_sahabat->count(),2).' %')
		@php($totalwilayah[] 			= $laporan_dukungan_sahabat->where('kelurahans_id',$laporan_dukungan_sahabat->kelurahans_id)->count())
		@php($warnawilayah[] 			= General::randomWarna())
	@endforeach

	@php($labeljeniskelamin = [])
	@php($totaljeniskelamin = [])
	@php($warnajeniskelamin = [])
	@foreach($lihat_laporan_dukungan_sahabats_jenis_kelamin as $laporan_dukungan_sahabat)
		@php($labeljeniskelamin[] 		= $laporan_dukungan_sahabat->jenis_kelamin_dukungan_sahabats.' : '.round($laporan_dukungan_sahabat->where('jenis_kelamin_dukungan_sahabats',$laporan_dukungan_sahabat->jenis_kelamin_dukungan_sahabats)->count() / $laporan_dukungan_sahabat->count(),2).' %')
		@php($totaljeniskelamin[] 		= $laporan_dukungan_sahabat->where('jenis_kelamin_dukungan_sahabats',$laporan_dukungan_sahabat->jenis_kelamin_dukungan_sahabats)->count())
		@php($warnajeniskelamin[] 		= General::randomWarna())
	@endforeach

	@php($labelusia 		= [])
	@php($totalusia 		= [])
	@php($warnausia 		= [])
	@foreach($lihat_laporan_dukungan_sahabats_usia as $laporan_dukungan_sahabat)
		@php($labelusia[] 				= $laporan_dukungan_sahabat->usia.' tahun : '.round($laporan_dukungan_sahabat->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) = "'.$laporan_dukungan_sahabat->usia.'"')->count() / $laporan_dukungan_sahabat->count(),2).' %')
		@php($totalusia[] 				= $laporan_dukungan_sahabat->total)
		@php($warnausia[] 				= General::randomWarna())
	@endforeach
	<script src="{{URL::asset('template/back/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js')}}"></script>
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

			var laporanwilayah       = {
		        labels      : 	<?php print_r(json_encode($labelwilayah)); ?>,
		        datasets    : 	[{
			                        data : <?php print_r(json_encode($totalwilayah)); ?>,
			                        backgroundColor: <?php print_r(json_encode($warnawilayah)); ?>,
			                    }]
		    };
			var wilayahchart = new Chart(document.getElementById('canvaswilayah'), {
			type: 'doughnut',
			data: laporanwilayah,
			options: {
					responsive: true,
					legend: {
						display: true,
					}
				}
			});

			var laporanjeniskelamin       = {
		        labels      : 	<?php print_r(json_encode($labeljeniskelamin)); ?>,
		        datasets    : 	[{
			                        data : <?php print_r(json_encode($totaljeniskelamin)); ?>,
			                        backgroundColor: <?php print_r(json_encode($warnajeniskelamin)); ?>,
			                    }]
		    };
			var jeniskelaminchart = new Chart(document.getElementById('canvasjeniskelamin'), {
			type: 'doughnut',
			data: laporanjeniskelamin,
			options: {
					responsive: true,
					legend: {
						display: true,
					}
				}
			});

			var laporanusia       = {
		        labels      : 	<?php print_r(json_encode($labelusia)); ?>,
		        datasets    : 	[{
			                        data : <?php print_r(json_encode($totalusia)); ?>,
			                        backgroundColor: <?php print_r(json_encode($warnausia)); ?>,
			                    }]
		    };
			var usiachart = new Chart(document.getElementById('canvasusia'), {
			type: 'doughnut',
			data: laporanusia,
			options: {
					responsive: true,
					legend: {
						display: true,
					}
				}
			});
		});
	</script>

@endsection