@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<strong>Baca Laporan Sahabat</strong>
				</div>
				<div class="card-body">
					<table class="table table-responsive-sm table-sm table-striped">
						<tr>
							<th width="100px">Tanggal</th>
							<th width="1px">:</th>
							<td>{{General::ubahDBKeTanggalwaktu($baca_laporan_sahabats->created_at)}}</td>
						</tr>
						<tr>
							<th>File</th>
							<th>:</th>
							<td>
                                <a target="_blank" href="{{URL::asset('storage/'.$baca_laporan_sahabats->file_laporan_sahabats)}}">
                                    Klik untuk download file
                                </a>
                            </td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td>{{$baca_laporan_sahabats->nama_laporan_sahabats}}</td>
						</tr>
						<tr>
							<th>Telepon</th>
							<th>:</th>
							<td>{{$baca_laporan_sahabats->telepon_laporan_sahabats}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<th>:</th>
							<td>
                                <a href="mailto:{{$baca_laporan_sahabats->email_laporan_sahabats}}">
                                    {{$baca_laporan_sahabats->email_laporan_sahabats}}
                                </a>    
                            </td>
						</tr>
						<tr>
							<th>Provinsi</th>
							<th>:</th>
							<td>{{$baca_laporan_sahabats->nama_provinsis}}</td>
						</tr>
						<tr>
							<th>Kota/Kabupaten</th>
							<th>:</th>
							<td>{{$baca_laporan_sahabats->nama_kota_kabupatens}}</td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<th>:</th>
							<td>{{$baca_laporan_sahabats->nama_kecamatans}}</td>
						</tr>
						<tr>
							<th>Kelurahan</th>
							<th>:</th>
							<td>{{$baca_laporan_sahabats->nama_kelurahans}}</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<th>:</th>
							<td>{!! $baca_laporan_sahabats->alamat_laporan_sahabats !!}</td>
						</tr>
						<tr>
							<th>Aduan</th>
							<th>:</th>
							<td>{!! nl2br($baca_laporan_sahabats->aduan_laporan_sahabats) !!}</td>
						</tr>
					</table>
				</div>
				<div class="card-footer right-align">
				  	@if(request()->session()->get('halaman') != '')
		           		@php($ambil_kembali = request()->session()->get('halaman'))
	               	@else
	               		@php($ambil_kembali = URL('dashboard/laporan_sahabat'))
	               	@endif
					{{General::kembali($ambil_kembali)}}
				</div>
			</div>
		</div>
	</div>

@endsection