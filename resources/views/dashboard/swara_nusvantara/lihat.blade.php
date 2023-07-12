@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-6">
							<strong>Nusvantara</strong>
						</div>
						<div class="col-sm-6">
							<div class="right-align">
								{{ General::tambah($link_swara_nusvantara,'dashboard/swara_nusvantara/tambah') }}
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="GET" action="{{ URL('dashboard/swara_nusvantara/cari') }}">
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
				    				@if(General::totalHakAkses($link_swara_nusvantara) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal Publikasi</th>
				    				<th class="nowrap">Judul</th>
				    				<th class="nowrap">Baca</th>
				    				<th class="nowrap">Komentar</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_swara_nusvantaras->isEmpty())
		            				@foreach($lihat_swara_nusvantaras as $swara_nusvantaras)
								    	<tr>
								    		@if(General::totalHakAkses($link_swara_nusvantara) != 0)
								    			<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-primary dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::edit($link_swara_nusvantara,'dashboard/swara_nusvantara/edit/'.$swara_nusvantaras->id_swara_nusvantaras)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_swara_nusvantara,'dashboard/swara_nusvantara/hapus/'.$swara_nusvantaras->id_swara_nusvantaras, $swara_nusvantaras->id_swara_nusvantaras.' - '.$swara_nusvantaras->judul_swara_nusvantaras)}}
										            	</div>
										            </div>
											    </td>
								    		@endif
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($swara_nusvantaras->tanggal_publikasi)}}</td>
								    		<td class="nowrap">{{$swara_nusvantaras->judul_swara_nusvantaras}}</td>
								    		<td class="nowrap">{{$swara_nusvantaras->total_baca_swara_nusvantaras}}</td>
								    		<td class="nowrap">{{$swara_nusvantaras->total_komentar_swara_nusvantaras}}</td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_swara_nusvantara) != 0)
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
				   	{{ $lihat_swara_nusvantaras->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection