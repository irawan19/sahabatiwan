<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_kategori_swara_nusvantara;

class KategoriSwaraNusvantaraController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'lihat') == 'true')
        {
            $data['link_kategori_swara_nusvantara']         = $link_kategori_swara_nusvantara;
            $data['hasil_kata']                             = '';
            $url_sekarang                                   = $request->fullUrl();
        	$data['lihat_kategori_swara_nusvantaras']    	= Master_kategori_swara_nusvantara::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman'              => $url_sekarang]);
        	return view('dashboard.kategori_swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'lihat') == 'true')
        {
            $data['link_kategori_swara_nusvantara']         = $link_kategori_swara_nusvantara;
            $url_sekarang                                   = $request->fullUrl();
            $hasil_kata                                     = $request->cari_kata;
            $data['hasil_kata']                             = $hasil_kata;
            $data['lihat_kategori_swara_nusvantaras']       = Master_kategori_swara_nusvantara::where('nama_kategori_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                                ->paginate(10);
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'		    => $hasil_kata]);
            return view('dashboard.kategori_swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard/kategori_swara_nusvantara');
    }

    public function tambah()
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'tambah') == 'true')
            return view('dashboard.kategori_swara_nusvantara.tambah');
        else
            return redirect('dashboard/kategori_swara_nusvantara');
    }

    public function prosestambah(Request $request)
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'tambah') == 'true')
        {
            $aturan = [
                'nama_kategori_swara_nusvantaras'                     => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'nama_kategori_swara_nusvantaras'       => $request->nama_kategori_swara_nusvantaras,
                'slug_kategori_swara_nusvantaras'       => str_slug($request->nama_kategori_swara_nusvantaras),
                'created_at'                            => date('Y-m-d H:i:s'),
            ];
            Master_kategori_swara_nusvantara::insert($data);

            $simpan           = $request->simpan;
            $simpan_kembali   = $request->simpan_kembali;
            if($simpan)
            {
                $setelah_simpan = [
                    'alert'  => 'sukses',
                    'text'   => 'Data berhasil ditambahkan',
                ];
                return redirect()->back()->with('setelah_simpan', $setelah_simpan);
            }
            if($simpan_kembali)
            {
                if(request()->session()->get('halaman') != '')
                    $redirect_halaman  = request()->session()->get('halaman');
                else
                    $redirect_halaman  = 'dashboard/kategori_swara_nusvantara';

                return redirect($redirect_halaman);
            }
        }
        else
            return redirect('dashboard/kategori_swara_nusvantara');
    }

    public function edit($id_kategori_swara_nusvantaras=0)
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'edit') == 'true')
        {
            $cek_kategori_swara_nusvantaras = Master_kategori_swara_nusvantara::where('id_kategori_swara_nusvantaras',$id_kategori_swara_nusvantaras)->count();
            if($cek_kategori_swara_nusvantaras != 0)
            {
                $data['edit_kategori_swara_nusvantaras']         = Master_kategori_swara_nusvantara::where('id_kategori_swara_nusvantaras',$id_kategori_swara_nusvantaras)
                                                                                                    ->first();
                return view('dashboard.kategori_swara_nusvantara.edit',$data);
            }
            else
                return redirect('dashboard/kategori_swara_nusvantara');
        }
        else
            return redirect('dashboard/kategori_swara_nusvantara');
    }

    public function prosesedit($id_kategori_swara_nusvantaras=0, Request $request)
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'edit') == 'true')
        {
            $cek_kategori_swara_nusvantaras = Master_kategori_swara_nusvantara::where('id_kategori_swara_nusvantaras',$id_kategori_swara_nusvantaras)->first();
            if(!empty($cek_kategori_swara_nusvantaras))
            {
                $aturan = [
                    'nama_kategori_swara_nusvantaras'    => 'required',
                ];
                $this->validate($request, $aturan);

                $data = [
		        	'nama_kategori_swara_nusvantaras'	=> $request->nama_kategori_swara_nusvantaras,
                    'slug_kategori_swara_nusvantaras'   => str_slug($request->nama_kategori_swara_nusvantaras),
                    'updated_at'                        => date('Y-m-d H:i:s')
                ];
                Master_kategori_swara_nusvantara::where('id_kategori_swara_nusvantaras', $id_kategori_swara_nusvantaras)
                                        ->update($data);

                if(request()->session()->get('halaman') != '')
                    $redirect_halaman    = request()->session()->get('halaman');
                else
                    $redirect_halaman  = 'dashboard/kategori_swara_nusvantara';
                
                return redirect($redirect_halaman);
            }
            else
                return redirect('dashboard/kategori_swara_nusvantara');
        }
        else
            return redirect('dashboard/kategori_swara_nusvantara');
    }

    public function hapus($id_kategori_swara_nusvantaras=0)
    {
        $link_kategori_swara_nusvantara = 'kategori_swara_nusvantara';
        if(General::hakAkses($link_kategori_swara_nusvantara,'hapus') == 'true')
        {
            $cek_kategori_swara_nusvantaras = Master_kategori_swara_nusvantara::where('id_kategori_swara_nusvantaras',$id_kategori_swara_nusvantaras)->first();
            if(!empty($cek_kategori_swara_nusvantaras))
            {
                Master_kategori_swara_nusvantara::where('id_kategori_swara_nusvantaras',$id_kategori_swara_nusvantaras)
                                                ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/kategori_swara_nusvantara');
        }
        else
            return redirect('dashboard/kategori_swara_nusvantara');
    }

}