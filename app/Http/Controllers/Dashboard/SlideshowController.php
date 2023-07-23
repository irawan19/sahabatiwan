<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_slideshow;
use Storage;

class SlideshowController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'lihat') == 'true') {
            $data['link_slideshow'] = $link_slideshow;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_slideshows'] = Master_slideshow::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.slideshow.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'lihat') == 'true') {
            $data['link_slideshow'] = $link_slideshow;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_slideshows'] = Master_slideshow::where('text1_slideshows', 'LIKE', '%' . $hasil_kata . '%')
                ->orWhere('text2_slideshows', 'LIKE', '%' . $hasil_kata . '%')
                ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.slideshow.lihat', $data);
        } else
            return redirect('dashboard/slideshow');
    }

    public function tambah(Request $request)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'tambah') == 'true')
            return view('dashboard.slideshow.tambah');
        else
            return redirect('dashboard/slideshow');
    }

    public function prosestambah(Request $request)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'tambah') == 'true') {
            $aturan = [
                'userfile_gambar_slideshow' => 'required|mimes:jpg,jpeg,png',
                'text1_slideshows'          => 'required',
                'text2_slideshows'           => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_slideshow = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_slideshow')->getClientOriginalName())));
            $path_gambar_slideshow = 'slideshow/';
            Storage::disk('public')->put($path_gambar_slideshow . $nama_gambar_slideshow, file_get_contents($request->file('userfile_gambar_slideshow')));

            $slideshows_data = [
                'gambar_slideshows' => $path_gambar_slideshow . $nama_gambar_slideshow,
                'text1_slideshows' => $request->text1_slideshows,
                'text2_slideshows'  => $request->text2_slideshows,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $id_slideshows = Master_slideshow::insertGetId($slideshows_data);

            $simpan = $request->simpan;
            $simpan_kembali = $request->simpan_kembali;
            if ($simpan) {
                $setelah_simpan = [
                    'alert' => 'sukses',
                    'text' => 'Data berhasil ditambahkan',
                ];
    	    	return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
            }
            if ($simpan_kembali) {
                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/kategori_slideshow';

                return redirect($redirect_halaman);
            }
        } else
            return redirect('dashboard/slideshow');
    }

    public function edit($id_slideshows = 0)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'edit') == 'true') {
            $cek_slideshows = Master_slideshow::where('id_slideshows', $id_slideshows)->first();
            if (!empty($cek_slideshows)) {
                $data['edit_slideshows'] = $cek_slideshows;
                return view('dashboard.slideshow.edit', $data);
            } else
                return redirect('dashboard/slideshow');
        } else
            return redirect('dashboard/slideshow');
    }

    public function prosesedit($id_slideshows = 0, Request $request)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'edit') == 'true') {
            $cek_slideshows = Master_slideshow::where('id_slideshows', $id_slideshows)->first();
            if (!empty($cek_slideshows)) {
                if (!empty($request->userfile_gambar_slideshow)) {
                    $aturan = [
                        'userfile_gambar_slideshow' => 'required|mimes:jpg,jpeg,png',
                        'text1_slideshows' => 'required',
                        'text2_slideshows' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $gambar_slideshow_lama = $cek_slideshows->gambar_slideshows;
                    if (Storage::disk('public')->exists($gambar_slideshow_lama))
                        Storage::disk('public')->delete($gambar_slideshow_lama);

                    $nama_gambar_slideshow = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_slideshow')->getClientOriginalName())));
                    $path_gambar_slideshow = 'slideshow/';
                    Storage::disk('public')->put($path_gambar_slideshow . $nama_gambar_slideshow, file_get_contents($request->file('userfile_gambar_slideshow')));

                    $slideshows_data = [
                        'gambar_slideshows' => $path_gambar_slideshow . $nama_gambar_slideshow,
                        'text1_slideshows' => $request->text1_slideshows,
                        'text2_slideshows' => $request->text1_slideshows,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_slideshow::where('id_slideshows', $id_slideshows)
                        ->update($slideshows_data);
                } else {
                    $aturan = [
                        'text1_slideshows' => 'required',
                        'text2_slideshows' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $slideshows_data = [
                        'text1_slideshows' => $request->text1_slideshows,
                        'text2_slideshows' => $request->text2_slideshows,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_slideshow::where('id_slideshows', $id_slideshows)
                        ->update($slideshows_data);
                }

                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/slideshow';

                return redirect($redirect_halaman);
            } else
                return redirect('dashboard/slideshow');
        } else
            return redirect('dashboard/slideshow');
    }

    public function hapus($id_slideshows = 0)
    {
        $link_slideshow = 'slideshow';
        if (General::hakAkses($link_slideshow, 'hapus') == 'true') {
            $cek_slideshows = Master_slideshow::where('id_slideshows', $id_slideshows)->first();
            if (!empty($cek_slideshows)) {
                $gambar_slideshow_lama = $cek_slideshows->gambar_slideshows;
                if (file_exists($gambar_slideshow_lama))
                    unlink($gambar_slideshow_lama);
                Master_slideshow::where('id_slideshows', $id_slideshows)
                    ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            } else
                return redirect('dashboard/slideshow');
        } else
            return redirect('dashboard/slideshow');
    }

}