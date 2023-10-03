<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Quick_count;
use App\Models\Master_provinsi;
use App\Models\Master_kota_kabupaten;
use App\Models\Master_kecamatan;
use App\Models\Master_kelurahan;
use Auth;

class QuickCountController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'lihat') == 'true')
        {
            $data['link_quick_count']        = $link_quick_count;
            $data['hasil_kata']             = '';
            $url_sekarang                   = $request->fullUrl();
            $hasil_tahun                    = date('Y');
            $data['hasil_tahun']            = $hasil_tahun;
        	$data['lihat_quick_counts']    	= Quick_count::join('master_kelurahans','quick_counts.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                        ->join('users','quick_counts.users_id','=','users.id')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orderBy('nama_provinsis','asc')
                                                        ->orderBy('nama_kota_kabupatens','asc')
                                                        ->orderBy('nama_kecamatans','asc')
                                                        ->orderBy('nama_kelurahans','asc')
                                                        ->paginate(25);
            
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session()->forget('hasil_tahun');
            session(['halaman'              => $url_sekarang]);
        	return view('dashboard.quick_count.lihat', $data);
        }
        else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'lihat') == 'true')
        {
            $data['link_quick_count']        = $link_quick_count;
            $url_sekarang                   = $request->fullUrl();
            $hasil_kata                     = $request->cari_kata;
            $data['hasil_kata']             = $hasil_kata;
            $hasil_tahun                    = $request->cari_tahun;
            $data['hasil_tahun']            = $hasil_tahun;
            $data['lihat_quick_counts']      = Quick_count::join('master_kelurahans','quick_counts.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                        ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                        ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                        ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                        ->join('users','quick_counts.users_id','=','users.id')
                                                        ->where('tps_quick_counts', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orWhere('rt_quick_counts', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orWhere('rw_quick_counts', 'LIKE', '%'.$hasil_kata.'%')
                                                        ->where('tahun_quick_counts',$hasil_tahun)
                                                        ->orderBy('nama_provinsis','asc')
                                                        ->orderBy('nama_kota_kabupatens','asc')
                                                        ->orderBy('nama_kecamatans','asc')
                                                        ->orderBy('nama_kelurahans','asc')
                                                        ->paginate(25);
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'		    => $hasil_kata]);
            session(['hasil_tahun'          => $hasil_tahun]);
            return view('dashboard.quick_count.lihat', $data);
        }
        else
            return redirect('dashboard/quick_count');
    }

    public function tambah()
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'tambah') == 'true')
        {
            $data['tambah_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                    ->get();
            return view('dashboard.quick_count.tambah',$data);
        }
        else
            return redirect('dashboard/quick_count');
    }

    public function prosestambah(Request $request)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'tambah') == 'true')
        {
            $aturan = [
                'tahun_quick_counts'             => 'required',
                'kelurahans_id'                  => 'required',
                'tps_quick_counts'               => 'required',
                'rt_quick_counts'                => 'required',
                'rw_quick_counts'                => 'required',
                'jumlah_quick_counts'            => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'users_id'                      => Auth::user()->id,
                'tahun_quick_counts'            => $request->tahun_quick_counts,
                'kelurahans_id'                 => $request->kelurahans_id,
                'tps_quick_counts'              => $request->tps_quick_counts,
                'rt_quick_counts'               => $request->rt_quick_counts,
                'rw_quick_counts'               => $request->rw_quick_counts,
                'jumlah_quick_counts'           => $request->jumlah_quick_counts,
                'created_at'                    => date('Y-m-d H:i:s'),
            ];
            Quick_count::insert($data);

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
                    $redirect_halaman  = 'dashboard/quick_count';

                return redirect($redirect_halaman);
            }
        }
        else
            return redirect('dashboard/quick_count');
    }

    public function edit($id_quick_counts=0)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'edit') == 'true')
        {
            $cek_quick_counts = Quick_count::where('id_quick_counts',$id_quick_counts)->count();
            if($cek_quick_counts != 0)
            {
                $data['edit_provinsis']             = Master_provinsi::orderBy('nama_provinsis','asc')->get();
                $data['edit_kota_kabupatens']       = Master_kota_kabupaten::orderBy('nama_kota_kabupatens','asc')->get();
                $data['edit_kecamatans']            = Master_kecamatan::orderBy('nama_kecamatans','asc')->get();
                $data['edit_kelurahans']            = Master_kelurahan::orderBy('nama_kelurahans','asc')->get();
                $data['edit_quick_counts']           = Quick_count::join('master_kelurahans','quick_counts.kelurahans_id','=','master_kelurahans.id_kelurahans')
                                                            ->join('master_kecamatans','master_kelurahans.kecamatans_id','master_kecamatans.id_kecamatans')
                                                            ->join('master_kota_kabupatens','master_kecamatans.kota_kabupatens_id','master_kota_kabupatens.id_kota_kabupatens')
                                                            ->join('master_provinsis','master_kota_kabupatens.provinsis_id','=','master_provinsis.id_provinsis')
                                                            ->where('id_quick_counts',$id_quick_counts)
                                                            ->first();
                return view('dashboard.quick_count.edit',$data);
            }
            else
                return redirect('dashboard/quick_count');
        }
        else
            return redirect('dashboard/quick_count');
    }

    public function prosesedit($id_quick_counts=0, Request $request)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'edit') == 'true')
        {
            $cek_quick_counts = Quick_count::where('id_quick_counts',$id_quick_counts)->first();
            if(!empty($cek_quick_counts))
            {
                $aturan = [
                    'tahun_quick_counts'             => 'required',
                    'kelurahans_id'                  => 'required',
                    'tps_quick_counts'               => 'required',
                    'rt_quick_counts'                => 'required',
                    'rw_quick_counts'                => 'required',
                    'jumlah_quick_counts'            => 'required',
                ];
                $this->validate($request, $aturan);
    
                $data = [
                    'users_id'                      => Auth::user()->id,
                    'tahun_quick_counts'            => $request->tahun_quick_counts,
                    'kelurahans_id'                 => $request->kelurahans_id,
                    'tps_quick_counts'              => $request->tps_quick_counts,
                    'rt_quick_counts'               => $request->rt_quick_counts,
                    'rw_quick_counts'               => $request->rw_quick_counts,
                    'jumlah_quick_counts'           => $request->jumlah_quick_counts,
                    'updated_at'                    => date('Y-m-d H:i:s'),
                ];
                Quick_count::where('id_quick_counts', $id_quick_counts)
                                        ->update($data);

                if(request()->session()->get('halaman') != '')
                    $redirect_halaman    = request()->session()->get('halaman');
                else
                    $redirect_halaman  = 'dashboard/quick_count';
                
                return redirect($redirect_halaman);
            }
            else
                return redirect('dashboard/quick_count');
        }
        else
            return redirect('dashboard/quick_count');
    }

    public function hapus($id_quick_counts=0)
    {
        $link_quick_count = 'quick_count';
        if(General::hakAkses($link_quick_count,'hapus') == 'true')
        {
            $cek_quick_counts = Quick_count::where('id_quick_counts',$id_quick_counts)->first();
            if(!empty($cek_quick_counts))
            {
                Quick_count::where('id_quick_counts',$id_quick_counts)
                        ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/quick_count');
        }
        else
            return redirect('dashboard/quick_count');
    }

}