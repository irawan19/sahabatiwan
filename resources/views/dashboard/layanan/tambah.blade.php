@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/layanan/prosestambah') }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Tambah Layanan</strong>
					</div>
					<div class="card-body">
						@if (Session::get('setelah_simpan.alert') == 'sukses')
					    	{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					    @endif
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar_layanan">Gambar (400x400px) <b style="color:red">*</b></label>
							<br/>
							<input id="userfile_gambar_layanan" type="file" name="userfile_gambar_layanan">
							{{General::pesanErrorForm($errors->first('userfile_gambar_layanan'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="nama_layanans">Nama <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('nama_layanans')) }}" id="nama_layanans" type="text" name="nama_layanans" value="{{Request::old('nama_layanans')}}">
							{{General::pesanErrorForm($errors->first('nama_layanans'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::simpan()}}
						{{General::simpankembali()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/layanan'))
	                    @endif
						{{General::batal($ambil_kembali)}}
			        </div>
				</form>
			</div>
		</div>
	</div>

@endsection