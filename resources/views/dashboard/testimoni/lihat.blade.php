@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
				    <strong>Testimoni</strong>
				</div>
				<div class="card-body">
					@if (Session::get('setelah_simpan.alert') == 'sukses')
						{{ General::pesanSuksesForm(Session::get('setelah_simpan.text')) }}
					@endif
					<form method="GET" action="{{ URL('dashboard/testimoni/cari') }}">
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
									@if(General::totalHakAkses($link_testimoni) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">Tanggal</th>
				    				<th class="nowrap">Foto</th>
				    				<th class="nowrap">Nama</th>
				    				<th class="nowrap">Profesi</th>
				    				<th class="nowrap">Status</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_testimonis->isEmpty())
		            				@foreach($lihat_testimonis as $testimonis)
										@php($textbold = '')
										@if($testimonis->status_baca_testimonis == 0)
											@php($textbold = 'style=font-weight:bold')
										@endif
								    	<tr {{$textbold}}>
											@if(General::totalHakAkses($link_testimoni) != 0)
								    			<td class="nowrap">{{General::bacaButton($link_testimoni, 'dashboard/testimoni/baca/'.$testimonis->id_testimonis)}}</td>
								    		@endif
								    		<td class="nowrap">{{General::ubahDBKeTanggalwaktu($testimonis->created_at)}}</td>
								    		<td class="nowrap">
                                                <a data-fancybox="gallery" href="{{URL::asset('storage/'.$testimonis->foto_testimonis)}}">
                                                    <img src="{{ URL::asset('storage/'.$testimonis->foto_testimonis) }}" width="108">
                                                </a>
                                            </td>
								    		<td class="nowrap">{{$testimonis->nama_testimonis}}</td>
								    		<td class="nowrap">{{$testimonis->profesi_testimonis}}</td>
								    		<td class="nowrap center-align">
												@if(General::hakAkses($link_testimoni, 'edit') == 'true')
													@if($testimonis->status_publikasi_testimonis == 0)
														{{General::nonpublikasi($link_testimoni, 'dashboard/testimoni/publikasi/'.$testimonis->id_testimonis)}}
													@else
														{{General::publikasi($link_testimoni, 'dashboard/testimoni/publikasi/'.$testimonis->id_testimonis)}}
													@endif
												@else
													@if($testimonis->status_publikasi_testimonis == 0)
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
										@if(General::totalHakAkses($link_testimoni) != 0)
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
				   	{{ $lihat_testimonis->appends(Request::except('page'))->links('vendor.pagination.custom') }}
				</div>
			</div>
		</div>
	</div>

@endsection