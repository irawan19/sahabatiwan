<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Data_suara;
use App\Models\Master_provinsi;
use App\Models\Master_kota_kabupaten;
use App\Models\Master_kecamatan;
use App\Models\Master_kelurahan;
use Auth;

class DataSuaraController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'lihat') == 'true')
        {
            $data['link_data_suara']        = $link_data_suara;
            $data['hasil_kata']             = '';
            $url_sekarang                   = $request->fullUrl();
            $hasil_tahun                    = date('Y');
            $data['hasil_tahun']            = $hasil_tahun;
        	$data['lihat_data_suaras']    	= Data_suara::join('master_kelurahans','data_suaras.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                        ->join('users','data_suaras.users_id','=','users.id')
                                                        ->where('tahun_data_suaras',$hasil_tahun)
                                                        ->orderBy('nama_provinsis','asc')
                                                        ->orderBy('nama_kota_kabupatens','asc')
                                                        ->orderBy('nama_kecamatans','asc')
                                                        ->orderBy('nama_kelurahans','asc')
                                                        ->paginate(25);
            
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session()->forget('hasil_tahun');
            session(['halaman'              => $url_sekarang]);
        	return view('dashboard.data_suara.lihat', $data);
        }
        else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'lihat') == 'true')
        {
            $data['link_data_suara']        = $link_data_suara;
            $url_sekarang                   = $request->fullUrl();
            $hasil_kata                     = $request->cari_kata;
            $data['hasil_kata']             = $hasil_kata;
            $hasil_tahun                    = $request->cari_tahun;
            $data['hasil_tahun']            = $hasil_tahun;
            $data['lihat_data_suaras']      = Data_suara::join('master_kelurahans','data_suaras.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                        ->join('users','data_suaras.users_id','=','users.id')
                                                        ->where('nama_data_suaras', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_data_suaras',$hasil_tahun)
                                                        ->orWhere('tps_data_suaras', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_data_suaras',$hasil_tahun)
                                                        ->orWhere('rt_data_suaras', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_data_suaras',$hasil_tahun)
                                                        ->orWhere('rw_data_suaras', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_data_suaras',$hasil_tahun)
                                                        ->orderBy('nama_provinsis','asc')
                                                        ->orderBy('nama_kota_kabupatens','asc')
                                                        ->orderBy('nama_kecamatans','asc')
                                                        ->orderBy('nama_kelurahans','asc')
                                                        ->paginate(25);
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'		    => $hasil_kata]);
            session(['hasil_tahun'          => $hasil_tahun]);
            return view('dashboard.data_suara.lihat', $data);
        }
        else
            return redirect('dashboard/data_suara');
    }

    public function tambah()
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'tambah') == 'true')
        {
            $data['tambah_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                    ->get();
            return view('dashboard.data_suara.tambah',$data);
        }
        else
            return redirect('dashboard/data_suara');
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
            Data_suara::insert($data);

            $simpan           = $request->simpan;
            $simpan_kembali   = $request->simpan_kembali;
            if($simpan)
            {
                $setelah_simpan = [
                    'alert'  => 'sukses',
                    'text'   => 'Data berhasil ditambahkan',
                ];
    	    	return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
            }
            if($simpan_kembali)
            {
                if(request()->session()->get('halaman') != '')
                    $redirect_halaman  = request()->session()->get('halaman');
                else
                    $redirect_halaman  = 'dashboard/data_suara';

                return redirect($redirect_halaman);
            }
        }
        else
            return redirect('dashboard/data_suara');
    }

    public function edit($id_data_suaras=0)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'edit') == 'true')
        {
            $cek_data_suaras = Data_suara::where('id_data_suaras',$id_data_suaras)->count();
            if($cek_data_suaras != 0)
            {
                $data['edit_provinsis']             = Master_provinsi::orderBy('nama_provinsis','asc')->get();
                $data['edit_kota_kabupatens']       = Master_kota_kabupaten::orderBy('nama_kota_kabupatens','asc')->get();
                $data['edit_kecamatans']            = Master_kecamatan::orderBy('nama_kecamatans','asc')->get();
                $data['edit_kelurahans']            = Master_kelurahan::orderBy('nama_kelurahans','asc')->get();
                $data['edit_data_suaras']           = Data_suara::join('master_kelurahans','data_suaras.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                            ->where('id_data_suaras',$id_data_suaras)
                                                            ->first();
                return view('dashboard.data_suara.edit',$data);
            }
            else
                return redirect('dashboard/data_suara');
        }
        else
            return redirect('dashboard/data_suara');
    }

    public function prosesedit($id_data_suaras=0, Request $request)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'edit') == 'true')
        {
            $cek_data_suaras = Data_suara::where('id_data_suaras',$id_data_suaras)->first();
            if(!empty($cek_data_suaras))
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
                    'updated_at'                    => date('Y-m-d H:i:s'),
                ];
                Data_suara::where('id_data_suaras', $id_data_suaras)
                                        ->update($data);

                if(request()->session()->get('halaman') != '')
                    $redirect_halaman    = request()->session()->get('halaman');
                else
                    $redirect_halaman  = 'dashboard/data_suara';
                
                return redirect($redirect_halaman);
            }
            else
                return redirect('dashboard/data_suara');
        }
        else
            return redirect('dashboard/data_suara');
    }

    public function hapus($id_data_suaras=0)
    {
        $link_data_suara = 'data_suara';
        if(General::hakAkses($link_data_suara,'hapus') == 'true')
        {
            $cek_data_suaras = Data_suara::where('id_data_suaras',$id_data_suaras)->first();
            if(!empty($cek_data_suaras))
            {
                Data_suara::where('id_data_suaras',$id_data_suaras)
                        ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/data_suara');
        }
        else
            return redirect('dashboard/data_suara');
    }

}