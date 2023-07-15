<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_layanan;
use Storage;

class LayananController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'lihat') == 'true') {
            $data['link_layanan'] = $link_layanan;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_layanans'] = Master_layanan::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.layanan.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'lihat') == 'true') {
            $data['link_layanan'] = $link_layanan;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_layanans'] = Master_layanan::where('nama_layanans', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->orWhere('konten_layanans', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.layanan.lihat', $data);
        } else
            return redirect('dashboard/layanan');
    }

    public function tambah(Request $request)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'tambah') == 'true')
            return view('dashboard.layanan.tambah');
        else
            return redirect('dashboard/layanan');
    }

    public function prosestambah(Request $request)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'tambah') == 'true') {
            $aturan = [
                'userfile_gambar_layanan' => 'required|mimes:jpg,jpeg,png',
                'nama_layanans'          => 'required',
                'konten_layanans'           => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_layanan = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_layanan')->getClientOriginalName())));
            $path_gambar_layanan = 'layanan/';
            Storage::disk('public')->put($path_gambar_layanan . $nama_gambar_layanan, file_get_contents($request->file('userfile_gambar_layanan')));

            $layanans_data = [
                'gambar_layanans' => $path_gambar_layanan . $nama_gambar_layanan,
                'nama_layanans' => $request->nama_layanans,
                'konten_layanans'  => $request->konten_layanans,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $id_layanans = Master_layanan::insertGetId($layanans_data);

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
                    $redirect_halaman = 'dashboard/kategori_layanan';

                return redirect($redirect_halaman);
            }
        } else
            return redirect('dashboard/layanan');
    }

    public function edit($id_layanans = 0)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'edit') == 'true') {
            $cek_layanans = Master_layanan::where('id_layanans', $id_layanans)->first();
            if (!empty($cek_layanans)) {
                $data['edit_layanans'] = $cek_layanans;
                return view('dashboard.layanan.edit', $data);
            } else
                return redirect('dashboard/layanan');
        } else
            return redirect('dashboard/layanan');
    }

    public function prosesedit($id_layanans = 0, Request $request)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'edit') == 'true') {
            $cek_layanans = Master_layanan::where('id_layanans', $id_layanans)->first();
            if (!empty($cek_layanans)) {
                if (!empty($request->userfile_gambar_layanan)) {
                    $aturan = [
                        'userfile_gambar_layanan' => 'required|mimes:jpg,jpeg,png',
                        'nama_layanans' => 'required',
                        'konten_layanans' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $gambar_layanan_lama = $cek_layanans->gambar_layanans;
                    if (Storage::disk('public')->exists($gambar_layanan_lama))
                        Storage::disk('public')->delete($gambar_layanan_lama);

                    $nama_gambar_layanan = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_layanan')->getClientOriginalName())));
                    $path_gambar_layanan = 'layanan/';
                    Storage::disk('public')->put($path_gambar_layanan . $nama_gambar_layanan, file_get_contents($request->file('userfile_gambar_layanan')));

                    $layanans_data = [
                        'gambar_layanans' => $path_gambar_layanan . $nama_gambar_layanan,
                        'nama_layanans' => $request->nama_layanans,
                        'konten_layanans' => $request->nama_layanans,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_layanan::where('id_layanans', $id_layanans)
                        ->update($layanans_data);
                } else {
                    $aturan = [
                        'nama_layanans' => 'required',
                        'konten_layanans' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $layanans_data = [
                        'nama_layanans' => $request->nama_layanans,
                        'konten_layanans' => $request->konten_layanans,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_layanan::where('id_layanans', $id_layanans)
                        ->update($layanans_data);
                }

                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/layanan';

                return redirect($redirect_halaman);
            } else
                return redirect('dashboard/layanan');
        } else
            return redirect('dashboard/layanan');
    }

    public function hapus($id_layanans = 0)
    {
        $link_layanan = 'layanan';
        if (General::hakAkses($link_layanan, 'hapus') == 'true') {
            $cek_layanans = Master_layanan::where('id_layanans', $id_layanans)->first();
            if (!empty($cek_layanans)) {
                $gambar_layanan_lama = $cek_layanans->gambar_layanans;
                if (file_exists($gambar_layanan_lama))
                    unlink($gambar_layanan_lama);
                Master_layanan::where('id_layanans', $id_layanans)
                                ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            } else
                return redirect('dashboard/layanan');
        } else
            return redirect('dashboard/layanan');
    }

}