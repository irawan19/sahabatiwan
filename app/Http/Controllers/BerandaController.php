<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_slideshow;
use App\Models\Master_profil;
use App\Models\Testimoni;

class BerandaController extends Controller
{

    public function index()
    {
        $data['tanggal_sekarang']               = date('Y-m-d');
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_slideshows']               = Master_slideshow::get();
        $data['lihat_profils']                  = Master_profil::first();
        $data['lihat_testimonis']               = Testimoni::where('status_publikasi_testimonis',1)->get();
        return view('beranda',$data);
    }

    public function kirimtestimoni(Request $request)
    {
        $nama_foto_testimoni = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_foto_testimoni')->getClientOriginalName())));
        $path_foto_testimoni = 'user/';
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

        return response()->json(["sukses" => "sukses"], 200);
    }

}