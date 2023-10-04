<table>
    <tr>
        <td colspan="10" style="font-weight: bold; text-align: center">Laporan Suara</td>
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
            <th class="nowrap">No</th>
            <th class="nowrap">No TPS</th>
            <th class="nowrap">RT</th>
            <th class="nowrap">RW</th>
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
        @php($no = 1)
        @foreach($lihat_laporan_suaras as $laporan_suaras)
        <tr>
            <td class="nowrap">{{$no}}</td>
            <td class="nowrap">{{$laporan_suaras->tps_quick_counts}}</td>
            <td class="nowrap">{{$laporan_suaras->rt_quick_counts}}</td>
            <td class="nowrap">{{$laporan_suaras->rw_quick_counts}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_provinsis}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_kota_kabupatens}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_kecamatans}}</td>
            <td class="nowrap">{{$laporan_suaras->nama_kelurahans}}</td>
            <td class="nowrap">{{$laporan_suaras->jumlah_quick_counts}}</td>
            <td class="nowrap">{{$laporan_suaras->jumlah_data_suaras}}</td>
        </tr>
        @php($no++)
        @endforeach
        @else
        <tr>
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
        </tr>
        @endif
    </tbody>
</table>
