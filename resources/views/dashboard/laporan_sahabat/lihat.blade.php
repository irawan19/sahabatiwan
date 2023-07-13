@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
				    <strong>Laporan Sahabat</strong>
				</div>
				<div class="card-body">
					@if (Session::get('setelah_simpan.alert') == 'sukses')
						{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					@endif
					<form method="GET" action="{{ URL('dashboard/laporan_sahabat/cari') }}">
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
									@if(General::totalHakAkses($link_laporan_sahabat) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Telepon</th>
				    				<th class="nowrap">Email</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_laporan_sahabats->isEmpty())
		            				@foreach($lihat_laporan_sahabats as $laporan_sahabats)
										@php($textbold = '')
										@if($laporan_sahabats->status_baca_laporan_sahabats == 0)
											@php($textbold = 'style=font-weight:bold')
										@endif
								    	<tr {{$textbold}}>
											@if(General::totalHakAkses($link_laporan_sahabat) != 0)
					    						<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-success dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::baca($link_laporan_sahabat,'dashboard/laporan_sahabat/baca/'.$laporan_sahabats->id_laporan_sahabats)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_laporan_sahabat,'dashboard/laporan_sahabat/hapus/'.$laporan_sahabats->id_laporan_sahabats, $laporan_sahabats->nama_laporan_sahabats)}}
										            	</div>
										            </div>
											    </td>
									    	@endif
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($laporan_sahabats->created_at)}}</td>
								    		<td class="nowrap">{{$laporan_sahabats->nama_laporan_sahabats}}</td>
								    		<td class="nowrap">{{$laporan_sahabats->telepon_laporan_sahabats}}</td>
								    		<td class="nowrap">
                                                <a href="mailto:{{$laporan_sahabats->email_laporan_sahabats}}">
                                                    {{$laporan_sahabats->email_laporan_sahabats}}
                                                </a>
                                            </td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_laporan_sahabat) != 0)
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
				   	{{ $lihat_laporan_sahabats->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection