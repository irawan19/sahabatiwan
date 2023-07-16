@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/program/prosesedit/'.$edit_programs->id_programs) }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Edit Program</strong>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar_program">Gambar (370x249px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$edit_programs->gambar_programs)}}">
							    	<img src="{{URL::asset('storage/'.$edit_programs->gambar_programs)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_gambar_program" type="file" name="userfile_gambar_program">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_gambar_program'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_icon_program">Gambar (64x64px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$edit_programs->icon_programs)}}">
							    	<img src="{{URL::asset('storage/'.$edit_programs->icon_programs)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_icon_program" type="file" name="userfile_icon_program">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_icon_program'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="nama_programs">Nama <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('nama_programs')) }}" id="nama_programs" type="text" name="nama_programs" value="{{Request::old('nama_programs') == '' ? $edit_programs->nama_programs : Request::old('nama_programs')}}">
							{{General::pesanErrorForm($errors->first('nama_programs'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="konten_programs">Konten <b style="color:red">*</b></label>
							<textarea class="form-control {{ General::validForm($errors->first('konten_programs')) }}" id="konten_programs" name="konten_programs" rows="5">{{Request::old('konten_programs') == '' ? $edit_programs->konten_programs : Request::old('konten_programs')}}</textarea>
							{{General::pesanErrorForm($errors->first('konten_programs'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/program'))
	                    @endif
						{{General::batal($ambil_kembali)}}
			        </div>
				</form>
			</div>
		</div>
	</div>

@endsection