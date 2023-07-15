<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_galeri;
use Storage;

class GaleriController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'lihat') == 'true') {
            $data['link_galeri'] = $link_galeri;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_galeris'] = Master_galeri::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.galeri.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'lihat') == 'true') {
            $data['link_galeri'] = $link_galeri;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_galeris'] = Master_galeri::where('judul_galeris', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.galeri.lihat', $data);
        } else
            return redirect('dashboard/galeri');
    }

    public function tambah(Request $request)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'tambah') == 'true')
            return view('dashboard.galeri.tambah');
        else
            return redirect('dashboard/galeri');
    }

    public function prosestambah(Request $request)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'tambah') == 'true') {
            $aturan = [
                'userfile_foto_galeri' => 'required|mimes:jpg,jpeg,png',
                'judul_galeris'          => 'required',
            ];
            $this->validate($request, $aturan);

            $judul_foto_galeri = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_foto_galeri')->getClientOriginalName())));
            $path_foto_galeri = 'galeri/';
            Storage::disk('public')->put($path_foto_galeri . $judul_foto_galeri, file_get_contents($request->file('userfile_foto_galeri')));

            $galeris_data = [
                'foto_galeris' => $path_foto_galeri . $judul_foto_galeri,
                'judul_galeris' => $request->judul_galeris,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $id_galeris = Master_galeri::insertGetId($galeris_data);

            $simpan = $request->simpan;
            $simpan_kembali = $request->simpan_kembali;
            if ($simpan) {
                $setelah_simpan = [
                    'alert' => 'sukses',
                    'text' => 'Data berhasil ditambahkan',
                ];
                return redirect()->back()->with('setelah_simpan', $setelah_simpan);
            }
            if ($simpan_kembali) {
                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/kategori_galeri';

                return redirect($redirect_halaman);
            }
        } else
            return redirect('dashboard/galeri');
    }

    public function edit($id_galeris = 0)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'edit') == 'true') {
            $cek_galeris = Master_galeri::where('id_galeris', $id_galeris)->first();
            if (!empty($cek_galeris)) {
                $data['edit_galeris'] = $cek_galeris;
                return view('dashboard.galeri.edit', $data);
            } else
                return redirect('dashboard/galeri');
        } else
            return redirect('dashboard/galeri');
    }

    public function prosesedit($id_galeris = 0, Request $request)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'edit') == 'true') {
            $cek_galeris = Master_galeri::where('id_galeris', $id_galeris)->first();
            if (!empty($cek_galeris)) {
                if (!empty($request->userfile_foto_galeri)) {
                    $aturan = [
                        'userfile_foto_galeri' => 'required|mimes:jpg,jpeg,png',
                        'judul_galeris' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $foto_galeri_lama = $cek_galeris->foto_galeris;
                    if (Storage::disk('public')->exists($foto_galeri_lama))
                        Storage::disk('public')->delete($foto_galeri_lama);

                    $judul_foto_galeri = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_foto_galeri')->getClientOriginalName())));
                    $path_foto_galeri = 'galeri/';
                    Storage::disk('public')->put($path_foto_galeri . $judul_foto_galeri, file_get_contents($request->file('userfile_foto_galeri')));

                    $galeris_data = [
                        'foto_galeris' => $path_foto_galeri . $judul_foto_galeri,
                        'judul_galeris' => $request->judul_galeris,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_galeri::where('id_galeris', $id_galeris)
                        ->update($galeris_data);
                } else {
                    $aturan = [
                        'judul_galeris' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $galeris_data = [
                        'judul_galeris' => $request->judul_galeris,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_galeri::where('id_galeris', $id_galeris)
                        ->update($galeris_data);
                }

                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/galeri';

                return redirect($redirect_halaman);
            } else
                return redirect('dashboard/galeri');
        } else
            return redirect('dashboard/galeri');
    }

    public function hapus($id_galeris = 0)
    {
        $link_galeri = 'galeri';
        if (General::hakAkses($link_galeri, 'hapus') == 'true') {
            $cek_galeris = Master_galeri::where('id_galeris', $id_galeris)->first();
            if (!empty($cek_galeris)) {
                $foto_galeri_lama = $cek_galeris->foto_galeris;
                if (file_exists($foto_galeri_lama))
                    unlink($foto_galeri_lama);
                Master_galeri::where('id_galeris', $id_galeris)
                                ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            } else
                return redirect('dashboard/galeri');
        } else
            return redirect('dashboard/galeri');
    }

}