@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<strong>Baca Swara Nusvantara</strong>
				</div>
				<div class="card-body">
					<div class="center-align">
                        <a data-fancybox="gallery" href="{{URL::asset('storage/'.$baca_swara_nusvantaras->gambar_swara_nusvantaras)}}">
                            <img src="{{ URL::asset('storage/'.$baca_swara_nusvantaras->gambar_swara_nusvantaras) }}" width="108">
                        </a>
					</div>
					<hr/>
					<table class="table table-responsive-sm table-sm table-striped">
						<tr>
							<th width="150px">Tanggal</th>
							<th width="1px">:</th>
							<td>{{General::ubahDBKeTanggalwaktu($baca_swara_nusvantaras->tanggal_publikasi_swara_nusvantaras)}}</td>
						</tr>
						<tr>
							<th>Kategori</th>
							<th>:</th>
							<td>{{$baca_swara_nusvantaras->nama_kategori_swara_nusvantaras}}</td>
						</tr>
						<tr>
							<th>Judul</th>
							<th>:</th>
							<td>{{$baca_swara_nusvantaras->judul_swara_nusvantaras}}</td>
						</tr>
						<tr>
							<th>Konten</th>
							<th>:</th>
							<td>{!! $baca_swara_nusvantaras->konten_swara_nusvantaras !!}</td>
						</tr>
						<tr>
							<th>Total Baca</th>
							<th>:</th>
							<td>{{$baca_swara_nusvantaras->total_baca_swara_nusvantaras}}</td>
						</tr>
						<tr>
							<th>Total Komentar</th>
							<th>:</th>
							<td>{{$baca_swara_nusvantaras->total_komentar_swara_nusvantaras}}</td>
						</tr>
						<tr>
							<th>Dibuat</th>
							<th>:</th>
							<td>{{General::ubahDBKeTanggalwaktu($baca_swara_nusvantaras->tanggal_dibuat)}}</td>
						</tr>
						<tr>
							<th>Diperbarui</th>
							<th>:</th>
							<td>
                                @if(!empty($baca_swara_nusvantaras->tanggal_diperbarui))
                                    {{General::ubahDBKeTanggalwaktu($baca_swara_nusvantaras->tanggal_diperbarui)}}
                                @endif
                            </td>
						</tr>
					</table>
				</div>
				<div class="card-footer right-align">
				  	@if(request()->session()->get('halaman') != '')
		           		@php($ambil_kembali = request()->session()->get('halaman'))
	               	@else
	               		@php($ambil_kembali = URL('dashboard/swara_nusvantara'))
	               	@endif
					{{General::kembali($ambil_kembali)}}
				</div>
			</div>
		</div>
	</div>

@endsection