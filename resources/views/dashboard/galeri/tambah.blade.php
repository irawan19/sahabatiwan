@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/galeri/prosestambah') }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Tambah Galeri</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
					    	{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					    @endif
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_foto_galeri">Foto (400x400px) <b style="color:red">*</b></label>
							<br/>
							<input id="userfile_foto_galeri" type="file" name="userfile_foto_galeri">
							{{General::pesanErrorForm($errors->first('userfile_foto_galeri'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="judul_galeris">Judul <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('judul_galeris')) }}" id="judul_galeris" type="text" name="judul_galeris" value="{{Request::old('judul_galeris')}}">
							{{General::pesanErrorForm($errors->first('judul_galeris'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::simpan()}}
						{{General::simpankembali()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/galeri'))
	                    @endif
						{{General::batal($ambil_kembali)}}
			        </div>
				</form>
			</div>
		</div>
	</div>

@endsection