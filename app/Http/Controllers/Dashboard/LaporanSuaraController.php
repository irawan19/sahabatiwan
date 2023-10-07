<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_provinsi;
use App\Models\Master_kelurahan;
use App\Exports\LaporanSuara;
use Maatwebsite\Excel\Facades\Excel;

class LaporanSuaraController extends AdminCoreController
{

    public function index(Request $request) {
        $link_laporan_suara = 'laporan_suara';
        if (General::hakAkses($link_laporan_suara, 'lihat') == 'true')
        {
            $data['link_laporan_suara']                 = $link_laporan_suara;
            $data['hasil_kata']                         = '';
            $data['hasil_provinsi']                     = 13;
            $data['hasil_kota_kabupaten']               = 187;
            $data['hasil_kecamatan']                    = '';
            $data['hasil_kelurahan']                    = '';
            $hasil_tahun                                = date('Y');
            $data['hasil_tahun']                        = $hasil_tahun;
            $url_sekarang                               = $request->fullUrl();
            $data['lihat_provinsis']                    = Master_provinsi::orderBy('nama_provinsis')
                                                                        ->get();
            $data['lihat_laporan_suaras']               = Master_kelurahan::selectRaw('
                                                                            nama_provinsis,
                                                                            nama_kota_kabupatens,
                                                                            nama_kecamatans,
                                                                            nama_kelurahans,
                                                                            IFNULL((
                                                                                SELECT jumlah_quick_counts
                                                                                FROM quick_counts
                                                                                WHERE kelurahans_id=master_kelurahans.id_kelurahans
                                                                                AND tahun_quick_counts='.$hasil_tahun.'
                                                                            ),0) AS jumlah_quick_counts,
                                                                            IFNULL((
                                                                                SELECT COUNT(*)
                                                                                FROM data_suaras
                                                                                WHERE kelurahans_id=master_kelurahans.id_kelurahans
                                                                                AND tahun_data_suaras='.$hasil_tahun.'
                                                                            ),0) AS jumlah_data_suaras
                                                                            ')
                                                                    ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                    ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                    ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                    ->where('kota_kabupatens_id',187)
                                                                    ->orderBy('nama_provinsis','asc')
                                                                    ->orderBy('nama_kota_kabupatens','asc')
                                                                    ->orderBy('nama_kecamatans','asc')
                                                                    ->orderBy('nama_kelurahans','asc')
                                                                    ->get();
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session()->forget('hasil_tahun');
            session()->forget('hasil_provinsi');
            session()->forget('hasil_kota_kabupaten');
            session()->forget('hasil_kecamatan');
            session()->forget('hasil_kelurahan');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.laporan_suara.lihat',$data);
        }
        else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_laporan_suara = 'laporan_suara';
        if (General::hakAkses($link_laporan_suara, 'lihat') == 'true') {
            $data['link_laporan_suara']      = $link_laporan_suara;
            $url_sekarang                    = $request->fullUrl();
            $hasil_kata                      = $request->cari_kata;
            $hasil_provinsi                  = $request->provinsis_id;
            $hasil_kota_kabupaten            = $request->kota_kabupatens_id;
            $hasil_kecamatan                 = $request->kecamatans_id;
            $hasil_kelurahan                 = $request->kelurahans_id;
            $hasil_tahun                     = $request->cari_tahun;
            $data['hasil_kata']              = $hasil_kata;
            $data['hasil_provinsi']          = $hasil_provinsi;
            $data['hasil_kota_kabupaten']    = $hasil_kota_kabupaten;
            $data['hasil_kecamatan']         = $hasil_kecamatan;
            $data['hasil_kelurahan']         = $hasil_kelurahan;
            $data['hasil_tahun']             = $hasil_tahun;
            
            $data['lihat_provinsis']         = Master_provinsi::orderBy('nama_provinsis')
                                                                ->get();

            $query_suaras                    = Master_kelurahan::selectRaw('
                                                                            nama_provinsis,
                                                                            nama_kota_kabupatens,
                                                                            nama_kecamatans,
                                                                            nama_kelurahans,
                                                                            IFNULL((
                                                                                SELECT jumlah_quick_counts
                                                                                FROM quick_counts
                                                                                WHERE kelurahans_id=master_kelurahans.id_kelurahans
                                                                                AND tahun_quick_counts='.$hasil_tahun.'
                                                                            ),0) AS jumlah_quick_counts,
                                                                            IFNULL((
                                                                                SELECT COUNT(*)
                                                                                FROM data_suaras
                                                                                WHERE kelurahans_id=master_kelurahans.id_kelurahans
                                                                                AND tahun_data_suaras='.$hasil_tahun.'
                                                                            ),0) AS jumlah_data_suaras
                                                                            ')
                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                        ->orderBy('nama_kelurahans','asc');
            
            if(!empty($hasil_provinsi))
            {
                $query_suaras                = $query_suaras->where('id_provinsis',$hasil_provinsi);
            }
            if(!empty($hasil_kota_kabupaten))
            {
                $query_suaras                = $query_suaras->where('id_kota_kabupatens',$hasil_kota_kabupaten);
            }
            if(!empty($hasil_kecamatan))
            {
                $query_suaras                = $query_suaras->where('id_kecamatans',$hasil_kecamatan);
            }
            if(!empty($hasil_kelurahan))
            {
                $query_suaras                = $query_suaras->where('id_kelurahans',$hasil_kelurahan);
            }
            
            $data['lihat_laporan_suaras']   = $query_suaras->get();

            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'           => $hasil_kata]);
            session(['hasil_provinsi'       => $hasil_provinsi]);
            session(['hasil_kota_kabupaten' => $hasil_kota_kabupaten]);
            session(['hasil_kecamatan'      => $hasil_kecamatan]);
            session(['hasil_kelurahan'      => $hasil_kelurahan]);
            session(['hasil_tahun'          => $hasil_tahun]);
            return view('dashboard.laporan_suara.lihat', $data);
        } else
            return redirect('dashboard/laporan_suara');
    }

    public function cetak()
    {
        $link_laporan_suara = 'laporan_suara';
        if(General::hakAkses($link_laporan_suara,'cetak') == 'true')
        {
            $tanggal = date('Y-m-d H:i:s');
            return Excel::download(new LaporanSuara, 'laporansuara_'.General::ubahDBKeTanggalwaktu($tanggal).'.xlsx');
        }
        else
            return redirect('dashboard/laporan_suara');
    }

}