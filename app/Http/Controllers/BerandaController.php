<?php
namespace App\Http\Controllers;

use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_sosial_media;
use App\Models\Master_slideshow;
use App\Models\Master_profil;

class BerandaController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_sosial_medias']            = Master_sosial_media::get();
        $data['lihat_slideshows']               = Master_slideshow::get();
        $data['lihat_profils']                  = Master_profil::first();
        return view('beranda',$data);
    }

}