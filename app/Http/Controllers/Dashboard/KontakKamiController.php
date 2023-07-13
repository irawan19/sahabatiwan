<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use Storage;
use App\Models\Master_kontak_kami;

class KontakKamiController extends AdminCoreController
{

    public function index()
    {
    	$data['lihat_kontak_kamis']	= Master_kontak_kami::first();
        session()->forget('halaman');
       	return view('dashboard.kontak_kami.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        $link_kontak_kami = 'kontak_kami';
        if (General::hakAkses($link_kontak_kami, 'lihat') == 'true')
        {
            $aturan = [
                'text1_kontak_kamis'                => 'required',
                'text2_kontak_kamis'                => 'required',
                'konten_kontak_kamis'               => 'required',
            ];
            $this->validate($request, $aturan);

            $kontak_kamis_data = [
                'text1_kontak_kamis'                => $request->text1_kontak_kamis,
                'text2_kontak_kamis'                => $request->text2_kontak_kamis,
                'konten_kontak_kamis'               => $request->konten_kontak_kamis,
                'updated_at'                        => date('Y-m-d H:i:s'),
            ];
            Master_kontak_kami::query()->update($kontak_kamis_data);

            if(!empty($request->userfile_gambar))
            {
                $aturan = [
                    'userfile_gambar'     => 'required|mimes:png,jpg,jpeg,svg',
                ];
                $this->validate($request, $aturan);
    
                $cek_gambar       = Master_kontak_kami::first();
                if (!empty($cek_gambar)) {
                    $gambar_lama        = $cek_gambar->gambar_kontak_kamis;
                    if (Storage::disk('public')->exists($gambar_lama))
                        Storage::disk('public')->delete($gambar_lama);
                }
    
                $nama_gambar = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar')->getClientOriginalName())));
                $path_gambar = 'kontakkami/';
                Storage::disk('public')->put($path_gambar.$nama_gambar, file_get_contents($request->file('userfile_gambar')));
    
                $data = [
                    'gambar_kontak_kamis'     => $path_gambar . $nama_gambar,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
    
                Master_kontak_kami::query()->update($data);
            }

            $setelah_simpan = [
                'alert'                     => 'sukses',
                'text'                      => 'Data berhasil diperbarui',
            ];
            return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
        }
        else
            return redirect('dashboard');
    }

}