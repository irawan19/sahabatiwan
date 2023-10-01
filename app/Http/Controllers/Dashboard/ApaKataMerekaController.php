<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Apa_kata_mereka;
use Storage;

class ApaKataMerekaController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_apa_kata_mereka = 'apa_kata_mereka';
        if (General::hakAkses($link_apa_kata_mereka, 'lihat') == 'true') {
            $data['link_apa_kata_mereka'] = $link_apa_kata_mereka;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_apa_kata_merekas'] = Apa_kata_mereka::orderBy('status_baca_apa_kata_merekas')
                                                    ->orderBy('created_at')
                                                    ->paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.apa_kata_mereka.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_apa_kata_mereka = 'apa_kata_mereka';
        if (General::hakAkses($link_apa_kata_mereka, 'lihat') == 'true') {
            $data['link_apa_kata_mereka'] = $link_apa_kata_mereka;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_apa_kata_merekas'] = Apa_kata_mereka::where('nama_apa_kata_merekas', 'LIKE', '%' . $hasil_kata . '%')
                                                ->orWhere('profesi_apa_kata_merekas', 'LIKE', '%' . $hasil_kata . '%')
                                                ->orderBy('status_baca_apa_kata_merekas')
                                                ->orderBy('created_at')
                                                ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.apa_kata_mereka.lihat', $data);
        } else
            return redirect('dashboard/apa_kata_mereka');
    }

    public function publikasi($id_apa_kata_merekas=0)
    {
        $link_apa_kata_mereka = 'apa_kata_mereka';
        if (General::hakAkses($link_apa_kata_mereka, 'baca') == 'true') {
            $cek_apa_kata_merekas = Apa_kata_mereka::where('id_apa_kata_merekas',$id_apa_kata_merekas)->first();
            if(!empty($cek_apa_kata_merekas))
            {
                if($cek_apa_kata_merekas->status_publikasi_apa_kata_merekas == 0)
                    $status_publikasi_apa_kata_merekas = 1;
                else
                    $status_publikasi_apa_kata_merekas = 0;

                $apa_kata_mereka_data = [
                    'status_publikasi_apa_kata_merekas' => $status_publikasi_apa_kata_merekas,
                ];
                Apa_kata_mereka::where('id_apa_kata_merekas',$id_apa_kata_merekas)
                        ->update($apa_kata_mereka_data);
                return redirect('dashboard/apa_kata_mereka');
            }
            else
                return redirect('dashboard/apa_kata_mereka');
        } else
            return redirect('dashboard/apa_kata_mereka');
    }

    public function baca($id_apa_kata_merekas=0)
    {
        $link_apa_kata_mereka = 'apa_kata_mereka';
        if (General::hakAkses($link_apa_kata_mereka, 'baca') == 'true') {
            $cek_apa_kata_merekas = Apa_kata_mereka::where('id_apa_kata_merekas',$id_apa_kata_merekas)->first();
            if(!empty($cek_apa_kata_merekas))
            {
                $data['link_apa_kata_mereka']    = $link_apa_kata_mereka;
                $data['baca_apa_kata_merekas']    = $cek_apa_kata_merekas;
                $apa_kata_merekas_data = [
                    'status_baca_apa_kata_merekas'    => 1
                ];
                Apa_kata_mereka::where('id_apa_kata_merekas',$id_apa_kata_merekas)->update($apa_kata_merekas_data);
                return view('dashboard.apa_kata_mereka.baca',$data);
            }
            else
                return redirect('dashboard/apa_kata_mereka');
        } else
            return redirect('dashboard/apa_kata_mereka');
    }

    public function hapus($id_apa_kata_merekas=0)
    {
        $link_apa_kata_mereka = 'apa_kata_mereka';
        if (General::hakAkses($link_apa_kata_mereka, 'hapus') == 'true') {
            $cek_apa_kata_merekas = Apa_kata_mereka::where('id_apa_kata_merekas',$id_apa_kata_merekas)->first();
            if(!empty($cek_apa_kata_merekas))
            {
                Storage::disk('public')->delete($cek_apa_kata_merekas->foto_apa_kata_merekas);
                Apa_kata_mereka::where('id_apa_kata_merekas',$id_apa_kata_merekas)->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/apa_kata_mereka');
        } else
            return redirect('dashboard/apa_kata_mereka');
    }

}