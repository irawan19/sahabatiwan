<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\Master_kategori_swara_nusvantara;
use Illuminate\Http\Request;
use App\Helpers\General;
use Storage;
use App\Models\Master_swara_nusvantara;

class SwaraNusvantaraController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'lihat') == 'true')
        {
            $data['link_swara_nusvantara']          = $link_swara_nusvantara;
            $data['hasil_kata']                     = '';
            $url_sekarang                           = $request->fullUrl();
        	$data['lihat_swara_nusvantaras']    	= Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman'              => $url_sekarang]);
        	return view('dashboard.swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'lihat') == 'true')
        {
            $data['link_swara_nusvantara']          = $link_swara_nusvantara;
            $url_sekarang                           = $request->fullUrl();
            $hasil_kata                             = $request->cari_kata;
            $data['hasil_kata']                     = $hasil_kata;
            $data['lihat_swara_nusvantaras']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('judul_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                ->paginate(10);
            session(['halaman'              => $url_sekarang]);
            session(['hasil_kata'		    => $hasil_kata]);
            return view('dashboard.swara_nusvantara.lihat', $data);
        }
        else
            return redirect('dashboard/swara_nusvantara');
    }

    public function tambah()
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'tambah') == 'true')
        {
            $data['tambah_kategori_swara_nusvantaras'] = Master_kategori_swara_nusvantara::orderBy('nama_kategori_swara_nusvantaras')
                                                                                        ->get();
            return view('dashboard.swara_nusvantara.tambah',$data);
        }
        else
            return redirect('dashboard/swara_nusvantara');
    }

    public function prosestambah(Request $request)
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'tambah') == 'true')
        {
            $aturan = [
                'kategori_swara_nusvantaras_id'         => 'required',
                'userfile_gambar_swara_nusvantara'      => 'required|mimes:jpg,jpeg,png',
                'tanggal_publikasi_swara_nusvantaras'   => 'required',
                'judul_swara_nusvantaras'               => 'required',
                'konten_swara_nusvantaras'              => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_swara_nusvantara = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_swara_nusvantara')->getClientOriginalName())));
            $path_gambar_swara_nusvantara = 'swara_nusvantara/';
            Storage::disk('public')->put($path_gambar_swara_nusvantara . $nama_gambar_swara_nusvantara, file_get_contents($request->file('userfile_gambar_swara_nusvantara')));

            $data = [
                'gambar_swara_nusvantaras'              => $path_gambar_swara_nusvantara.$nama_gambar_swara_nusvantara,
                'tanggal_publikasi_swara_nusvantaras'   => General::ubahTanggalKeDB($request->tanggal_publikasi_swara_nusvantaras),
                'kategori_swara_nusvantaras_id'         => $request->kategori_swara_nusvantaras_id,
                'judul_swara_nusvantaras'               => $request->judul_swara_nusvantaras,
                'konten_swara_nusvantaras'              => $request->konten_swara_nusvantaras,
                'total_baca_swara_nusvantaras'          => 0,
                'total_komentar_swara_nusvantaras'      => 0,
                'created_at'                            => date('Y-m-d H:i:s'),
            ];
            Master_swara_nusvantara::insert($data);

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
                    $redirect_halaman  = 'dashboard/swara_nusvantara';

                return redirect($redirect_halaman);
            }
        }
        else
            return redirect('dashboard/swara_nusvantara');
    }

    public function edit($id_swara_nusvantaras=0)
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'edit') == 'true')
        {
            if (!is_numeric($id_swara_nusvantaras))
                $id_swara_nusvantaras = 0;
            $cek_swara_nusvantaras = Master_swara_nusvantara::where('id_swara_nusvantaras',$id_swara_nusvantaras)->count();
            if($cek_swara_nusvantaras != 0)
            {
                $data['edit_kategori_swara_nusvantaras']= Master_kategori_swara_nusvantara::orderBy('nama_kategori_swara_nusvantaras')
                                                                                            ->get();
                $data['edit_swara_nusvantaras']         = Master_swara_nusvantara::where('id_swara_nusvantaras',$id_swara_nusvantaras)
                                                                                                    ->first();
                return view('dashboard.swara_nusvantara.edit',$data);
            }
            else
                return redirect('dashboard/swara_nusvantara');
        }
        else
            return redirect('dashboard/swara_nusvantara');
    }

    public function prosesedit($id_swara_nusvantaras=0, Request $request)
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'edit') == 'true')
        {
            if (!is_numeric($id_swara_nusvantaras))
                $id_swara_nusvantaras = 0;
            $cek_swara_nusvantaras = Master_swara_nusvantara::where('id_swara_nusvantaras',$id_swara_nusvantaras)->first();
            if(!empty($cek_swara_nusvantaras))
            {
                if(!empty($request->userfile_gambar_swara_nusvantara))
                {
                    $aturan = [
                        'kategori_swara_nusvantaras_id'         => 'required',
                        'userfile_gambar_swara_nusvantara'      => 'required|mimes:jpg,jpeg,png',
                        'tanggal_publikasi_swara_nusvantaras'   => 'required',
                        'judul_swara_nusvantaras'               => 'required',
                        'konten_swara_nusvantaras'              => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $gambar_swara_nusvantara_lama = $cek_swara_nusvantaras->gambar_swara_nusvantaras;
                    if (Storage::disk('public')->exists($gambar_swara_nusvantara_lama))
                        Storage::disk('public')->delete($gambar_swara_nusvantara_lama);

                    $nama_gambar_swara_nusvantara = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_swara_nusvantara')->getClientOriginalName())));
                    $path_gambar_swara_nusvantara = 'swara_nusvantara/';
                    Storage::disk('public')->put($path_gambar_swara_nusvantara . $nama_gambar_swara_nusvantara, file_get_contents($request->file('userfile_gambar_swara_nusvantara')));
        
                    $data = [
                        'gambar_swara_nusvantaras'              => $path_gambar_swara_nusvantara.$nama_gambar_swara_nusvantara,
                        'tanggal_publikasi_swara_nusvantaras'   => General::ubahTanggalKeDB($request->tanggal_publikasi_swara_nusvantaras),
                        'kategori_swara_nusvantaras_id'         => $request->kategori_swara_nusvantaras_id,
                        'judul_swara_nusvantaras'               => $request->judul_swara_nusvantaras,
                        'konten_swara_nusvantaras'              => $request->konten_swara_nusvantaras,
                        'total_baca_swara_nusvantaras'          => 0,
                        'total_komentar_swara_nusvantaras'      => 0,
                        'created_at'                            => date('Y-m-d H:i:s'),
                    ];
                }
                else
                {
                    $aturan = [
                        'kategori_swara_nusvantaras_id'         => 'required',
                        'tanggal_publikasi_swara_nusvantaras'   => 'required',
                        'judul_swara_nusvantaras'               => 'required',
                        'konten_swara_nusvantaras'              => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $data = [
                        'tanggal_publikasi_swara_nusvantaras'   => General::ubahTanggalKeDB($request->tanggal_publikasi_swara_nusvantaras),
                        'kategori_swara_nusvantaras_id'         => $request->kategori_swara_nusvantaras_id,
                        'judul_swara_nusvantaras'               => $request->judul_swara_nusvantaras,
                        'konten_swara_nusvantaras'              => $request->konten_swara_nusvantaras,
                        'total_baca_swara_nusvantaras'          => 0,
                        'total_komentar_swara_nusvantaras'      => 0,
                        'created_at'                            => date('Y-m-d H:i:s'),
                    ];
                }
                Master_swara_nusvantara::where('id_swara_nusvantaras', $id_swara_nusvantaras)
                                        ->update($data);

                if(request()->session()->get('halaman') != '')
                    $redirect_halaman    = request()->session()->get('halaman');
                else
                    $redirect_halaman  = 'dashboard/swara_nusvantara';
                
                return redirect($redirect_halaman);
            }
            else
                return redirect('dashboard/swara_nusvantara');
        }
        else
            return redirect('dashboard/swara_nusvantara');
    }

    public function hapus($id_swara_nusvantaras=0)
    {
        $link_swara_nusvantara = 'swara_nusvantara';
        if(General::hakAkses($link_swara_nusvantara,'hapus') == 'true')
        {
            if (!is_numeric($id_swara_nusvantaras))
                $id_swara_nusvantaras = 0;
            $cek_swara_nusvantaras = Master_swara_nusvantara::where('id_swara_nusvantaras',$id_swara_nusvantaras)->first();
            if(!empty($cek_swara_nusvantaras))
            {
                Master_swara_nusvantara::where('id_swara_nusvantaras',$id_swara_nusvantaras)
                                                ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/swara_nusvantara');
        }
        else
            return redirect('dashboard/swara_nusvantara');
    }

}