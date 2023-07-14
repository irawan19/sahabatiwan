@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<strong>Komentar Swara Nusvantara</strong>
				</div>
				<div class="card-body">
					<form method="GET" action="{{ URL('dashboard/komentar_swara_nusvantara/cari') }}">
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
				    				@if(General::totalHakAkses($link_komentar_swara_nusvantara) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">Judul</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Email</th>
				    				<th class="nowrap">Status</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_komentar_swara_nusvantaras->isEmpty())
		            				@foreach($lihat_komentar_swara_nusvantaras as $komentar_swara_nusvantaras)
								    	<tr>
								    		@if(General::totalHakAkses($link_komentar_swara_nusvantara) != 0)
								    			<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-primary dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::baca($link_komentar_swara_nusvantara,'dashboard/komentar_swara_nusvantara/baca/'.$komentar_swara_nusvantaras->id_komentar_swara_nusvantaras)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::edit($link_komentar_swara_nusvantara,'dashboard/komentar_swara_nusvantara/edit/'.$komentar_swara_nusvantaras->id_komentar_swara_nusvantaras)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_komentar_swara_nusvantara,'dashboard/komentar_swara_nusvantara/hapus/'.$komentar_swara_nusvantaras->id_komentar_swara_nusvantaras, $komentar_swara_nusvantaras->id_komentar_swara_nusvantaras.' - '.$komentar_swara_nusvantaras->nama_komentar_swara_nusvantaras)}}
										            	</div>
										            </div>
											    </td>
								    		@endif
								    		<td class="nowrap">{{$komentar_swara_nusvantaras->tanggal_dibuat}}</td>
								    		<td class="nowrap">{{$komentar_swara_nusvantaras->judul_swara_nusvantaras}}</td>
								    		<td class="nowrap">{{$komentar_swara_nusvantaras->nama_komentar_swara_nusvantaras}}</td>
								    		<td class="nowrap">
												@if(!empty($komentar_swara_nusvantaras->email_komentar_swara_nusvantara))
													<a href="mailto:{{$komentar_swara_nusvantaras->email_swara_nusvantaras}}">
														{{$komentar_swara_nusvantaras->email_komentar_swara_nusvantara}}
													</a>
												@endif
											</td>
								    		<td class="nowrap center-align">
												@if(General::hakAkses($link_komentar_swara_nusvantara, 'edit') == 'true')
													@if($komentar_swara_nusvantaras->status_publikasi_komentar_swara_nusvantaras == 0)
														{{General::nonpublikasi($link_komentar_swara_nusvantara, 'dashboard/komentar_swara_nusvantara/publikasi/'.$komentar_swara_nusvantaras->id_komentar_swara_nusvantaras)}}
													@else
														{{General::publikasi($link_komentar_swara_nusvantara, 'dashboard/komentar_swara_nusvantara/publikasi/'.$komentar_swara_nusvantaras->id_komentar_swara_nusvantaras)}}
													@endif
												@else
													@if($komentar_swara_nusvantaras->status_publikasi_komentar_swara_nusvantaras == 0)
														Belum Dipublikasi
													@else
														Pulbikasi
													@endif
												@endif
											</td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_komentar_swara_nusvantara) != 0)
											<td colspan="6" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="5" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
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
				   	{{ $lihat_komentar_swara_nusvantaras->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection