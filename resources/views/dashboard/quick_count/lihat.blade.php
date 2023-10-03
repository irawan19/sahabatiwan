@extends('dashboard.layouts.app')
@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-6">
							<strong>Quick Count</strong>
						</div>
						<div class="col-sm-6">
							<div class="right-align">
								{{ General::tambah($link_quick_count,'dashboard/quick_count/tambah') }}
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="GET" action="{{ URL('dashboard/quick_count/cari') }}">
						@csrf
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<select class="form-control select2" id="cari_tahun" name="cari_tahun">
										@php($satu_tahun_sebelumnya = date('Y', strtotime('- 1 years')))
										@php($satu_tahun_selanjutnya = date('Y', strtotime('+ 1 years')))
										@for($tahun = $satu_tahun_sebelumnya; $tahun <= $satu_tahun_selanjutnya; $tahun++)
											@php($selected = '')
											@if(!empty($hasil_tahun))
												@if($tahun == $hasil_tahun)
													@php($selected = 'selected')
												@endif
											@else
												@if($tahun == Request::old('cari_tahun'))
													@php($selected = 'selected')
												@endif
											@endif
											<option value="{{$tahun}}" {{ $selected }}>{{$tahun}}</option>
										@endfor
									</select>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="input-group">
									<input class="form-control" id="input2-group2" type="text" name="cari_kata" placeholder="Cari" value="{{$hasil_kata}}">
									<span class="input-group-append">
										<button class="btn btn-primary" type="submit"> Cari</button>
									</span>
								</div>
							</div>
						</div>
	                </form>
	            	<br/>
	            	<div class="scrolltable">
                        <table id="tablesort" class="table table-responsive-sm table-bordered table-striped table-sm">
				    		<thead>
				    			<tr>
				    				@if(General::totalHakAkses($link_quick_count) != 0)
						    			<th width="5px"></th>
						    		@endif
				    				<th class="nowrap">No</th>
				    				<th class="nowrap">No TPS</th>
				    				<th class="nowrap">RT</th>
				    				<th class="nowrap">RW</th>
				    				<th class="nowrap">Provinsi</th>
				    				<th class="nowrap">Kota/Kabupaten</th>
				    				<th class="nowrap">Kecamatan</th>
				    				<th class="nowrap">Kelurahan</th>
				    				<th class="nowrap">Jumlah</th>
				    				<th class="nowrap">Diinput Oleh</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@if(!$lihat_quick_counts->isEmpty())
									@php($no = 1)
									@php($skipped = ($lihat_quick_counts->currentPage() - 1) * $lihat_quick_counts->perPage())
		            				@foreach($lihat_quick_counts as $quick_counts)
								    	<tr>
								    		@if(General::totalHakAkses($link_quick_count) != 0)
								    			<td class="nowrap">
											      	<div class="dropdown">
										            	<button class="btn btn-sm btn-primary dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
										            	<div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
										            		{{General::edit($link_quick_count,'dashboard/quick_count/edit/'.$quick_counts->id_quick_counts)}}
										            		<div class="dropdown-divider"></div>
										            		{{General::hapus($link_quick_count,'dashboard/quick_count/hapus/'.$quick_counts->id_quick_counts, $quick_counts->id_quick_counts.' - '.$quick_counts->nama_quick_counts)}}
										            	</div>
										            </div>
											    </td>
								    		@endif
								    		<td class="nowrap">{{$no}}</td>
								    		<td class="nowrap">{{$quick_counts->tps_quick_counts}}</td>
								    		<td class="nowrap">{{$quick_counts->rt_quick_counts}}</td>
								    		<td class="nowrap">{{$quick_counts->rw_quick_counts}}</td>
								    		<td class="nowrap">{{$quick_counts->nama_provinsis}}</td>
								    		<td class="nowrap">{{$quick_counts->nama_kota_kabupatens}}</td>
								    		<td class="nowrap">{{$quick_counts->nama_kecamatans}}</td>
								    		<td class="nowrap">{{$quick_counts->nama_kelurahans}}</td>
								    		<td class="nowrap">{{$quick_counts->jumlah_quick_counts}}</td>
								    		<td class="nowrap">{{$quick_counts->name}}</td>
								    	</tr>
										@php($no++)
								    @endforeach
								@else
									<tr>
										@if(General::totalHakAkses($link_quick_count) != 0)
											<td colspan="10" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
										@else
											<td colspan="9" class="center-align">Tidak ada data ditampilkan</td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
											<td style="display:none"></td>
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
					<div class="col-sm-12">
						{{ $lihat_quick_counts->appends(Request::except('page'))->links('vendor.pagination.custom') }}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection