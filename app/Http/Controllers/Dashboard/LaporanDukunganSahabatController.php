<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Dukungan_sahabat;
use Storage;

class LaporanDukunganSahabatController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_laporan_dukungan_sahabat = 'laporan_dukungan_sahabat';
        if (General::hakAkses($link_laporan_dukungan_sahabat, 'lihat') == 'true') {
            $data['link_laporan_dukungan_sahabat']      = $link_laporan_dukungan_sahabat;
            $data['hasil_kata']                         = '';
            $url_sekarang                               = $request->fullUrl();
            $data['lihat_laporan_dukungan_sahabats']    = Dukungan_sahabat::orderBy('created_at')
                                                                            ->get();
            session()->forget('halaman');
            session()->forget('hasil_kata');
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
            $data['hasil_kata']                         = $hasil_kata;
            $data['lihat_laporan_dukungan_sahabats']    = Dukungan_sahabat::where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->orWhere('nik_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                            ->get();
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.laporan_dukungan_sahabat.lihat', $data);
        } else
            return redirect('dashboard/laporan_dukungan_sahabat');
    }
}