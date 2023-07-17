@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
				    <strong>Laporan Dukungan Sahabat</strong>
				</div>
				<div class="card-body">
                    <div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
				    		<thead>
				    			<tr>
				    				<th class="nowrap">Tanggal</th>
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
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($laporan_dukungan_sahabats->created_at)}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nik_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_provinsis}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_kota_kabupatens}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_kecamatans}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_kelurahans}}</td>
								    		<td class="nowrap">{!! $laporan_dukungan_sahabats->almaat_dukungan_sahabats !!}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->nama_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->telepon_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$laporan_dukungan_sahabats->jenis_kelamin_dukungan_sahabats}}</td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_laporan_dukungan_sahabat) != 0)
											<td colspan="6" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="5" class="center-align">Tidak ada data ditampilkan</td>
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

@endsection