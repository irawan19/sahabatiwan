@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/konfigurasi_aplikasi/prosesedit') }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Konfigurasi Aplikasi</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					    @endif
						<div class="form-group">
							<label class="form-col-form-label" for="nama_konfigurasi_aplikasis">Nama <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('nama_konfigurasi_aplikasis')) }}" id="nama_konfigurasi_aplikasis" type="text" name="nama_konfigurasi_aplikasis" value="{{Request::old('nama_konfigurasi_aplikasis') == '' ? $lihat_konfigurasi_aplikasis->nama_konfigurasi_aplikasis : Request::old('nama_konfigurasi_aplikasis')}}">
							{{General::pesanErrorForm($errors->first('nama_konfigurasi_aplikasis'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="email_konfigurasi_aplikasis">Email <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('email_konfigurasi_aplikasis')) }}" id="email_konfigurasi_aplikasis" type="email" name="email_konfigurasi_aplikasis" value="{{Request::old('email_konfigurasi_aplikasis') == '' ? $lihat_konfigurasi_aplikasis->email_konfigurasi_aplikasis : Request::old('email_konfigurasi_aplikasis')}}">
							{{General::pesanErrorForm($errors->first('email_konfigurasi_aplikasis'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="telepon_konfigurasi_aplikasis">Telepon</label>
							<input class="form-control {{ General::validForm($errors->first('telepon_konfigurasi_aplikasis')) }}" id="telepon_konfigurasi_aplikasis" type="email" name="telepon_konfigurasi_aplikasis" value="{{Request::old('telepon_konfigurasi_aplikasis') == '' ? $lihat_konfigurasi_aplikasis->telepon_konfigurasi_aplikasis : Request::old('telepon_konfigurasi_aplikasis')}}">
							{{General::pesanErrorForm($errors->first('telepon_konfigurasi_aplikasis'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="deskripsi_konfigurasi_aplikasis">Deskripsi <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('deskripsi_konfigurasi_aplikasis')) }}" id="deskripsi_konfigurasi_aplikasis" type="text" name="deskripsi_konfigurasi_aplikasis" value="{{Request::old('deskripsi_konfigurasi_aplikasis') == '' ? $lihat_konfigurasi_aplikasis->deskripsi_konfigurasi_aplikasis : Request::old('deskripsi_konfigurasi_aplikasis')}}">
							{{General::pesanErrorForm($errors->first('deskripsi_konfigurasi_aplikasis'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="keywords_konfigurasi_aplikasis">Keywords <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('keywords_konfigurasi_aplikasis')) }}" id="keywords_konfigurasi_aplikasis" type="text" name="keywords_konfigurasi_aplikasis" value="{{Request::old('keywords_konfigurasi_aplikasis') == '' ? $lihat_konfigurasi_aplikasis->keywords_konfigurasi_aplikasis : Request::old('keywords_konfigurasi_aplikasis')}}">
							{{General::pesanErrorForm($errors->first('keywords_konfigurasi_aplikasis'))}}
						</div>
					</div>
	                <div class="card-footer right-align">
						{{General::perbarui()}}
	                </div>
	            </form>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/konfigurasi_aplikasi/proseseditlogo') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Logo</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan_logo.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan_logo.text')) }}
					    @endif
						<div class="form-group center-align">
							<a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}">
								<img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_konfigurasi_aplikasis)}}" width="108">
							</a>
						</div>
						<div class="form-group row">
	                        <div class="col-md-12 center-align">
	                          	<input id="userfile_logo" type="file" name="userfile_logo">
								{{General::pesanErrorFormFile($errors->first('userfile_logo'))}}
	                        </div>
	                    </div>
					</div>
	                <div class="card-footer right-align">
						{{General::perbarui()}}
	                </div>
				</form>
			</div>

			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/konfigurasi_aplikasi/prosesediticon') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Icon</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan_icon.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan_icon.text')) }}
					    @endif
						<div class="form-group center-align">
							<a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}">
								<img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->icon_konfigurasi_aplikasis)}}" width="50">
							</a>
						</div>
						<div class="form-group row">
	                        <div class="col-md-12 center-align">
	                          	<input id="userfile_icon" type="file" name="userfile_icon">
								{{General::pesanErrorFormFile($errors->first('userfile_icon'))}}
	                        </div>
	                    </div>
					</div>
	                <div class="card-footer right-align">
						{{General::perbarui()}}
	                </div>
				</form>
			</div>

			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/konfigurasi_aplikasi/proseseditlogotext') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Logo Text</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan_logo_text.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan_logo_text.text')) }}
					    @endif
						<div class="form-group center-align">
							<a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_text_konfigurasi_aplikasis)}}">
								<img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->logo_text_konfigurasi_aplikasis)}}" width="108">
							</a>
						</div>
						<div class="form-group row">
	                        <div class="col-md-12 center-align">
	                          	<input id="userfile_logo_text" type="file" name="userfile_logo_text">
								{{General::pesanErrorFormFile($errors->first('userfile_logo_text'))}}
	                        </div>
	                    </div>
					</div>
	                <div class="card-footer right-align">
						{{General::perbarui()}}
	                </div>
				</form>
			</div>

			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/konfigurasi_aplikasi/proseseditgambarsubscribe') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Gambar Subscribe</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan_gambar_subscribe.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan_gambar_subscribe.text')) }}
						@endif
						<div class="form-group center-align">
							<a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->gambar_subscribe_konfigurasi_aplikasis)}}">
								<img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->gambar_subscribe_konfigurasi_aplikasis)}}" width="256">
							</a>
						</div>
						<div class="form-group row">
							<div class="col-md-12 center-align">
								<label class="form-col-form-label" for="userfile_gambar_slideshow">732x562px</label>
								<br/>
								<input id="userfile_gambar_subscribe" type="file" name="userfile_gambar_subscribe">
								{{General::pesanErrorFormFile($errors->first('userfile_gambar_subscribe'))}}
							</div>
						</div>
					</div>
					<div class="card-footer right-align">
						{{General::perbarui()}}
					</div>
				</form>
			</div>

			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/konfigurasi_aplikasi/proseseditheader') }}" enctype="multipart/form-data" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Header</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan_header.alert') == 'sukses')
							{{ General::pesanSuksesForm(Session::get('setelah_simpan_header.text')) }}
						@endif
						<div class="form-group center-align">
							<a data-fancybox="gallery" href="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis)}}">
								<img src="{{URL::asset('storage/'.$lihat_konfigurasi_aplikasis->header_konfigurasi_aplikasis)}}" width="256">
							</a>
						</div>
						<div class="form-group row">
							<div class="col-md-12 center-align">
								<label class="form-col-form-label" for="userfile_gambar_slideshow">1894x381px</label>
								<br/>
								<input id="userfile_header" type="file" name="userfile_header">
								{{General::pesanErrorFormFile($errors->first('userfile_header'))}}
							</div>
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