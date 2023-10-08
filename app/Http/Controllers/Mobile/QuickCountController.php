<?php
namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Quick_count;
use App\Models\Master_provinsi;
use Auth;

class QuickCountController extends MobileAdminController
{

    public function index(Request $request)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'tambah') == 'true')
        {
            $data['lihat_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                    ->get();
            return view('mobile.quick_count.lihat',$data);
        }
        else
            return redirect('mobile');
    }

    public function prosestambah(Request $request)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'tambah') == 'true')
        {
            $aturan = [
                'tahun_quick_counts'             => 'required',
                'kelurahans_id'                 => 'required',
                'tps_quick_counts'               => 'required',
                'rt_quick_counts'                => 'required',
                'rw_quick_counts'                => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'users_id'                      => Auth::user()->id,
                'tahun_quick_counts'             => $request->tahun_quick_counts,
                'kelurahans_id'                 => $request->kelurahans_id,
                'tps_quick_counts'               => $request->tps_quick_counts,
                'rt_quick_counts'                => $request->rt_quick_counts,
                'rw_quick_counts'                => $request->rw_quick_counts,
                'created_at'                    => date('Y-m-d H:i:s'),
            ];
            $cek_quick_counts = Quick_count::where('kelurahans_id',$request->kelurahans_id)
                                        ->where('tps_quick_counts',$request->tps_quick_counts)
                                        ->where('rt_quick_counts',$request->rt_quick_counts)
                                        ->where('rw_quick_counts',$request->rw_quick_counts)
                                        ->count();
            if($cek_quick_counts == 0) {
                Quick_count::insert($data);

                $setelah_simpan = [
                    'alert'  => 'sukses',
                    'text'   => 'Data berhasil ditambahkan',
                ];
                return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
            } else {
                $setelah_simpan = [
                    'alert'  => 'error',
                    'text'   => 'Data sudah ada di sistem',
                ];
                return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
            }
        }
        else
            return redirect('mobile/quick_count');
    }

}