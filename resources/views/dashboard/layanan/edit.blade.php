@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/layanan/prosesedit/'.$edit_layanans->id_layanans) }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Edit Layanan</strong>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar_layanan">Gambar (400x400px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$edit_layanans->gambar_layanans)}}">
							    	<img src="{{URL::asset('storage/'.$edit_layanans->gambar_layanans)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_gambar_layanan" type="file" name="userfile_gambar_layanan">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_gambar_layanan'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="judul_layanans">Judul <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('judul_layanans')) }}" id="judul_layanans" type="text" name="judul_layanans" value="{{Request::old('judul_layanans') == '' ? $edit_layanans->judul_layanans : Request::old('judul_layanans')}}">
							{{General::pesanErrorForm($errors->first('judul_layanans'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::perbarui()}}
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