<?php
namespace App\Http\Controllers;

use App\Models\Master_sosial_media;
use App\Models\Master_subscribe;
use Illuminate\Http\Request;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_slideshow;
use App\Models\Master_profil;
use App\Models\Master_program;
use App\Models\Master_galeri;
use App\Models\Testimoni;
use App\Models\Master_swara_nusvantara;

class BerandaController extends Controller
{

    public function index()
    {
        $tanggalwaktu_sekarang                  = date('Y-m-d H:i:s');
        $data['tanggal_sekarang']               = date('Y-m-d');
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_slideshows']               = Master_slideshow::get();
        $data['lihat_profils']                  = Master_profil::first();
        $data['lihat_programs']                 = Master_program::get();
        $data['lihat_galeris']                  = Master_galeri::get();
        $data['lihat_swara_nusvantaras']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                            ->where('tanggal_publikasi_swara_nusvantaras','<=',date('Y-m-d H:i:s'))
                                                                            ->orderBy('tanggal_publikasi_swara_nusvantaras')
                                                                            ->limit(3)
                                                                            ->get();
        $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                            ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                            ->orderBy('total_komentar_swara_nusvantaras','asc')
                                                                            ->limit(2)
                                                                            ->get();
        $data['lihat_testimonis']               = Testimoni::where('status_publikasi_testimonis',1)->get();
        return view('beranda',$data);
    }

    public function cari(Request $request)
    {
        $hasil_kata                             = $request->cari;
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_swara_nusvantaras']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                            ->where('tanggal_publikasi_swara_nusvantaras','<=',date('Y-m-d H:i:s'))
                                                                            ->where('judul_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                            ->get();
        return view('pencarian',$data);
    }

    public function subscribe(Request $request)
    {
        $cek_subscribes = Master_subscribe::where('email_subscribes',$request->email_subscribes)->count();
        if($cek_subscribes == 0)
        {
            $subscribes_data = [
                'email_subscribes' => $request->email_subscribes,
            ];
            Master_subscribe::insert($subscribes_data);
        }

        return response()->json(["sukses" => "sukses"], 200);
    }

}