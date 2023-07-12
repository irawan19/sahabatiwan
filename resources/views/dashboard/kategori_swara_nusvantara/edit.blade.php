@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" action="{{ URL('dashboard/kategori_swara_nusvantara/prosesedit/'.$edit_kategori_swara_nusvantaras->id_kategori_swara_nusvantaras) }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Edit Kategori Swara Nusvantara</strong>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-col-form-label" for="nama_kategori_swara_nusvantaras">Nama <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('nama_kategori_swara_nusvantaras')) }}" id="nama_kategori_swara_nusvantaras" type="text" name="nama_kategori_swara_nusvantaras" value="{{Request::old('nama_kategori_swara_nusvantaras') == '' ? $edit_kategori_swara_nusvantaras->nama_kategori_swara_nusvantaras : Request::old('nama_kategori_swara_nusvantaras')}}">
							{{General::pesanErrorForm($errors->first('nama_kategori_swara_nusvantaras'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/kategori_swara_nusvantara'))
	                    @endif
						{{General::batal($ambil_kembali)}}
			        </div>
				</form>
			</div>
		</div>
	</div>

@endsection