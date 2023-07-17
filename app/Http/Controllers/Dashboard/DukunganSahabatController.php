<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Dukungan_sahabat;
use Storage;

class DukunganSahabatController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_dukungan_sahabat = 'dukungan_sahabat';
        if (General::hakAkses($link_dukungan_sahabat, 'lihat') == 'true') {
            $data['link_dukungan_sahabat']              = $link_dukungan_sahabat;
            $data['hasil_kata']                         = '';
            $url_sekarang                               = $request->fullUrl();
            $data['lihat_dukungan_sahabats']            = Dukungan_sahabat::orderBy('status_baca_dukungan_sahabats')
                                                                            ->orderBy('created_at')
                                                                            ->paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.dukungan_sahabat.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_dukungan_sahabat = 'dukungan_sahabat';
        if (General::hakAkses($link_dukungan_sahabat, 'lihat') == 'true') {
            $data['link_dukungan_sahabat']      = $link_dukungan_sahabat;
            $url_sekarang                       = $request->fullUrl();
            $hasil_kata                         = $request->cari_kata;
            $data['hasil_kata']                 = $hasil_kata;
            $data['lihat_dukungan_sahabats']    = Dukungan_sahabat::where('nama_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                    ->orWhere('telepon_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                    ->orWhere('jenis_kelamin_dukungan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                    ->orderBy('status_baca_dukungan_sahabats')
                                                                    ->orderBy('created_at')
                                                                    ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.dukungan_sahabat.lihat', $data);
        } else
            return redirect('dashboard/dukungan_sahabat');
    }

    public function baca($id_dukungan_sahabats=0)
    {
        $link_dukungan_sahabat = 'dukungan_sahabat';
        if (General::hakAkses($link_dukungan_sahabat, 'baca') == 'true') {
            $cek_dukungan_sahabats = Dukungan_sahabat::where('id_dukungan_sahabats',$id_dukungan_sahabats)->first();
            if(!empty($cek_dukungan_sahabats))
            {
                $data['link_dukungan_sahabat']       = $link_dukungan_sahabat;
                $data['baca_dukungan_sahabats']      = Dukungan_sahabat::join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                        ->join('master_kelurahans','dukungan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                        ->where('id_dukungan_sahabats',$id_dukungan_sahabats)
                                                                        ->first();
                $dukungan_sahabats_data = [
                    'status_baca_dukungan_sahabats'    => 1
                ];
                Dukungan_sahabat::where('id_dukungan_sahabats',$id_dukungan_sahabats)->update($dukungan_sahabats_data);
                return view('dashboard.dukungan_sahabat.baca',$data);
            }
            else
                return redirect('dashboard/dukungan_sahabat');
        } else
            return redirect('dashboard/dukungan_sahabat');
    }

    public function hapus($id_dukungan_sahabats=0)
    {
        $link_dukungan_sahabat = 'dukungan_sahabat';
        if (General::hakAkses($link_dukungan_sahabat, 'hapus') == 'true') {
            $cek_dukungan_sahabats = Dukungan_sahabat::where('id_dukungan_sahabats',$id_dukungan_sahabats)->first();
            if(!empty($cek_dukungan_sahabats))
            {
                Storage::disk('public')->delete($cek_dukungan_sahabats->file_dukungan_sahabats);
                Dukungan_sahabat::where('id_dukungan_sahabats',$id_dukungan_sahabats)->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/dukungan_sahabat');
        } else
            return redirect('dashboard/dukungan_sahabat');
    }

}