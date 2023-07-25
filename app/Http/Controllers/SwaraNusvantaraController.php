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
                                                                                ->orderBy('tanggal_publikasi_swara_nusvantaras','desc')
                                                                                ->paginate(10);
        $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                ->orderBy('total_komentar_swara_nusvantaras','asc')
                                                                                ->limit(5)
                                                                                ->get();
        $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::where('status_publikasi_komentar_swara_nusvantaras',1)
                                                                                    ->orderBy('created_at','desc')
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
                                                                                    ->orderBy('tanggal_publikasi_swara_nusvantaras','desc')
                                                                                    ->paginate(10);
            $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                    ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                    ->orderBy('total_komentar_swara_nusvantaras','asc')
                                                                                    ->limit(5)
                                                                                    ->get();
            $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::where('status_publikasi_komentar_swara_nusvantaras',1)
                                                                                        ->orderBy('created_at','desc')
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
                                                                                ->orderBy('tanggal_publikasi_swara_nusvantaras','desc')
                                                                                ->paginate(10);
        $data['lihat_swara_nusvantara_populers']        = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                ->orderBy('total_komentar_swara_nusvantaras','asc')
                                                                                ->limit(5)
                                                                                ->get();
        $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::where('status_publikasi_komentar_swara_nusvantaras',1)
                                                                                    ->orderBy('created_at','desc')
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
                                                                                        ->orderBy('total_komentar_swara_nusvantaras','asc')
                                                                                        ->limit(5)
                                                                                        ->get();
                $data['lihat_komentar_swara_nusvantaras']       = Komentar_swara_nusvantara::where('status_publikasi_komentar_swara_nusvantaras',1)
                                                                                            ->orderBy('created_at','desc')
                                                                                            ->limit(5)
                                                                                            ->get();
                $data['lihat_komentars']                        = Komentar_swara_nusvantara::where('swara_nusvantaras_id',$cek_swara_nusvantaras->id_swara_nusvantaras)
                                                                                        ->where('status_publikasi_komentar_swara_nusvantaras',1)
                                                                                        ->orderBy('created_at','desc')
                                                                                        ->get();
                $data['lihat_swara_nusvantara_lainnya']         = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                                        ->where('tanggal_publikasi_swara_nusvantaras','<=',$tanggalwaktu_sekarang)
                                                                                        ->where('id_swara_nusvantaras','!=',$cek_swara_nusvantaras->id_swara_nusvantaras)
                                                                                        ->limit(2)
                                                                                        ->get();
                $baca_swara_nusvantaras_data = [
                    'total_baca_swara_nusvantaras'  => $cek_swara_nusvantaras->total_baca_swara_nusvantaras + 1,
                ];
                Master_swara_nusvantara::where('id_swara_nusvantaras',$cek_swara_nusvantaras->id_swara_nusvantaras)->update($baca_swara_nusvantaras_data);
                
                return view('swara_nusvantara_detail',$data);
            }
            else
                return redirect('swara-nusvantara');
        }
        else
            return redirect('swara-nusvantara');
    }

    public function kirimkomentar(Request $request)
    {
        $id_swara_nusvantaras = $request->id_swara_nusvantaras;
        $cek_swara_nusvantaras = Master_swara_nusvantara::where('id_swara_nusvantaras',$id_swara_nusvantaras)->count();
        if($cek_swara_nusvantaras != 0)
        {
            $aturan = [
                'nama_komentar_swara_nusvantaras'           => 'required',
                'email_komentar_swara_nusvantaras'          => 'required',
                'konten_komentar_swara_nusvantaras'         => 'required',
            ];
            $this->validate($request, $aturan);

            $komentar_swara_nusvantaras_data = [
                'swara_nusvantaras_id'                          => $id_swara_nusvantaras,
                'nama_komentar_swara_nusvantaras'               => $request->nama_komentar_swara_nusvantaras,
                'email_komentar_swara_nusvantaras'              => $request->email_komentar_swara_nusvantaras,
                'konten_komentar_swara_nusvantaras'             => $request->konten_komentar_swara_nusvantaras,
                'status_baca_komentar_swara_nusvantaras'        => 0,
                'status_publikasi_komentar_swara_nusvantaras'   => 0,
                'created_at'                                    => date('Y-m-d H:i:s'),
            ];
            Komentar_swara_nusvantara::insert($komentar_swara_nusvantaras_data);
        
            $setelah_simpan = [
                'alert'  => 'sukses',
            ];
            return redirect()->back()->with('setelah_simpan', $setelah_simpan);
        }
        else
            return redirect('swara-nusvantaras');
    }

}