@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-6">
							<strong>Slideshow</strong>
						</div>
						<div class="col-sm-6">
							<div class="right-align">
								{{ General::tambah($link_slideshow,'dashboard/slideshow/tambah') }}
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="GET" action="{{ URL('dashboard/slideshow/cari') }}">
						@csrf
	                	<div class="input-group">
	                		<input class="form-control" id="input2-group2" type="text" name="cari_kata" placeholder="Cari" value="{{$hasil_kata}}">
	                		<span class="input-group-append">
	                		  	<button class="btn btn-primary" type="submit"> Cari</button>
	                		</span>
	                	</div>
	                </form>
	            	<br/>
	            	<div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
				    		<thead>
				    			<tr>
				    				@if(General::totalHakAkses($link_slideshow) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Gambar</th>
				    				<th class="nowrap">Text 1</th>
				    				<th class="nowrap">Text 2</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_slideshows->isEmpty())
		            				@foreach($lihat_slideshows as $slideshows)
								    	<tr>
								    		@if(General::totalHakAkses($link_slideshow) != 0)
								    			<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-primary dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::edit($link_slideshow,'dashboard/slideshow/edit/'.$slideshows->id_slideshows)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_slideshow,'dashboard/slideshow/hapus/'.$slideshows->id_slideshows, $slideshows->id_slideshows.' - '.$slideshows->text_slideshows)}}
										            	</div>
										            </div>
											    </td>
								    		@endif
								    		<td class="nowrap">
                                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$slideshows->gambar_slideshows)}}">
                                                    <img src="{{ URL::asset('storage/'.$slideshows->gambar_slideshows) }}" width="108">
                                                </a>
                                            </td>
								    		<td class="nowrap">{{$slideshows->text1_slideshows}}</td>
								    		<td class="nowrap">{{$slideshows->text2_slideshows}}</td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_slideshow) != 0)
											<td colspan="4" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="3" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@endif
									</tr>
								@endif
				    		</tbody>
				    	</table>
				    </div>
					<br/>
				   	{{ $lihat_slideshows->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection