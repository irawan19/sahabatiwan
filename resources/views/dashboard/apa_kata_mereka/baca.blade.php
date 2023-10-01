@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<strong>Baca Apa Kata Mereka</strong>
				</div>
				<div class="card-body">
					<table class="table table-responsive-sm table-sm table-striped">
						<tr>
							<th width="100px">Tanggal</th>
							<th width="1px">:</th>
							<td>{{General::ubahDBKeTanggalwaktu($baca_apa_kata_merekas->created_at)}}</td>
						</tr>
						<tr>
							<th>Foto</th>
							<th>:</th>
							<td>
                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$baca_apa_kata_merekas->foto_apa_kata_merekas)}}">
                                    <img src="{{ URL::asset('storage/'.$baca_apa_kata_merekas->foto_apa_kata_merekas) }}" width="108">
                                </a>
                            </td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>:</th>
							<td>{{$baca_apa_kata_merekas->nama_apa_kata_merekas}}</td>
						</tr>
						<tr>
							<th>Profesi</th>
							<th>:</th>
							<td>{{$baca_apa_kata_merekas->profesi_apa_kata_merekas}}</td>
						</tr>
						<tr>
							<th>Konten</th>
							<th>:</th>
							<td>{!! nl2br($baca_apa_kata_merekas->konten_apa_kata_merekas) !!}</td>
						</tr>
					</table>
				</div>
				<div class="card-footer right-align">
				  	@if(request()->session()->get('halaman') != '')
		           		@php($ambil_kembali = request()->session()->get('halaman'))
	               	@else
	               		@php($ambil_kembali = URL('dashboard/apa_kata_mereka'))
	               	@endif
					{{General::kembali($ambil_kembali)}}
				</div>
			</div>
		</div>
	</div>

@endsection