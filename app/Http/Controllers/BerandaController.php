<?php
namespace App\Http\Controllers;

use \App\Models\Master_konfigurasi_aplikasi;

class BerandaController extends Controller
{

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::where('id_konfigurasi_aplikasis',1)
                                                                            ->first();
        return view('beranda',$data);
    }

}