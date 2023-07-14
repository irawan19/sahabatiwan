@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<strong>Baca Komentar Swara Nusvantara</strong>
				</div>
				<div class="card-body">
					<table class="table table-responsive-sm table-sm table-striped">
						<tr>
							<th width="100px">Tanggal</th>
							<th width="1px">:</th>
							<td>{{General::ubahDBKeTanggalwaktu($baca_komentar_swara_nusvantaras->created_at)}}</td>
						</tr>
						<tr>
							<th>Judul</th>
							<th>:</th>
							<td>{{$baca_komentar_swara_nusvantaras->judul_swara_nusvantaras}}</td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td>{{$baca_komentar_swara_nusvantaras->nama_komentar_swara_nusvantaras}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<th>:</th>
							<td>
								@if(!empty($baca_komentar_swara_nusvantaras->email_komentar_swara_nusvantara))
									<a href="mailto:{{$baca_komentar_swara_nusvantaras->email_swara_nusvantaras}}">
										{{$baca_komentar_swara_nusvantaras->email_komentar_swara_nusvantara}}
									</a>
								@endif
							</td>
						</tr>
						<tr>
							<th>Konten</th>
							<th>:</th>
							<td>{!! nl2br($baca_komentar_swara_nusvantaras->konten_komentar_swara_nusvantaras) !!}</td>
						</tr>
					</table>
				</div>
				<div class="card-footer right-align">
				  	@if(request()->session()->get('halaman') != '')
		           		@php($ambil_kembali = request()->session()->get('halaman'))
	               	@else
	               		@php($ambil_kembali = URL('dashboard/komentar_swara_nusvantara'))
	               	@endif
					{{General::kembali($ambil_kembali)}}
				</div>
			</div>
		</div>
	</div>

@endsection