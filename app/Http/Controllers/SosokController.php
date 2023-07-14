<?php
namespace App\Http\Controllers;

use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_profil;
use App\Models\Master_sosial_media;

class SosokController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_profils']                  = Master_profil::first();
        $data['lihat_sosial_medias']            = Master_sosial_media::get();
        return view('sosok',$data);
    }

}