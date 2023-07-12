<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Dukungan_sahabat;

class DukunganSahabatController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        return view('dukungan_sahabat',$data);
    }

    public function kirim(Request $request)
    {
        $nama_foto_dukungan_sahabat = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_foto_dukungan_sahabat')->getClientOriginalName())));
        $path_foto_dukungan_sahabat = 'dukungansahabat/';
        Storage::disk('public')->put($path_foto_dukungan_sahabat.$nama_foto_dukungan_sahabat, file_get_contents($request->file('userfile_foto_dukungan_sahabat')));

        $dukungan_sahabats_data = [
            'nama_dukungan_sahabats'               => $request->nama_dukungan_sahabats,
            'profesi_dukungan_sahabats'            => $request->profesi_dukungan_sahabats,
            'foto_dukungan_sahabats'               => $path_foto_dukungan_sahabat.$nama_foto_dukungan_sahabat,
            'konten_dukungan_sahabats'             => $request->konten_dukungan_sahabats,
            'status_baca_dukungan_sahabats'        => 0,
            'status_publikasi_dukungan_sahabats'   => 0,
            'created_at'                    => date('Y-m-d H:i:s'),
        ];
        Dukungan_sahabat::insert($dukungan_sahabats_data);

        return response()->json(["sukses" => "sukses"], 200);
    }

}