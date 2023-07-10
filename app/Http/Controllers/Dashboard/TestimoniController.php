<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Testimoni;
use Storage;

class TestimoniController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_testimoni = 'testimoni';
        if (General::hakAkses($link_testimoni, 'lihat') == 'true') {
            $data['link_testimoni'] = $link_testimoni;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_testimonis'] = Testimoni::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.testimoni.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_testimoni = 'testimoni';
        if (General::hakAkses($link_testimoni, 'lihat') == 'true') {
            $data['link_testimoni'] = $link_testimoni;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_testimonis'] = Testimoni::where('nama_testimonis', 'LIKE', '%' . $hasil_kata . '%')
                                                ->orWhere('profesi_testimonis', 'LIKE', '%' . $hasil_kata . '%')
                                                ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.testimoni.lihat', $data);
        } else
            return redirect('dashboard/testimoni');
    }

}