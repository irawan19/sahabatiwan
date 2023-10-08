<?php
namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Data_suara;
use App\Models\Master_provinsi;
use Auth;

class DataSuaraController extends MobileAdminController
{

    public function index(Request $request)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'tambah') == 'true')
        {
            $data['lihat_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                    ->get();
            return view('mobile.data_suara.lihat',$data);
        }
        else
            return redirect('mobile');
    }

    public function prosestambah(Request $request)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'tambah') == 'true')
        {
            $aturan = [
                'tahun_data_suaras'             => 'required',
                'kelurahans_id'                 => 'required',
                'nama_data_suaras'              => 'required',
                'tps_data_suaras'               => 'required',
                'rt_data_suaras'                => 'required',
                'rw_data_suaras'                => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'users_id'                      => Auth::user()->id,
                'tahun_data_suaras'             => $request->tahun_data_suaras,
                'kelurahans_id'                 => $request->kelurahans_id,
                'nama_data_suaras'              => $request->nama_data_suaras,
                'tps_data_suaras'               => $request->tps_data_suaras,
                'rt_data_suaras'                => $request->rt_data_suaras,
                'rw_data_suaras'                => $request->rw_data_suaras,
                'created_at'                    => date('Y-m-d H:i:s'),
            ];
            $cek_data_suaras = Data_suara::where('kelurahans_id',$request->kelurahans_id)
                                        ->where('tps_data_suaras',$request->tps_data_suaras)
                                        ->where('rt_data_suaras',$request->rt_data_suaras)
                                        ->where('rw_data_suaras',$request->rw_data_suaras)
                                        ->where('nama_data_suaras',$request->nama_data_suaras)
                                        ->count();
            if($cek_data_suaras == 0) {
                Data_suara::insert($data);

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
            return redirect('mobile/data_suara');
    }

}