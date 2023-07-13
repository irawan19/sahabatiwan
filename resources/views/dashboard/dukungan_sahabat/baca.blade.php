@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<strong>Baca Dukungan Sahabat</strong>
				</div>
				<div class="card-body">
					<table class="table table-responsive-sm table-sm table-striped">
						<tr>
							<th width="100px">Tanggal</th>
							<th width="1px">:</th>
							<td>{{General::ubahDBKeTanggalwaktu($baca_dukungan_sahabats->created_at)}}</td>
						</tr>
						<tr>
							<th>KTP</th>
							<th>:</th>
							<td>
                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$baca_dukungan_sahabats->ktp_dukungan_sahabats)}}">
                                    <img src="{{ URL::asset('storage/'.$baca_dukungan_sahabats->ktp_dukungan_sahabats) }}" width="108">
                                </a>
                            </td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td>{{$baca_dukungan_sahabats->nama_dukungan_sahabats}}</td>
						</tr>
						<tr>
							<th>Telepon</th>
							<th>:</th>
							<td>{{$baca_dukungan_sahabats->telepon_dukungan_sahabats}}</td>
						</tr>
						<tr>
							<th>NIK</th>
							<th>:</th>
							<td>{{$baca_dukungan_sahabats->nik_dukungan_sahabats}}</td>
						</tr>
					</table>
				</div>
				<div class="card-footer right-align">
				  	@if(request()->session()->get('halaman') != '')
		           		@php($ambil_kembali = request()->session()->get('halaman'))
	               	@else
	               		@php($ambil_kembali = URL('dashboard/dukungan_sahabat'))
	               	@endif
					{{General::kembali($ambil_kembali)}}
				</div>
			</div>
		</div>
	</div>

@endsection