<?php

namespace App\Exports;

use App\Models\Quick_count;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;

class LaporanSuara implements FromView, ShouldQueue
{
    use Exportable;

    public function view(): View
    {
        $hasil_kata = '';
        if(!empty(session('hasil_kata')))
            $hasil_kata                                 = session('hasil_kata');

        $hasil_tahun = date('Y');
        if(!empty(session('hasil_tahun')))
            $hasil_tahun                                = session('hasil_tahun');

        $hasil_provinsi = '';
        if(!empty(session('hasil_provinsi')))
            $hasil_provinsi                             = session('hasil_provinsi');

        $hasil_kota_kabupaten = '';
        if(!empty(session('hasil_kota_kabupaten')))
            $hasil_kota_kabupaten                       = session('hasil_kota_kabupaten');

        $hasil_kecamatan = '';
        if(!empty(session('hasil_kecamatan')))
            $hasil_kecamatan                            = session('hasil_kecamatan');
        
        $hasil_kelurahan = '';
        if(!empty(session('hasil_kelurahan')))
            $hasil_kelurahan                            = session('hasil_kelurahan');

            $query_suaras                               = Quick_count::selectRaw('tps_quick_counts,
                                                                    rt_quick_counts,
                                                                    rw_quick_counts,
                                                                    nama_provinsis,
                                                                    nama_kota_kabupatens,
                                                                    nama_kecamatans,
                                                                    nama_kelurahans,
                                                                    jumlah_quick_counts,
                                                                    (
                                                                        SELECT COUNT(*)
                                                                        FROM data_suaras
                                                                        WHERE kelurahans_id=quick_counts.kelurahans_id
                                                                    ) AS jumlah_data_suaras
                                                                    ')
                                                        ->join('master_kelurahans','quick_counts.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                        ->join('users','quick_counts.users_id','=','users.id')
                                                        ->where('tps_quick_counts', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orWhere('rt_quick_counts', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orWhere('rw_quick_counts', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orderBy('suaras.created_at')
                                                        ->get();

        if(!empty($hasil_provinsi))
        {
        $query_suaras                = $query_suaras->where('provinsis_id',$hasil_provinsi);
        }
        if(!empty($hasil_kota_kabupaten))
        {
        $query_suaras                = $query_suaras->where('kota_kabupatens_id',$hasil_kota_kabupaten);
        }
        if(!empty($hasil_kecamatan))
        {
        $query_suaras                = $query_suaras->where('kecamatans_id',$hasil_kecamatan);
        }
        if(!empty($hasil_kelurahan))
        {
        $query_suaras                = $query_suaras->where('kelurahans_id',$hasil_kelurahan);
        }

        $data['lihat_laporan_suaras']   = $query_suaras;
        
        return view('dashboard.laporan_suara.cetakexcel',$data);
    }
}
