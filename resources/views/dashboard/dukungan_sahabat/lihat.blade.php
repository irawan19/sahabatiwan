@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
				    <strong>Dukungan Sahabat</strong>
				</div>
				<div class="card-body">
					@if (Session::get('setelah_simpan.alert') == 'sukses')
						{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					@endif
					<form method="GET" action="{{ URL('dashboard/dukungan_sahabat/cari') }}">
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
									@if(General::totalHakAkses($link_dukungan_sahabat) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Telepon</th>
				    				<th class="nowrap">NIK</th>
				    				<th class="nowrap">Status</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_dukungan_sahabats->isEmpty())
		            				@foreach($lihat_dukungan_sahabats as $dukungan_sahabats)
										@php($textbold = '')
										@if($dukungan_sahabats->status_baca_dukungan_sahabats == 0)
											@php($textbold = 'style=font-weight:bold')
										@endif
								    	<tr {{$textbold}}>
											@if(General::totalHakAkses($link_dukungan_sahabat) != 0)
					    						<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-success dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::baca($link_dukungan_sahabat,'dashboard/dukungan_sahabat/baca/'.$dukungan_sahabats->id_dukungan_sahabats)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_dukungan_sahabat,'dashboard/dukungan_sahabat/hapus/'.$dukungan_sahabats->id_dukungan_sahabats, $dukungan_sahabats->nama_dukungan_sahabats)}}
										            	</div>
										            </div>
											    </td>
									    	@endif
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($dukungan_sahabats->created_at)}}</td>
								    		<td class="nowrap">{{$dukungan_sahabats->nama_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$dukungan_sahabats->telepon_dukungan_sahabats}}</td>
								    		<td class="nowrap">{{$dukungan_sahabats->nik_dukungan_sahabats}}</td>
								    		<td class="nowrap center-align">
												@if(General::hakAkses($link_dukungan_sahabat, 'edit') == 'true')
													@if($dukungan_sahabats->status_publikasi_dukungan_sahabats == 0)
														{{General::nonpublikasi($link_dukungan_sahabat, 'dashboard/dukungan_sahabat/publikasi/'.$dukungan_sahabats->id_dukungan_sahabats)}}
													@else
														{{General::publikasi($link_dukungan_sahabat, 'dashboard/dukungan_sahabat/publikasi/'.$dukungan_sahabats->id_dukungan_sahabats)}}
													@endif
												@else
													@if($dukungan_sahabats->status_publikasi_dukungan_sahabats == 0)
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
										@if(General::totalHakAkses($link_dukungan_sahabat) != 0)
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
				   	{{ $lihat_dukungan_sahabats->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection