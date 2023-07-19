<table>
	<tr>
		<td colspan="10" style="font-weight: bold; text-align: center">Laporan Dukungan Sahabat</td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
	</tr>
	<tr>
		<td colspan="10" style="font-weight: bold; text-align: center">{{General::ubahDBKeTanggal($tanggal)}}</td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
		<td style="display:none"></td>
	</tr>
</table>
<table border="1px">
	<thead>
        <tr>
            <th>Tanggal</th>
		    <th>NIK</th>
		    <th>Provinsi</th>
		    <th>Kota/Kab</th>
		    <th>Kecamatan</th>
		    <th>Kelurahan</th>
		    <th>Alamat</th>
		    <th>Nama</th>
		    <th>Jenis Kelamin</th>
		    <th>Telepon</th>
	    </tr>
	</thead>
	<tbody>
		@if(!$lihat_laporan_dukungan_sahabats->isEmpty())
			@foreach($lihat_laporan_dukungan_sahabats as $laporan_dukungan_sahabats)
                <tr>
                    <td>{{General::ubahDBKeTanggalwaktu($laporan_dukungan_sahabats->tanggal_daftar)}}</td>
                    <td>'{{$laporan_dukungan_sahabats->nik_dukungan_sahabats}}</td>
                    <td>{{$laporan_dukungan_sahabats->nama_provinsis}}</td>
                    <td>{{$laporan_dukungan_sahabats->nama_kota_kabupatens}}</td>
                    <td>{{$laporan_dukungan_sahabats->nama_kecamatans}}</td>
                    <td>{{$laporan_dukungan_sahabats->nama_kelurahans}}</td>
                    <td>{!! $laporan_dukungan_sahabats->alamat_dukungan_sahabats !!}</td>
                    <td>{{$laporan_dukungan_sahabats->nama_dukungan_sahabats}}</td>
                    <td>{{$laporan_dukungan_sahabats->jenis_kelamin_dukungan_sahabats}}</td>
                    <td>'{{$laporan_dukungan_sahabats->telepon_dukungan_sahabats}}</td>
                </tr>
		    @endforeach
		@else
			<tr>
				<td colspan="10" align="right-align">Tidak ada data ditampilkan</td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
				<td style="display:none"></td>
			</tr>
		@endif
	</tbody>
</table>