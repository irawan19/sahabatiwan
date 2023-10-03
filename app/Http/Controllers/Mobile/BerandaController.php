<?php
namespace App\Http\Controllers\Mobile;

use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_slideshow;
use App\Models\Master_profil;
use App\Models\Apa_kata_mereka;
use App\Models\Master_swara_nusvantara;

class BerandaController extends MobileController
{
    public function index()
    {
        $tanggalwaktu_sekarang                  = date('Y-m-d H:i:s');
        $data['tanggal_sekarang']               = date('Y-m-d');
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_slideshows']               = Master_slideshow::get();
        $data['lihat_profils']                  = Master_profil::first();
        $data['lihat_swara_nusvantaras']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                            ->where('tanggal_publikasi_swara_nusvantaras','<=',date('Y-m-d H:i:s'))
                                                                            ->orderBy('tanggal_publikasi_swara_nusvantaras','desc')
                                                                            ->limit(3)
                                                                            ->get();
        $data['lihat_apa_kata_merekas']         = Apa_kata_mereka::where('status_publikasi_apa_kata_merekas',1)->orderBy('created_at','desc')->get();
        return view('mobile.beranda',$data);
    }

}