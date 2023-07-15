@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
				    <strong>Subscribe</strong>
				</div>
				<div class="card-body">
					@if (Session::get('setelah_simpan.alert') == 'sukses')
						{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					@endif
					<form method="GET" action="{{ URL('dashboard/subscribe/cari') }}">
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
									@if(General::totalHakAkses($link_subscribe) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">Email</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_subscribes->isEmpty())
		            				@foreach($lihat_subscribes as $subscribes)
								    	<tr>
											@if(General::totalHakAkses($link_subscribe) != 0)
					    						<td class="nowrap">
										            {{General::hapusButton($link_subscribe,'dashboard/subscribe/hapus/'.$subscribes->id_subscribes, $subscribes->nama_subscribes)}}
											    </td>
									    	@endif
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($subscribes->created_at)}}</td>
								    		<td class="nowrap">
                                                <a href="mailto:{{$subscribes->email_subscribes}}">
                                                    {{$subscribes->email_subscribes}}
                                                </a>
                                            </td>
								    	</tr>
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_subscribe) != 0)
											<td colspan="3" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="2" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
										@endif
									</tr>
								@endif
				    		</tbody>
				    	</table>
				    </div>
					<br/>
				   	{{ $lihat_subscribes->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection