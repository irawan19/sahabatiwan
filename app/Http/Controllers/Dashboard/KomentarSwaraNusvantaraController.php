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
        	$data['lihat_komentar_swara_nusvantaras']    	= Komentar_swara_nusvantara::selectRaw('*,
                                                                                                    komentar_swara_nusvantaras.created_at as tanggal_dibuat')
                                                                                        ->join('master_swara_nusvantaras','swara_nusvantaras_id','=','master_swara_nusvantaras.id_swara_nusvantaras')
                                                                                        ->paginate(10);
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
            $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::selectRaw('*,
                                                                                                    komentar_swara_nusvantaras.created_at as tanggal_dibuat')
                                                                                        ->join('master_swara_nusvantaras','swara_nusvantaras_id','=','master_swara_nusvantaras.id_swara_nusvantaras')
                                                                                        ->where('judul_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                        ->orwhere('nama_komentar_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                        ->orwhere('email_komentar_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                        ->orderBy('status_baca_komentar_swara_nusvantaras')
                                                                                        ->orderBy('created_at')
                                                                                        ->paginate(10);
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'		    => $hasil_kata]);
            return view('dashboard.komentar_swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard/komentar_swara_nusvantara');
    }
    public function publikasi($id_komentar_swara_nusvantaras=0)
    {
        $link_komentar_swara_nusvantara = 'komentar_swara_nusvantara';
        if (General::hakAkses($link_komentar_swara_nusvantara, 'baca') == 'true') {
            $cek_komentar_swara_nusvantaras = Komentar_swara_nusvantara::where('id_komentar_swara_nusvantaras',$id_komentar_swara_nusvantaras)->first();
            if(!empty($cek_komentar_swara_nusvantaras))
            {
                if($cek_komentar_swara_nusvantaras->status_publikasi_komentar_swara_nusvantaras == 0)
                    $status_publikasi_komentar_swara_nusvantaras = 1;
                else
                    $status_publikasi_komentar_swara_nusvantaras = 0;

                $komentar_swara_nusvantara_data = [
                    'status_publikasi_komentar_swara_nusvantaras' => $status_publikasi_komentar_swara_nusvantaras,
                ];
                Komentar_swara_nusvantara::where('id_komentar_swara_nusvantaras',$id_komentar_swara_nusvantaras)
                                        ->update($komentar_swara_nusvantara_data);
                return redirect('dashboard/komentar_swara_nusvantara');
            }
            else
                return redirect('dashboard/komentar_swara_nusvantara');
        } else
            return redirect('dashboard/komentar_swara_nusvantara');
    }

    public function baca($id_komentar_swara_nusvantaras=0)
    {
        $link_komentar_swara_nusvantara = 'komentar_swara_nusvantara';
        if (General::hakAkses($link_komentar_swara_nusvantara, 'baca') == 'true') {
            $cek_komentar_swara_nusvantaras = Komentar_swara_nusvantara::where('id_komentar_swara_nusvantaras',$id_komentar_swara_nusvantaras)->first();
            if(!empty($cek_komentar_swara_nusvantaras))
            {
                $data['link_komentar_swara_nusvantara']     = $link_komentar_swara_nusvantara;
                $data['baca_komentar_swara_nusvantaras']    = $cek_komentar_swara_nusvantaras;
                $komentar_swara_nusvantaras_data = [
                    'status_baca_komentar_swara_nusvantaras'    => 1
                ];
                Komentar_swara_nusvantara::where('id_komentar_swara_nusvantaras',$id_komentar_swara_nusvantaras)->update($komentar_swara_nusvantaras_data);
                return view('dashboard.komentar_swara_nusvantara.baca',$data);
            }
            else
                return redirect('dashboard/komentar_swara_nusvantara');
        } else
            return redirect('dashboard/komentar_swara_nusvantara');
    }

    public function hapus($id_komentar_swara_nusvantaras=0)
    {
        $link_komentar_swara_nusvantara = 'komentar_swara_nusvantara';
        if (General::hakAkses($link_komentar_swara_nusvantara, 'baca') == 'true') {
            $cek_komentar_swara_nusvantaras = Komentar_swara_nusvantara::where('id_komentar_swara_nusvantaras',$id_komentar_swara_nusvantaras)->first();
            if(!empty($cek_komentar_swara_nusvantaras))
            {
                Komentar_swara_nusvantara::where('id_komentar_swara_nusvantaras',$id_komentar_swara_nusvantaras)->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/komentar_swara_nusvantara');
        } else
            return redirect('dashboard/komentar_swara_nusvantara');
    }

}