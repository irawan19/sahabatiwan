<?php

namespace App\Exports;

use App\Models\Dukungan_sahabat;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\Queue\ShouldQueue;

class LaporanDukunganSahabat implements FromView, ShouldQueue
{
    use Exportable;
    public function view(): View
    {

        $hasil_kata = '';
        if(!empty(session('hasil_kata')))
            $hasil_kata                                 = session('hasil_kata');

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

        $hasil_jenis_kelamin = '';
        if(!empty(session('hasil_jenis_kelamin')))
            $hasil_jenis_kelamin                        = session('hasil_jenis_kelamin');

        $hasil_usia = '';
        if(!empty(session('hasil_usia')))
            $hasil_usia                                 = session('hasil_usia');

        if(!empty($hasil_usia))
        {
            $pecah_hasil_usia                       = explode('-',$hasil_usia);
            $usia_mulai                             = $pecah_hasil_usia[0];
            $usia_selesai                           = '';
            if(!empty($pecah_hasil_usia[1]))
                $usia_selesai                           = $pecah_hasil_usia[1];

            if(!empty($usia_selesai))
            {
                $query_dukungan_sahabats                    = Dukungan_sahabat::selectRaw('*,
                                                                        dukungan_sahabats.created_at as tanggal_daftar')
                                                                        ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                        ->where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) <= '. $usia_selesai)
                                                                        ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) <= '. $usia_selesai)
                                                                        ->orWhere('alamat_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) <= '. $usia_selesai)
                                                                        ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) <= '. $usia_selesai)
                                                                        ->orderBy('dukungan_sahabats.created_at')
                                                                        ->get();
            }
            else
            {
                $query_dukungan_sahabats                    = Dukungan_sahabat::selectRaw('*,
                                                                        dukungan_sahabats.created_at as tanggal_daftar')
                                                                        ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                        ->where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->orWhere('alamat_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->whereRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) >= '. $usia_mulai)
                                                                        ->orderBy('dukungan_sahabats.created_at')
                                                                        ->get();
            }
        }
        else
        {
            $query_dukungan_sahabats                    = Dukungan_sahabat::selectRaw('*,
                                                                        dukungan_sahabats.created_at as tanggal_daftar')
                                                                        ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                        ->where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->orWhere('alamat_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                        ->orderBy('dukungan_sahabats.created_at')
                                                                        ->get();
        }
        
        if(!empty($hasil_provinsi))
        {
            $query_dukungan_sahabats                = $query_dukungan_sahabats->where('provinsis_id',$hasil_provinsi);
        }
        if(!empty($hasil_kota_kabupaten))
        {
            $query_dukungan_sahabats                = $query_dukungan_sahabats->where('kota_kabupatens_id',$hasil_kota_kabupaten);
        }
        if(!empty($hasil_kecamatan))
        {
            $query_dukungan_sahabats                = $query_dukungan_sahabats->where('kecamatans_id',$hasil_kecamatan);
        }
        if(!empty($hasil_kelurahan))
        {
            $query_dukungan_sahabats                = $query_dukungan_sahabats->where('kelurahans_id',$hasil_kelurahan);
        }
        if(!empty($hasil_jenis_kelamin))
        {
            $query_dukungan_sahabats                = $query_dukungan_sahabats->where('jenis_kelamin_dukungan_sahabats',$hasil_jenis_kelamin);
        }

        $data['tanggal']                            = date('Y-m-d');
        $data['lihat_laporan_dukungan_sahabats']    = $query_dukungan_sahabats;
        return view('dashboard.laporan_dukungan_sahabat.cetakexcel',$data);
    }
}
