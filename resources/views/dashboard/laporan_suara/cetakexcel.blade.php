<table>
    <tr>
        <td colspan="6" style="font-weight: bold; text-align: center">Laporan Suara</td>
        <td style="display:none"></td>
        <td style="display:none"></td>
        <td style="display:none"></td>
        <td style="display:none"></td>
        <td style="display:none"></td>
    </tr>
    <tr>
        <td colspan="6" style="font-weight: bold; text-align: center">{{General::ubahDBKeTanggal($tanggal)}}</td>
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
            <th class="nowrap">No</th>
            <th class="nowrap">Provinsi</th>
            <th class="nowrap">Kota/Kabupaten</th>
            <th class="nowrap">Kecamatan</th>
            <th class="nowrap">Kelurahan</th>
            <th class="nowrap">Jumlah Data Suara</th>
            <th class="nowrap">Jumlah Quick Count</th>
        </tr>
    </thead>
    <tbody>
        @if(!$lihat_laporan_suaras->isEmpty())
		@php($total_quick_counts = 0)
		@php($total_data_suaras = 0)
        @php($no = 1)
        @foreach($lihat_laporan_suaras as $laporan_suaras)
        <tr>
            <td class="nowrap">{{$no}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_provinsis}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_kota_kabupatens}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_kecamatans}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_kelurahans}}</td>
            <td class="nowrap">{{$laporan_suaras->jumlah_quick_counts}}</td>
            <td class="nowrap">{{$laporan_suaras->jumlah_data_suaras}}</td>
        </tr>
        @php($no++)
		@php($total_quick_counts += $laporan_suaras->jumlah_quick_counts)
		@php($total_data_suaras += $laporan_suaras->jumlah_data_suaras)
        @endforeach
        @else
        <tr>
            <td colspan="6" class="center-align">Tidak ada data ditampilkan</td>
            <td style="display:none"></td>
            <td style="display:none"></td>
            <td style="display:none"></td>
            <td style="display:none"></td>
            <td style="display:none"></td>
        </tr>
        @endif
    </tbody>
	<tfooter>
		<tr>
			<th colspan="5" class="center-align" style="font-size:16px">Total</th>
			<th class="right-align" style="font-size:16px">{{$total_quick_counts}}</th>
			<th class="right-align" style="font-size:16px">{{$total_data_suaras}}</th>
		</tr>
	</tfooter>
</table>
