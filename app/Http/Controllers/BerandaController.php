<?php
namespace App\Http\Controllers;

use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_slideshow;

class BerandaController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::where('id_konfigurasi_aplikasis',1)
                                                                            ->first();
        $data['lihat_slideshows']               = Master_slideshow::get();
        return view('beranda',$data);
    }

}