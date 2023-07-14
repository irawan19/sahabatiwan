<?php
namespace App\Http\Controllers;

use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_swara_nusvantara;
use App\Models\Master_kategori_swara_nusvantara;

class SwaraNusvantaraController extends Controller
{

    public function index()
    {
        $tanggalwaktu_sekarang                          = date('Y-m-d H:i:s');
        $data['lihat_konfigurasi_aplikasis']            = Master_konfigurasi_aplikasi::first();
        $data['lihat_kategori_swara_nusvantaras']       = Master_kategori_swara_nusvantara::get();
        $data['lihat_swara_nusvantaras']                = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                ->paginate(10);
        $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                ->limit(5)
                                                                                ->get();
        return view('swara_nusvantara',$data);
    }

}