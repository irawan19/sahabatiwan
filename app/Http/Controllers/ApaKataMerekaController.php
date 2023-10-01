<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Apa_kata_mereka;
use App\Models\Master_kontak_kami;
use App\Models\Master_sosial_media;

class ApaKataMerekaController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_kontak_kamis']             = Master_kontak_kami::first();
        $data['lihat_sosial_medias']            = Master_sosial_media::get();
        return view('apa_kata_mereka',$data);
    }

    public function kirim(Request $request)
    {
        $aturan = [
            'userfile_foto_apa_kata_mereka'       => 'required|mimes:png,jpg,jpeg,svg',
            'nama_apa_kata_merekas'               => 'required',
            'profesi_apa_kata_merekas'            => 'required',
            'konten_apa_kata_merekas'             => 'required',
        ];
        $this->validate($request, $aturan);

        $nama_foto_apa_kata_mereka = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_foto_apa_kata_mereka')->getClientOriginalName())));
        $path_foto_apa_kata_mereka = 'apa_kata_mereka/';
        Storage::disk('public')->put($path_foto_apa_kata_mereka.$nama_foto_apa_kata_mereka, file_get_contents($request->file('userfile_foto_apa_kata_mereka')));

        $apa_kata_merekas_data = [
            'nama_apa_kata_merekas'               => $request->nama_apa_kata_merekas,
            'profesi_apa_kata_merekas'            => $request->profesi_apa_kata_merekas,
            'foto_apa_kata_merekas'               => $path_foto_apa_kata_mereka.$nama_foto_apa_kata_mereka,
            'konten_apa_kata_merekas'             => $request->konten_apa_kata_merekas,
            'status_baca_apa_kata_merekas'        => 0,
            'status_publikasi_apa_kata_merekas'   => 0,
            'created_at'                    => date('Y-m-d H:i:s'),
        ];
        Apa_kata_mereka::insert($apa_kata_merekas_data);
        
        $setelah_simpan = [
            'alert'  => 'sukses',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

}