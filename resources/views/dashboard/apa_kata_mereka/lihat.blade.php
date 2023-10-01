@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
				    <strong>Apa Kata Mereka</strong>
				</div>
				<div class="card-body">
					@if (Session::get('setelah_simpan.alert') == 'sukses')
						{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					@endif
					<form method="GET" action="{{ URL('dashboard/apa_kata_mereka/cari') }}">
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
									@if(General::totalHakAkses($link_apa_kata_mereka) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Profesi</th>
				    				<th class="nowrap">Status</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_apa_kata_merekas->isEmpty())
		            				@foreach($lihat_apa_kata_merekas as $apa_kata_merekas)
										@php($textbold = '')
										@if($apa_kata_merekas->status_baca_apa_kata_merekas == 0)
											@php($textbold = 'style=font-weight:bold')
										@endif
								    	<tr {{$textbold}}>
											@if(General::totalHakAkses($link_apa_kata_mereka) != 0)
					    						<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-success dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::baca($link_apa_kata_mereka,'dashboard/apa_kata_mereka/baca/'.$apa_kata_merekas->id_apa_kata_merekas)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_apa_kata_mereka,'dashboard/apa_kata_mereka/hapus/'.$apa_kata_merekas->id_apa_kata_merekas, $apa_kata_merekas->nama_apa_kata_merekas)}}
										            	</div>
										            </div>
											    </td>
									    	@endif
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($apa_kata_merekas->created_at)}}</td>
								    		<td class="nowrap">{{$apa_kata_merekas->nama_apa_kata_merekas}}</td>
								    		<td class="nowrap">{{$apa_kata_merekas->profesi_apa_kata_merekas}}</td>
								    		<td class="nowrap center-align">
												@if(General::hakAkses($link_apa_kata_mereka, 'edit') == 'true')
													@if($apa_kata_merekas->status_publikasi_apa_kata_merekas == 0)
														{{General::nonpublikasi($link_apa_kata_mereka, 'dashboard/apa_kata_mereka/publikasi/'.$apa_kata_merekas->id_apa_kata_merekas)}}
													@else
														{{General::publikasi($link_apa_kata_mereka, 'dashboard/apa_kata_mereka/publikasi/'.$apa_kata_merekas->id_apa_kata_merekas)}}
													@endif
												@else
													@if($apa_kata_merekas->status_publikasi_apa_kata_merekas == 0)
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
										@if(General::totalHakAkses($link_apa_kata_mereka) != 0)
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
				   	{{ $lihat_apa_kata_merekas->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection