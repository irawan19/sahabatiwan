<?php
namespace App\Http\Controllers;

use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_slideshow;
use App\Models\Master_profil;

class BerandaController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::where('id_konfigurasi_aplikasis',1)
                                                                            ->first();
        $data['lihat_slideshows']               = Master_slideshow::get();
        $data['lihat_profils']                  = Master_profil::where('id_profils',1)->first();
        return view('beranda',$data);
    }

}