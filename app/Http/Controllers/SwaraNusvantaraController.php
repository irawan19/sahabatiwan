<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_swara_nusvantara;
use App\Models\Master_kategori_swara_nusvantara;
use App\Models\Komentar_swara_nusvantara;

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
        $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::orderBy('created_at','desc')
                                                                                    ->limit(5)
                                                                                    ->get();
        return view('swara_nusvantara',$data);
    }

    public function kategori($slug_kategori_swara_nusvantaras=0)
    {
        $cek_kategori_swara_nusvantara = Master_kategori_swara_nusvantara::where('slug_kategori_swara_nusvantaras',$slug_kategori_swara_nusvantaras)
                                                                        ->first();
        if(!empty($cek_kategori_swara_nusvantara))
        {
            $tanggalwaktu_sekarang                          = date('Y-m-d H:i:s');
            $data['baca_kategori_swara_nusvantaras']        = $cek_kategori_swara_nusvantara;
            $data['lihat_konfigurasi_aplikasis']            = Master_konfigurasi_aplikasi::first();
            $data['lihat_kategori_swara_nusvantaras']       = Master_kategori_swara_nusvantara::get();
            $data['lihat_swara_nusvantaras']                = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                    ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                    ->where('id_kategori_swara_nusvantaras',$cek_kategori_swara_nusvantara->id_kategori_swara_nusvantaras)
                                                                                    ->paginate(10);
            $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                    ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                    ->limit(5)
                                                                                    ->get();
            $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::orderBy('created_at','desc')
                                                                                        ->limit(5)
                                                                                        ->get();
            return view('swara_nusvantara',$data);
        }
        else
            return redirect('swara-nusvantara');
    }

    public function cari(Request $request)
    {
        $hasil_kata                                     = $request->cari_swara_nusvantara;
        $tanggalwaktu_sekarang                          = date('Y-m-d H:i:s');
        $data['lihat_konfigurasi_aplikasis']            = Master_konfigurasi_aplikasi::first();
        $data['lihat_kategori_swara_nusvantaras']       = Master_kategori_swara_nusvantara::get();
        $data['lihat_swara_nusvantaras']                = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                ->where('judul_swara_nusvantaras', 'LIKE', '%'.$hasil_kata.'%')
                                                                                ->paginate(10);
        $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                ->limit(5)
                                                                                ->get();
        $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::orderBy('created_at','desc')
                                                                                    ->limit(5)
                                                                                    ->get();
        return view('swara_nusvantara',$data);
    }

    public function detail($slug_kategori_swara_nusvantaras='',$slug_swara_nusvantaras='')
    {
        $cek_kategori_swara_nusvantaras = Master_kategori_swara_nusvantara::where('slug_kategori_swara_nusvantaras',$slug_kategori_swara_nusvantaras)->count();
        if($cek_kategori_swara_nusvantaras != 0)
        {
            $cek_swara_nusvantaras = Master_swara_nusvantara::where('slug_swara_nusvantaras',$slug_swara_nusvantaras)->first();
            if(!empty($cek_swara_nusvantaras))
            {
                $tanggalwaktu_sekarang                          = date('Y-m-d H:i:s');
                $data['lihat_konfigurasi_aplikasis']            = Master_konfigurasi_aplikasi::first();
                $data['lihat_kategori_swara_nusvantaras']       = Master_kategori_swara_nusvantara::get();
                $data['lihat_swara_nusvantaras']                = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                        ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                        ->where('id_swara_nusvantaras',$cek_swara_nusvantaras->id_swara_nusvantaras)
                                                                                        ->first();
                $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                        ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                        ->limit(5)
                                                                                        ->get();
                $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::orderBy('created_at','desc')
                                                                                            ->limit(5)
                                                                                            ->get();
                return view('swara_nusvantara_detail',$data);
            }
            else
                return redirect('swara-nusvantara');
        }
        else
            return redirect('swara-nusvantara');
    }

}