<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Exports\LaporanDukunganSahabat;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Dukungan_sahabat;
use App\Models\Master_provinsi;

class LaporanDukunganSahabatController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_laporan_dukungan_sahabat = 'laporan_dukungan_sahabat';
        if (General::hakAkses($link_laporan_dukungan_sahabat, 'lihat') == 'true') {
            $data['link_laporan_dukungan_sahabat']      = $link_laporan_dukungan_sahabat;
            $data['hasil_kata']                         = '';
            $data['hasil_provinsi']                     = '';
            $data['hasil_kota_kabupaten']               = '';
            $data['hasil_kecamatan']                    = '';
            $data['hasil_kelurahan']                    = '';
            $data['hasil_usia']                         = '';
            $data['hasil_jenis_kelamin']                = '';
            $url_sekarang                               = $request->fullUrl();
            $data['lihat_provinsis']                    = Master_provinsi::orderBy('nama_provinsis')
                                                                        ->get();
            $data['lihat_laporan_dukungan_sahabats']    = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();

            $data['lihat_laporan_dukungan_sahabats_wilayah']    = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->groupBy('dukungan_sahabats.kelurahans_id')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();
            $data['lihat_laporan_dukungan_sahabats_jenis_kelamin']    = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->groupBy('dukungan_sahabats.jenis_kelamin_dukungan_sahabats')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();

            $data['lihat_laporan_dukungan_sahabats_usia']    = Dukungan_sahabat::selectRaw('*,
                                                                                            dukungan_sahabats.created_at as tanggal_daftar,
                                                                                            (YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) as usia')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->groupByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
                                                                            ->orderByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
                                                                            ->get();
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session()->forget('hasil_provinsi');
            session()->forget('hasil_kota_kabupaten');
            session()->forget('hasil_kecamatan');
            session()->forget('hasil_kelurahan');
            session()->forget('hasil_jenis_kelamins');
            session()->forget('hsdil_usia');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.laporan_dukungan_sahabat.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_laporan_dukungan_sahabat = 'laporan_dukungan_sahabat';
        if (General::hakAkses($link_laporan_dukungan_sahabat, 'lihat') == 'true') {
            $data['link_laporan_dukungan_sahabat']      = $link_laporan_dukungan_sahabat;
            $url_sekarang                               = $request->fullUrl();
            $hasil_kata                                 = $request->cari_kata;
            $hasil_provinsi                             = $request->provinsis_id;
            $hasil_kota_kabupaten                       = $request->kota_kabupatens_id;
            $hasil_kecamatan                            = $request->kecamatans_id;
            $hasil_kelurahan                            = $request->kelurahans_id;
            $hasil_jenis_kelamin                        = $request->jenis_kelamin;
            $hasil_usia                                 = $request->usia;
            $data['hasil_kata']                         = $hasil_kata;
            $data['hasil_provinsi']                     = $hasil_provinsi;
            $data['hasil_kota_kabupaten']               = $hasil_kota_kabupaten;
            $data['hasil_kecamatan']                    = $hasil_kecamatan;
            $data['hasil_kelurahan']                    = $hasil_kelurahan;
            $data['hasil_usia']                         = $hasil_usia;
            $data['hasil_jenis_kelamin']                = $hasil_jenis_kelamin;
            
            $data['lihat_provinsis']                    = Master_provinsi::orderBy('nama_provinsis')
                                                                        ->get();
            if(!empty($hasil_usia))
            {
                $pecah_hasil_usia                       = explode('-',$hasil_usia);
                $usia_mulai                             = $pecah_hasil_usia[0];
                $usia_selesai                           = '';
                if(!empty($pecah_hasil_usia[1]))
                    $usia_selesai                       = $pecah_hasil_usia[1];

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

                    $query_dukungan_sahabats_wilayah            = Dukungan_sahabat::selectRaw('*,
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
                                                                            ->groupBy('dukungan_sahabats.kelurahans_id')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();

                    $query_dukungan_sahabats_jenis_kelamin      = Dukungan_sahabat::selectRaw('*,
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
                                                                            ->groupBy('dukungan_sahabats.jenis_kelamin_dukungan_sahabats')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();
                    $query_dukungan_sahabats_usia               = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar,
                                                                            (YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) as usia')
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
                                                                            ->groupByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
                                                                            ->orderByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
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
                    
                    $query_dukungan_sahabats_wilayah            = Dukungan_sahabat::selectRaw('*,
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
                                                                            ->groupBy('dukungan_sahabats.kelurahans_id')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();

                    $query_dukungan_sahabats_jenis_kelamin      = Dukungan_sahabat::selectRaw('*,
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
                                                                            ->groupBy('dukungan_sahabats.jenis_kelamin_dukungan_sahabats')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();
                    $query_dukungan_sahabats_usia               = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar,
                                                                            (YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) as usia')
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
                                                                            ->groupByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
                                                                            ->orderByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
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

                $query_dukungan_sahabats_wilayah            = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('alamat_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->groupBy('dukungan_sahabats.kelurahans_id')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();
                $query_dukungan_sahabats_jenis_kelamin      = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('alamat_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->groupBy('dukungan_sahabats.jenis_kelamin_dukungan_sahabats')
                                                                            ->orderBy('dukungan_sahabats.created_at')
                                                                            ->get();
                    $query_dukungan_sahabats_usia               = Dukungan_sahabat::selectRaw('*,
                                                                            dukungan_sahabats.created_at as tanggal_daftar,
                                                                            (YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats)) as usia')
                                                                            ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                            ->where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('alamat_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->groupByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
                                                                            ->orderByRaw('(YEAR(CURDATE()) - YEAR(tanggal_lahir_dukungan_sahabats))')
                                                                            ->get();
            }
            
            if(!empty($hasil_provinsi))
            {
                $query_dukungan_sahabats                = $query_dukungan_sahabats->where('provinsis_id',$hasil_provinsi);
                $query_dukungan_sahabats_wilayah        = $query_dukungan_sahabats_wilayah->where('provinsis_id',$hasil_provinsi);
                $query_dukungan_sahabats_jenis_kelamin  = $query_dukungan_sahabats_jenis_kelamin->where('provinsis_id',$hasil_provinsi);
                $query_dukungan_sahabats_usia           = $query_dukungan_sahabats_usia->where('provinsis_id',$hasil_provinsi);
            }
            if(!empty($hasil_kota_kabupaten))
            {
                $query_dukungan_sahabats                = $query_dukungan_sahabats->where('kota_kabupatens_id',$hasil_kota_kabupaten);
                $query_dukungan_sahabats_wilayah        = $query_dukungan_sahabats_wilayah->where('kota_kabupatens_id',$hasil_kota_kabupaten);
                $query_dukungan_sahabats_jenis_kelamin  = $query_dukungan_sahabats_jenis_kelamin->where('kota_kabupatens_id',$hasil_kota_kabupaten);
                $query_dukungan_sahabats_usia           = $query_dukungan_sahabats_usia->where('kota_kabupatens_id',$hasil_kota_kabupaten);
            }
            if(!empty($hasil_kecamatan))
            {
                $query_dukungan_sahabats                = $query_dukungan_sahabats->where('kecamatans_id',$hasil_kecamatan);
                $query_dukungan_sahabats_wilayah        = $query_dukungan_sahabats_wilayah->where('kecamatans_id',$hasil_kecamatan);
                $query_dukungan_sahabats_jenis_kelamin  = $query_dukungan_sahabats_jenis_kelamin->where('kecamatans_id',$hasil_kecamatan);
                $query_dukungan_sahabats_usia           = $query_dukungan_sahabats_usia->where('kecamatans_id',$hasil_kecamatan);
            }
            if(!empty($hasil_kelurahan))
            {
                $query_dukungan_sahabats                = $query_dukungan_sahabats->where('kelurahans_id',$hasil_kelurahan);
                $query_dukungan_sahabats_wilayah        = $query_dukungan_sahabats_wilayah->where('kelurahans_id',$hasil_kelurahan);
                $query_dukungan_sahabats_jenis_kelamin  = $query_dukungan_sahabats_jenis_kelamin->where('kelurahans_id',$hasil_kelurahan);
                $query_dukungan_sahabats_usia           = $query_dukungan_sahabats_usia->where('kelurahans_id',$hasil_kelurahan);
            }
            if(!empty($hasil_jenis_kelamin))
            {
                $query_dukungan_sahabats                = $query_dukungan_sahabats->where('jenis_kelamin_dukungan_sahabats',$hasil_jenis_kelamin);
                $query_dukungan_sahabats_wilayah        = $query_dukungan_sahabats_wilayah->where('jenis_kelamin_dukungan_sahabats',$hasil_jenis_kelamin);
                $query_dukungan_sahabats_jenis_kelamin  = $query_dukungan_sahabats_jenis_kelamin->where('jenis_kelamin_dukungan_sahabats',$hasil_jenis_kelamin);
                $query_dukungan_sahabats_usia           = $query_dukungan_sahabats_usia->where('jenis_kelamin_dukungan_sahabats',$hasil_jenis_kelamin);
            }
            
            $data['lihat_laporan_dukungan_sahabats']                    = $query_dukungan_sahabats;
            $data['lihat_laporan_dukungan_sahabats_wilayah']            = $query_dukungan_sahabats_wilayah;
            $data['lihat_laporan_dukungan_sahabats_jenis_kelamin']      = $query_dukungan_sahabats_jenis_kelamin;
            $data['lihat_laporan_dukungan_sahabats_usia']               = $query_dukungan_sahabats_usia;
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'           => $hasil_kata]);
            session(['hasil_provinsi'       => $hasil_provinsi]);
            session(['hasil_kota_kabupaten' => $hasil_kota_kabupaten]);
            session(['hasil_kecamatan'      => $hasil_kecamatan]);
            session(['hasil_kelurahan'      => $hasil_kelurahan]);
            session(['hasil_jenis_kelamin'  => $hasil_jenis_kelamin]);
            session(['hasil_usia'           => $hasil_usia]);
            return view('dashboard.laporan_dukungan_sahabat.lihat', $data);
        } else
            return redirect('dashboard/laporan_dukungan_sahabat');
    }

    public function cetak()
    {
        $link_laporan_dukungan_sahabat = 'laporan_dukungan_sahabat';
        if(General::hakAkses($link_laporan_dukungan_sahabat,'cetak') == 'true')
        {
            $tanggal = date('Y-m-d H:i:s');
            return Excel::download(new LaporanDukunganSahabat, 'laporandukungansahabat_'.General::ubahDBKeTanggalwaktu($tanggal).'.xlsx');
        }
        else
            return redirect('dashboard/laporan_dukungan_sahabat');
    }
}