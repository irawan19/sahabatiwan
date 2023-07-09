@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/profil/prosesedit') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Profil</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					    @endif
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_foto1">Foto 1  (453x559px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_profils->foto1_profils)}}">
							    	<img src="{{URL::asset('storage/'.$lihat_profils->foto1_profils)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_foto1" type="file" name="userfile_foto1">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_foto1'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_foto2">Foto 2  (273x309px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_profils->foto2_profils)}}">
							    	<img src="{{URL::asset('storage/'.$lihat_profils->foto2_profils)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_foto2" type="file" name="userfile_foto2">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_foto2'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="text1_profils">Text 1 <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('text1_profils')) }}" id="text1_profils" type="text" name="text1_profils" value="{{Request::old('text1_profils') == '' ? $lihat_profils->text1_profils : Request::old('text1_profils')}}">
							{{General::pesanErrorForm($errors->first('text1_profils'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="text2_profils">Text 2 <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('text2_profils')) }}" id="text2_profils" type="text" name="text2_profils" value="{{Request::old('text2_profils') == '' ? $lihat_profils->text2_profils : Request::old('text2_profils')}}">
							{{General::pesanErrorForm($errors->first('text2_profils'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="nama_profils">Nama <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('nama_profils')) }}" id="nama_profils" type="text" name="nama_profils" value="{{Request::old('nama_profils') == '' ? $lihat_profils->nama_profils : Request::old('nama_profils')}}">
							{{General::pesanErrorForm($errors->first('nama_profils'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="keterangan_nama_profils">Keterangan Nama <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('keterangan_nama_profils')) }}" id="keterangan_nama_profils" type="text" name="keterangan_nama_profils" value="{{Request::old('keterangan_nama_profils') == '' ? $lihat_profils->nama_profils : Request::old('keterangan_nama_profils')}}">
							{{General::pesanErrorForm($errors->first('keterangan_nama_profils'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="konten_profils">Konten <b style="color:red">*</b></label>
							<textarea class="form-control {{ General::validForm($errors->first('konten_profils')) }}" id="konten_profils" name="konten_profils" rows="5">{{Request::old('konten_profils') == '' ? $lihat_profils->konten_profils : Request::old('konten_profils')}}</textarea>
							{{General::pesanErrorForm($errors->first('konten_profils'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="url_youtube_profils">URL Youtube <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('url_youtube_profils')) }}" id="url_youtube_profils" type="text" name="url_youtube_profils" value="{{Request::old('url_youtube_profils') == '' ? $lihat_profils->url_youtube_profils : Request::old('url_youtube_profils')}}">
							{{General::pesanErrorForm($errors->first('url_youtube_profils'))}}
						</div>
					</div>
	                <div class="card-footer right-align">
						{{General::perbarui()}}
	                </div>
	            </form>
			</div>
		</div>
	</div>

@endsection