<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use Storage;
use App\Models\Master_profil;

class ProfilController extends AdminCoreController
{

    public function index()
    {
    	$data['lihat_profils']	= Master_profil::first();
        session()->forget('halaman');
       	return view('dashboard.profil.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
        $link_profil = 'profil';
        if (General::hakAkses($link_profil, 'lihat') == 'true')
        {
            $aturan = [
                'text1_profils'                 => 'required',
                'text2_profils'                 => 'required',
                'nama_profils'                  => 'required',
                'keterangan_nama_profils'       => 'required',
                'konten_profils'                => 'required',
                'url_youtube_profils'           => 'required',
            ];
            $error_pesan = [
                'text1_profils.required'            => 'Form Text 1 Harus Diisi.',
                'text2_profils.required'            => 'Form Text 2 Harus Diisi.',
                'nama_profils.required'             => 'Form Nama Harus Diisi.',
                'keterangan_nama_profils.required'  => 'Form Keterangan Harus Diisi.',
                'konten_profils.required'           => 'Form Konten Harus Diisi.',
                'url_youtube_profils.required'      => 'Form URL Youtube Harus Diisi.',
            ];
            $this->validate($request, $aturan, $error_pesan);

            $profils_data = [
                'text1_profils'                     => $request->text1_profils,
                'text2_profils'                     => $request->text2_profils,
                'nama_profils'                      => $request->nama_profils,
                'keterangan_nama_profils'           => $request->keterangan_nama_profils,
                'konten_profils'                    => $request->konten_profils,
                'url_youtube_profils'               => $request->url_youtube_profils,
                'updated_at'                        => date('Y-m-d H:i:s'),
            ];
            Master_profil::query()->update($profils_data);

            if(!empty($request->userfile_foto1))
            {
                $aturan = [
                    'userfile_foto1'     => 'required|mimes:png,jpg,jpeg,svg',
                ];
                $error_pesan = [
                    'userfile_foto1.required'   => 'Form Foto 1 Harus Diisi.',
                ];
                $this->validate($request, $aturan, $error_pesan);
    
                $cek_foto1       = Master_profil::first();
                if (!empty($cek_foto1)) {
                    $foto1_lama        = $cek_foto1->foto1_profils;
                    if (Storage::disk('public')->exists($foto1_lama))
                        Storage::disk('public')->delete($foto1_lama);
                }
    
                $nama_foto1 = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_foto1')->getClientOriginalName())));
                $path_foto1 = 'profil/';
                Storage::disk('public')->put($path_foto1.$nama_foto1, file_get_contents($request->file('userfile_foto1')));
    
                $data = [
                    'foto1_profils'     => $path_foto1 . $nama_foto1,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
    
                Master_profil::query()->update($data);
            }

            if(!empty($request->userfile_foto2))
            {
                $aturan = [
                    'userfile_foto2'     => 'required|mimes:png,jpg,jpeg,svg',
                ];
                $error_pesan = [
                    'userfile_foto2.required'   => 'Form Foto 2 Harus Diisi.',
                ];
                $this->validate($request, $aturan, $error_pesan);
    
                $cek_foto2       = Master_profil::first();
                if (!empty($cek_foto2)) {
                    $foto2_lama        = $cek_foto2->foto2_profils;
                    if (Storage::disk('public')->exists($foto2_lama))
                        Storage::disk('public')->delete($foto2_lama);
                }
    
                $nama_foto2 = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_foto2')->getClientOriginalName())));
                $path_foto2 = 'profil/';
                Storage::disk('public')->put($path_foto2.$nama_foto2, file_get_contents($request->file('userfile_foto2')));
    
                $data = [
                    'foto2_profils'     => $path_foto2 . $nama_foto2,
                    'updated_at'        => date('Y-m-d H:i:s'),
                ];
    
                Master_profil::query()->update($data);
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