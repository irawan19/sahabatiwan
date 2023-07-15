<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Testimoni;
use App\Models\Master_kontak_kami;
use App\Models\Master_sosial_media;

class TestimoniController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_kontak_kamis']             = Master_kontak_kami::first();
        $data['lihat_sosial_medias']            = Master_sosial_media::get();
        return view('testimoni',$data);
    }

    public function kirim(Request $request)
    {
        $nama_foto_testimoni = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_foto_testimoni')->getClientOriginalName())));
        $path_foto_testimoni = 'testimoni/';
        Storage::disk('public')->put($path_foto_testimoni.$nama_foto_testimoni, file_get_contents($request->file('userfile_foto_testimoni')));

        $testimonis_data = [
            'nama_testimonis'               => $request->nama_testimonis,
            'profesi_testimonis'            => $request->profesi_testimonis,
            'foto_testimonis'               => $path_foto_testimoni.$nama_foto_testimoni,
            'konten_testimonis'             => $request->konten_testimonis,
            'status_baca_testimonis'        => 0,
            'status_publikasi_testimonis'   => 0,
            'created_at'                    => date('Y-m-d H:i:s'),
        ];
        Testimoni::insert($testimonis_data);
        
        $setelah_simpan = [
            'alert'  => 'sukses',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

}