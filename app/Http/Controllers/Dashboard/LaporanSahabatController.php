<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Laporan_sahabat;
use Storage;

class LaporanSahabatController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_laporan_sahabat = 'laporan_sahabat';
        if (General::hakAkses($link_laporan_sahabat, 'lihat') == 'true') {
            $data['link_laporan_sahabat']           = $link_laporan_sahabat;
            $data['hasil_kata']                     = '';
            $url_sekarang                           = $request->fullUrl();
            $data['lihat_laporan_sahabats']         = Laporan_sahabat::orderBy('status_baca_laporan_sahabats')
                                                                    ->orderBy('created_at')
                                                                    ->paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.laporan_sahabat.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_laporan_sahabat = 'laporan_sahabat';
        if (General::hakAkses($link_laporan_sahabat, 'lihat') == 'true') {
            $data['link_laporan_sahabat']   = $link_laporan_sahabat;
            $url_sekarang                   = $request->fullUrl();
            $hasil_kata                     = $request->cari_kata;
            $data['hasil_kata']             = $hasil_kata;
            $data['lihat_laporan_sahabats'] = Laporan_sahabat::where('nama_laporan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                ->orWhere('telepon_laporan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                ->orWhere('email_laporan_sahabats', 'LIKE', '%' . $hasil_kata . '%')
                                                                ->orderBy('status_baca_laporan_sahabats')
                                                                ->orderBy('created_at')
                                                                ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.laporan_sahabat.lihat', $data);
        } else
            return redirect('dashboard/laporan_sahabat');
    }

    public function baca($id_laporan_sahabats=0)
    {
        $link_laporan_sahabat = 'laporan_sahabat';
        if (General::hakAkses($link_laporan_sahabat, 'baca') == 'true') {
            $cek_laporan_sahabats = Laporan_sahabat::where('id_laporan_sahabats',$id_laporan_sahabats)->count();
            if($cek_laporan_sahabats != 0)
            {
                $data['link_laporan_sahabat']       = $link_laporan_sahabat;
                $data['baca_laporan_sahabats']      = Laporan_sahabat::join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                                    ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                                    ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                                    ->join('master_kelurahans','laporan_sahabats.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                                    ->where('id_laporan_sahabats',$id_laporan_sahabats)
                                                                    ->first();
                $laporan_sahabats_data = [
                    'status_baca_laporan_sahabats'    => 1
                ];
                Laporan_sahabat::where('id_laporan_sahabats',$id_laporan_sahabats)->update($laporan_sahabats_data);
                return view('dashboard.laporan_sahabat.baca',$data);
            }
            else
                return redirect('dashboard/laporan_sahabat');
        } else
            return redirect('dashboard/laporan_sahabat');
    }

    public function hapus($id_laporan_sahabats=0)
    {
        $link_laporan_sahabat = 'laporan_sahabat';
        if (General::hakAkses($link_laporan_sahabat, 'hapus') == 'true') {
            $cek_laporan_sahabats = Laporan_sahabat::where('id_laporan_sahabats',$id_laporan_sahabats)->first();
            if(!empty($cek_laporan_sahabats))
            {
                Storage::disk('public')->delete($cek_laporan_sahabats->file_laporan_sahabats);
                Laporan_sahabat::where('id_laporan_sahabats',$id_laporan_sahabats)->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/laporan_sahabat');
        } else
            return redirect('dashboard/laporan_sahabat');
    }

}