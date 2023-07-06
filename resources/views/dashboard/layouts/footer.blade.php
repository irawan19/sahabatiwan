@php($ambil_konfigurasi_aplikasi = \App\Models\Master_konfigurasi_aplikasi::first())
<footer class="c-footer">
	<div class="ml-auto"><a href="{{URL('/')}}">{{$ambil_konfigurasi_aplikasi->nama_konfigurasi_aplikasis}}</a> © {{date('Y')}}</div>
</footer>