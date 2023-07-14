<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Komentar_swara_nusvantara;

class KomentarSwaraNusvantaraController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_komentar_swara_nusvantara = 'komentar_swara_nusvantara';
        if(General::hakAkses($link_komentar_swara_nusvantara,'lihat') == 'true')
        {
            $data['link_komentar_swara_nusvantara']         = $link_komentar_swara_nusvantara;
            $data['hasil_kata']                             = '';
            $url_sekarang                                   = $request->fullUrl();
        	$data['lihat_komentar_swara_nusvantaras']    	= Komentar_swara_nusvantara::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman'              => $url_sekarang]);
        	return view('dashboard.komentar_swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_komentar_swara_nusvantara = 'komentar_swara_nusvantara';
        if(General::hakAkses($link_komentar_swara_nusvantara,'lihat') == 'true')
        {
            $data['link_komentar_swara_nusvantara']         = $link_komentar_swara_nusvantara;
            $url_sekarang                                   = $request->fullUrl();
            $hasil_kata                                     = $request->cari_kata;
            $data['hasil_kata']                             = $hasil_kata;
            $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::where('nama_komentar_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                                ->paginate(10);
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'		    => $hasil_kata]);
            return view('dashboard.komentar_swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard/komentar_swara_nusvantara');
    }

}