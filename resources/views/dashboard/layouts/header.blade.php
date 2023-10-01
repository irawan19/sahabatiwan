@php($ambil_level_sistems 			= \App\Models\Master_level_sistem::where('id_level_sistems',Auth::user()->level_sistems_id)
																	->first())
@php($tanggal_sekarang				= date('Y-m-d'))
<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
	<svg class="c-icon c-icon-lg">
		<use xlink:href="{{URL::asset('template/back/vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
	</svg>
</button>
<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
	<img class="c-header-brand-minimized c-d-dark-none" src="{{URL::asset('storage/'.$ambil_konfigurasi_aplikasis->logo_text_konfigurasi_aplikasis)}}" width="46" alt="{{$ambil_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}">
</a>
<b class="jam">{{General::ubahDBKeTanggal($tanggal_sekarang)}}, <onload="timeJavascript()" id="output"></b>
<ul class="c-header-nav ml-auto"></ul>
<ul class="c-header-nav">
	<li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
   	    @php($apa_kata_mereka 		= \App\Models\Apa_kata_mereka::where('status_baca_apa_kata_merekas',0)->count())
		@php($dukungan_sahabat 		= \App\Models\Dukungan_sahabat::where('status_baca_dukungan_sahabats',0)->count())
		@php($laporan_sahabat 		= \App\Models\Laporan_sahabat::where('status_baca_laporan_sahabats',0)->count())
		@php($komentar 				= \App\Models\Komentar_swara_nusvantara::where('status_baca_komentar_swara_nusvantaras',0)->count())
        @php($total_notifikasi 		= $apa_kata_mereka + $dukungan_sahabat + $laporan_sahabat + $komentar)
   		<svg class="c-icon">
   		  	<use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-bell')}}"></use>
   		</svg><span class="badge badge-pill badge-danger">{{$total_notifikasi}}</span></a>
   		<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0" style="width:250px">
   			<div class="dropdown-header bg-light">
   				<strong>
					@if($total_notifikasi == 0)
						Tidak ada notifikasi baru
					@else
						Ada {{$total_notifikasi}} notifikasi
					@endif
				</strong>
   			</div>
   			<a class="dropdown-item" href="{{URL('dashboard/apa_kata_mereka')}}">
		   		<svg class="c-icon mr-2 text-success">
		   		  	<use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-comment-square')}}"></use>
		   		</svg> Apa Kata Mereka <span class="badge badge-pill badge-danger">{{$apa_kata_mereka}}</span>
		   	</a>
   			<a class="dropdown-item" href="{{URL('dashboard/dukungan_sahabat')}}">
		   		<svg class="c-icon mr-2 text-success">
		   		  	<use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-info')}}"></use>
		   		</svg> Dukungan Sahabat <span class="badge badge-pill badge-danger">{{$dukungan_sahabat}}</span>
		   	</a>
   			<a class="dropdown-item" href="{{URL('dashboard/laporan_sahabat')}}">
		   		<svg class="c-icon mr-2 text-success">
		   		  	<use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-hand-point-up')}}"></use>
		   		</svg> Laporan Sahabat <span class="badge badge-pill badge-danger">{{$laporan_sahabat}}</span>
		   	</a>
   			<a class="dropdown-item" href="{{URL('dashboard/komentar')}}">
		   		<svg class="c-icon mr-2 text-success">
		   		  	<use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-comment-bubble')}}"></use>
		   		</svg> Komentar <span class="badge badge-pill badge-danger">{{$komentar}}</span>
		   	</a>
   		</div>
    </li>
	<li class="c-header-nav-item dropdown mr-3">
		<a class="c-header-nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	    	<div class="c-avatar">
	    		@if(Auth::user()->profile_photo_path == null)
		    		<img class="c-avatar-img" src="{{ Auth::user()->profile_photo_url }}" alt="{{Auth::user()->email}}">
		    	@else
		    		<img class="c-avatar-img" src="{{ URL::asset(Auth::user()->profile_photo_path) }}" alt="{{Auth::user()->email}}">
		    	@endif
	    	</div>&nbsp;&nbsp;<b class="namalogin">{{Auth::user()->name}}</b>
	  	</a>
		<div class="dropdown-menu dropdown-menu-right pt-0">
		  	<div class="dropdown-header py-2" style="background-color: #f7d20c; color: #fff">
		  		<strong>{{$ambil_level_sistems->nama_level_sistems}}</strong>
		  	</div>
		  	<div class="dropdown-header py-2" style="background-color: #edc20f; color: #fff">
		  		<strong>
			  		{{$ambil_konfigurasi_aplikasis->nama_konfigurasi_aplikasis}}
		  		</strong>
		  	</div>
		  	<div class="dropdown-header bg-light py-2">
		  		<strong>Konfigurasi</strong>
		  	</div>
		  	<a class="dropdown-item" href="{{URL('dashboard/konfigurasi_profil')}}">
		  	    <svg class="c-icon mr-2">
		  	      <use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-child')}}"></use>
		  	    </svg> Profil
		  	</a>
		  	<a class="dropdown-item" href="{{URL('dashboard/konfigurasi_akun')}}">
		  	    <svg class="c-icon mr-2">
		  	      <use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-contact')}}"></use>
		  	    </svg> Akun
		  	</a>
		  	<div class="dropdown-divider"></div>
			<a type="submit" class="dropdown-item" href="{{URL('dashboard/logout')}}">
			    <svg class="c-icon mr-2">
			      <use xlink:href="{{URL::asset('template/back/assets/icons/coreui/free.svg#cil-task')}}"></use>
			    </svg> Logout
			</a>
		</div>
	</li>
</ul>
<script type="text/javascript">
	window.setTimeout("timeJavascript()",1000);
    function timeJavascript()
	{     
        var dateNow = new Date().toLocaleTimeString("en-US",{timeZone: "Asia/Jakarta", hour12: false});
        setTimeout("timeJavascript()",1000);
        document.getElementById("output").innerHTML = dateNow;
	}
</script>