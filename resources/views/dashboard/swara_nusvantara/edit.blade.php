@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/swara_nusvantara/prosesedit/'.$edit_swara_nusvantaras->id_swara_nusvantaras) }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Edit Swara Nusvantara</strong>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-col-form-label" for="kategori_swara_nusvantaras_id">Kategori <b style="color:red">*</b></label>
				            <select class="form-control select2" id="kategori_swara_nusvantaras_id" name="kategori_swara_nusvantaras_id">
				            	@foreach($edit_kategori_swara_nusvantaras as $kategori_swara_nusvantaras)
				            		@php($selected = '')
					                @if(Request::old('kategori_swara_nusvantaras_id') == '')
					                	@if($kategori_swara_nusvantaras->id_kategori_swara_nusvantaras == $edit_swara_nusvantaras->kategori_swara_nusvantaras_id)
					                		@php($selected = 'selected')
					                	@endif
					                @else
					                	@if($kategori_swara_nusvantaras->id_kategori_swara_nusvantaras == Request::old('kategori_swara_nusvantaras_id'))
					                		@php($selected = 'selected')
					                	@endif
					                @endif
								    <option value="{{$kategori_swara_nusvantaras->id_kategori_swara_nusvantaras}}" {{ $selected }}>{{$kategori_swara_nusvantaras->nama_kategori_swara_nusvantaras}}</option>
				            	@endforeach
				            </select>
		                </div>
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar_swara_nusvantaras">Gambar  (770x248px)</label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$edit_swara_nusvantaras->gambar_swara_nusvantaras)}}">
							    	<img src="{{URL::asset('storage/'.$edit_swara_nusvantaras->gambar_swara_nusvantaras)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_gambar_swara_nusvantaras" type="file" name="userfile_gambar_swara_nusvantaras">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_gambar_swara_nusvantaras'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="tanggal_publikasi_swara_nusvantaras">Tanggal Publikasi <b style="color:red">*</b></label>
							<input readonly class="form-control getDateTime {{ General::validForm($errors->first('tanggal_publikasi_swara_nusvantaras')) }}" id="tanggal_publikasi_swara_nusvantara" type="text" name="tanggal_publikasi_swara_nusvantaras" value="{{Request::old('tanggal_publikasi_swara_nusvantaras') == '' ? General::ubahDBKeTanggalwaktu($edit_swara_nusvantaras->tanggal_publikasi_swara_nusvantaras) : Request::old('tanggal_publikasi_swara_nusvantaras')}}">
							{{General::pesanErrorForm($errors->first('tanggal_publikasi_swara_nusvantaras'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="judul_swara_nusvantaras">Judul <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('judul_swara_nusvantaras')) }}" id="judul_swara_nusvantaras" type="text" name="judul_swara_nusvantaras" value="{{Request::old('judul_swara_nusvantaras') == '' ? $edit_swara_nusvantaras->judul_swara_nusvantaras : Request::old('judul_swara_nusvantaras')}}">
							{{General::pesanErrorForm($errors->first('judul_swara_nusvantaras'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="konten_swara_nusvantaras">Konten <b style="color:red">*</b></label>
							<textarea class="form-control {{ General::validForm($errors->first('konten_swara_nusvantaras')) }}" id="editor1" name="konten_swara_nusvantaras" rows="5">{{Request::old('konten_swara_nusvantaras') == '' ? $edit_swara_nusvantaras->konten_swara_nusvantaras : Request::old('konten_swara_nusvantaras')}}</textarea>
							{{General::pesanErrorForm($errors->first('konten_swara_nusvantaras'))}}
						</div>
			        <div class="card-footer right-align">
						{{General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/swara_nusvantara'))
	                    @endif
						{{General::batal($ambil_kembali)}}
			        </div>
				</form>
			</div>
		</div>
	</div>

@endsection