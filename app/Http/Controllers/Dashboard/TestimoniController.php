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
            $data['lihat_testimonis'] = Testimoni::orderBy('status_baca_testimonis')
                                                    ->orderBy('created_at')
                                                    ->paginate(10);
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
                                                ->orderBy('status_baca_testimonis')
                                                ->orderBy('created_at')
                                                ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.testimoni.lihat', $data);
        } else
            return redirect('dashboard/testimoni');
    }

    public function publikasi($id_testimonis=0)
    {
        $link_testimoni = 'testimoni';
        if (General::hakAkses($link_testimoni, 'baca') == 'true') {
            $cek_testimonis = Testimoni::where('id_testimonis',$id_testimonis)->first();
            if(!empty($cek_testimonis))
            {
                if($cek_testimonis->status_publikasi_testimonis == 0)
                    $status_publikasi_testimonis = 1;
                else
                    $status_publikasi_testimonis = 0;

                $testimoni_data = [
                    'status_publikasi_testimonis' => $status_publikasi_testimonis,
                ];
                Testimoni::where('id_testimonis',$id_testimonis)
                        ->update($testimoni_data);
                return redirect('dashboard/testimoni');
            }
            else
                return redirect('dashboard/testimoni');
        } else
            return redirect('dashboard/testimoni');
    }

    public function baca($id_testimonis=0)
    {
        $link_testimoni = 'testimoni';
        if (General::hakAkses($link_testimoni, 'baca') == 'true') {
            $cek_testimonis = Testimoni::where('id_testimonis',$id_testimonis)->first();
            if(!empty($cek_testimonis))
            {
                $data['link_testimoni']    = $link_testimoni;
                $data['baca_testimonis']    = $cek_testimonis;
                $testimonis_data = [
                    'status_baca_testimonis'    => 1
                ];
                Testimoni::where('id_testimonis',$id_testimonis)->update($testimonis_data);
                return view('dashboard.testimoni.baca',$data);
            }
            else
                return redirect('dashboard/testimoni');
        } else
            return redirect('dashboard/testimoni');
    }

}