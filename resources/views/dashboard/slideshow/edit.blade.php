@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<form class="form-horizontal m-t-40" enctype="multipart/form-data" action="{{ URL('dashboard/slideshow/prosesedit/'.$edit_slideshows->id_slideshows) }}" method="POST">
					{{ csrf_field() }}
					<div class="card-header">
						<strong>Edit Slideshow</strong>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-col-form-label" for="userfile_gambar_slideshow">Gambar  (1894x731px) <b style="color:red">*</b></label>
							<br/>
							<div class="form-group center-align">
							    <a data-fancybox="gallery" href="{{URL::asset('storage/'.$edit_slideshows->gambar_slideshows)}}">
							    	<img src="{{URL::asset('storage/'.$edit_slideshows->gambar_slideshows)}}" width="108">
							    </a>
							</div>
			                <input id="userfile_gambar_slideshow" type="file" name="userfile_gambar_slideshow">
			            </div>
						{{General::pesanErrorFormFile($errors->first('userfile_gambar_slideshow'))}}
						<div class="form-group">
							<label class="form-col-form-label" for="text1_slideshows">Text 1 <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('text1_slideshows')) }}" id="text1_slideshows" type="text" name="text1_slideshows" value="{{Request::old('text1_slideshows') == '' ? $edit_slideshows->text1_slideshows : Request::old('text1_slideshows')}}">
							{{General::pesanErrorForm($errors->first('text1_slideshows'))}}
						</div>
						<div class="form-group">
							<label class="form-col-form-label" for="text2_slideshows">Text 2 <b style="color:red">*</b></label>
							<input class="form-control {{ General::validForm($errors->first('text2_slideshows')) }}" id="text2_slideshows" type="text" name="text2_slideshows" value="{{Request::old('text2_slideshows') == '' ? $edit_slideshows->text2_slideshows : Request::old('text2_slideshows')}}">
							{{General::pesanErrorForm($errors->first('text2_slideshows'))}}
						</div>
					</div>
			        <div class="card-footer right-align">
						{{General::perbarui()}}
			          	@if(request()->session()->get('halaman') != '')
		            		@php($ambil_kembali = request()->session()->get('halaman'))
	                    @else
	                    	@php($ambil_kembali = URL('dashboard/slideshow'))
	                    @endif
						{{General::batal($ambil_kembali)}}
			        </div>
				</form>
			</div>
		</div>
	</div>

@endsection