<?php
namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Data_suara;
use App\Models\Master_provinsi;
use Auth;

class DataSuaraController extends MobileAdminController
{
    public function index()
    {
        $data['lihat_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                ->get();
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        return view('data_suara',$data);
    }

    public function prosestambah(Request $request)
    {
        $aturan = [
            'nama_data_suaras'              => 'required',
            'tps_data_suaras'               => 'required',
            'rt_data_suaras'                => 'required',
            'rw_data_suaras'                => 'required',
            'kelurahans_id'                 => 'required',
        ];
        $this->validate($request, $aturan);

        $data_suaras_data = [
            'users_id'                        => Auth::user()->id,
            'kelurahans_id'                   => $request->kelurahans_id,
            'nama_data_suaras'                => $request->nama_data_suaras,
            'tps_data_suaras'                 => $request->tps_data_suaras,
            'rt_data_suaras'                  => $request->rt_data_suaras,
            'rw_data_suaras'                  => $request->rw_data_suaras,
            'created_at'                      => date('Y-m-d H:i:s'),
        ];
        Data_suara::insert($data_suaras_data);
        
        $setelah_simpan = [
            'alert'  => 'sukses',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

}