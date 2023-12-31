@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-6">
							<strong>Program</strong>
						</div>
						<div class="col-sm-6">
							<div class="right-align">
								{{ General::tambah($link_program,'dashboard/program/tambah') }}
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="GET" action="{{ URL('dashboard/program/cari') }}">
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
				    				@if(General::totalHakAkses($link_program) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Gambar</th>
				    				<th class="nowrap">Icon</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Konten</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_programs->isEmpty())
		            				@foreach($lihat_programs as $programs)
								    	<tr>
								    		@if(General::totalHakAkses($link_program) != 0)
								    			<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-primary dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::edit($link_program,'dashboard/program/edit/'.$programs->id_programs)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_program,'dashboard/program/hapus/'.$programs->id_programs, $programs->id_programs.' - '.$programs->nama_programs)}}
										            	</div>
										            </div>
											    </td>
								    		@endif
								    		<td class="nowrap">
                                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$programs->gambar_programs)}}">
                                                    <img src="{{ URL::asset('storage/'.$programs->gambar_programs) }}" width="108">
                                                </a>
                                            </td>
								    		<td class="nowrap">
                                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$programs->icon_programs)}}">
                                                    <img src="{{ URL::asset('storage/'.$programs->icon_programs) }}" width="64">
                                                </a>
                                            </td>
								    		<td class="nowrap">{{$programs->nama_programs}}</td>
								    		<td class="nowrap">{!! $programs->konten_programs !!}</td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_program) != 0)
											<td colspan="5" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="4" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@endif
									</tr>
								@endif
				    		</tbody>
				    	</table>
				    </div>
					<br/>
				   	{{ $lihat_programs->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection