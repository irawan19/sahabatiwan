@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/kontak_kami/prosesedit') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Kontak Kami</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					    @endif
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar">Gambar  (540x467px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_kontak_kamis->gambar_kontak_kamis)}}">
							    	<img src="{{URL::asset('storage/'.$lihat_kontak_kamis->gambar_kontak_kamis)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_gambar" type="file" name="userfile_gambar">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_gambar'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="text1_kontak_kamis">Text 1 <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('text1_kontak_kamis')) }}" id="text1_kontak_kamis" type="text" name="text1_kontak_kamis" value="{{Request::old('text1_kontak_kamis') == '' ? $lihat_kontak_kamis->text1_kontak_kamis : Request::old('text1_kontak_kamis')}}">
							{{General::pesanErrorForm($errors->first('text1_kontak_kamis'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="text2_kontak_kamis">Text 2 <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('text2_kontak_kamis')) }}" id="text2_kontak_kamis" type="text" name="text2_kontak_kamis" value="{{Request::old('text2_kontak_kamis') == '' ? $lihat_kontak_kamis->text2_kontak_kamis : Request::old('text2_kontak_kamis')}}">
							{{General::pesanErrorForm($errors->first('text2_kontak_kamis'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="konten_kontak_kamis">Konten <b style="color:red">*</b></label>
							<textarea class="form-control {{ General::validForm($errors->first('konten_kontak_kamis')) }}" id="konten_kontak_kamis" name="konten_kontak_kamis" rows="5">{{Request::old('konten_kontak_kamis') == '' ? $lihat_kontak_kamis->konten_kontak_kamis : Request::old('konten_kontak_kamis')}}</textarea>
							{{General::pesanErrorForm($errors->first('konten_kontak_kamis'))}}
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