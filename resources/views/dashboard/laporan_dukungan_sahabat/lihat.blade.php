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
								{{General::cetak($link_laporan_dukungan_sahabat, 'laporan_dukungan_sahabat/cetak')}}
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
											<option value="{{$provinsis->id_provinsis}}" {{ Request::old('provinsis_id') == $provinsis->id_provinsis ? $select='selected' : $select='' }}>{{$provinsis->nama_provinsis}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kota_kabupatens_id">Kota / Kabupaten</label>
									<select class="form-control select2" id="kota_kabupatens_id" name="kota_kabupatens_id">
										
									</select>
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="nama_jenis_kelamins">Jenis Kelamin</label>
				                    <select class="form-control select2" id="nama_jenis_kelamins" name="nama_jenis_kelamins">
										    <option value="">Semua</option>
										    <option value="laki-laki">Laki-laki</option>
										    <option value="perempuan">Perempuan</option>
				                    </select>
		                      	</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="form-col-form-label" for="kecamatans_id">Kecamatan</label>
									<select class="form-control select2" id="kecamatans_id" name="kecamatans_id">
										
									</select>
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="kelurahans_id">Kelurahan</label>
									<select class="form-control select2" id="kelurahans_id" name="kelurahans_id">
										
									</select>
								</div>
								<div class="form-group">
									<label class="form-col-form-label" for="usia">Usia</label>
				                    <select class="form-control select2" id="usia" name="usia">
										<option value="">Semua</option>
											<option value="17-30">17 - 30</option>
											<option value="17-30">31- 40</option>
											<option value="17-30">41 - 50</option>
											<option value="17-30">51 - 60+</option>
				                    </select>
		                      	</div>
							</div>
							<div class="col-sm-12">
								<div class="input-group">
									<input class="form-control" id="input2-group2" type="text" name="cari_kata" placeholder="Cari" value="{{$hasil_kata}}">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="card">
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