@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/swara_nusvantara/prosestambah') }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Tambah Swara Nusvantara</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
					    	{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					    @endif
						<div class="form-group">
							<label class="form-col-form-label" for="kategori_swara_nusvantaras_id">Kategori <b style="color:red">*</b></label>
				            <select class="form-control select2" id="kategori_swara_nusvantaras_id" name="kategori_swara_nusvantaras_id">
				            	@foreach($tambah_kategori_swara_nusvantaras as $kategori_swara_nusvantaras)
								    <option value="{{$kategori_swara_nusvantaras->id_kategori_swara_nusvantaras}}" {{ Request::old('kategori_swara_nusvantaras_id') == $kategori_swara_nusvantaras->id_kategori_swara_nusvantaras ? $select='selected' : $select='' }}>{{$kategori_swara_nusvantaras->nama_kategori_swara_nusvantaras}}</option>
				            	@endforeach
				            </select>
		                </div>
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar_swara_nusvantara">Gambar (770x248px) <b style="color:red">*</b></label>
							<br/>
							<input id="userfile_gambar_swara_nusvantara" type="file" name="userfile_gambar_swara_nusvantara">
							{{General::pesanErrorForm($errors->first('userfile_gambar_swara_nusvantara'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="tanggal_publikasi_swara_nusvantara">Tanggal Publikasi <b style="color:red">*</b></label>
							<input readonly class="form-control getDate {{ General::validForm($errors->first('tanggal_publikasi_swara_nusvantara')) }}" id="tanggal_publikasi_swara_nusvantara" type="text" name="tanggal_publikasi_swara_nusvantara" value="{{Request::old('tanggal_publikasi_swara_nusvantara') == '' ? General::ubahDBKeTanggal(date('Y-m-d')) : Request::old('tanggal_publikasi_swara_nusvantara')}}">
							{{General::pesanErrorForm($errors->first('tanggal_publikasi_swara_nusvantara'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="judul_swara_nusvantaras">Judul <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('judul_swara_nusvantaras')) }}" id="judul_swara_nusvantaras" type="text" name="judul_swara_nusvantaras" value="{{Request::old('judul_swara_nusvantaras')}}">
							{{General::pesanErrorForm($errors->first('judul_swara_nusvantaras'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="konten_swara_nusvantaras">Konten <b style="color:red">*</b></label>
							<textarea class="form-control {{ General::validForm($errors->first('konten_swara_nusvantaras')) }}" id="editor1" name="konten_swara_nusvantaras" rows="5">{{Request::old('konten_swara_nusvantaras')}}</textarea>
							{{General::pesanErrorForm($errors->first('konten_swara_nusvantaras'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::simpan()}}
						{{General::simpankembali()}}
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