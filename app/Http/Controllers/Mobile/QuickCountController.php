<?php
namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Quick_count;
use App\Models\Master_provinsi;
use Auth;

class QuickCountController extends MobileAdminController
{
    public function index()
    {
        $data['lihat_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                ->get();
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        return view('quick_count',$data);
    }

    public function prosestambah(Request $request)
    {
        $aturan = [
            'tps_quick_counts'               => 'required',
            'rt_quick_counts'                => 'required',
            'rw_quick_counts'                => 'required',
            'kelurahans_id'                  => 'required',
            'jumlah_suara_quick_counts'      => 'required',
        ];
        $this->validate($request, $aturan);

        $quick_counts_data = [
            'users_id'                        => Auth::user()->id,
            'kelurahans_id'                   => $request->kelurahans_id,
            'nama_quick_counts'               => $request->nama_quick_counts,
            'tps_quick_counts'                => $request->tps_quick_counts,
            'rt_quick_counts'                 => $request->rt_quick_counts,
            'rw_quick_counts'                 => $request->rw_quick_counts,
            'jumlah_suara_quick_counts'       => $request->jumlah_suara_quick_counts,
            'created_at'                      => date('Y-m-d H:i:s'),
        ];
        Quick_count::insert($quick_counts_data);
        
        $setelah_simpan = [
            'alert'  => 'sukses',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

}