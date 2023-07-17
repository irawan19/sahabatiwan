<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Master_provinsi;
use App\Models\Master_kota_kabupaten;
use App\Models\Master_kecamatan;
use App\Models\Master_kelurahan;

class WilayahController extends AdminCoreController
{
    public function kotakabupaten(Request $request, $id_provinsis=0)
    {
        $cek_provinsis = Master_provinsi::where('id_provinsis',$id_provinsis)
                                        ->count();
        if($cek_provinsis != 0)
        {
            if ($request->has('term'))
            {
                $ambil_kota_kabupatens = Master_kota_kabupaten::where('provinsis_id',$id_provinsis)
                                                            ->where('nama_kota_kabupatens', 'ILIKE', '%'.$request->term.'%')
                                                            ->orderBy('nama_kota_kabupatens')
                                                            ->get();
            }
            else
            {
                $ambil_kota_kabupatens = Master_kota_kabupaten::where('provinsis_id',$id_provinsis)
                                                                ->orderBy('nama_kota_kabupatens')
                                                                ->get();
            }
            return response()->json($ambil_kota_kabupatens,200);
        }
        else
            return response()->json(['message' => 'kota kabupaten tidak ditemukan'],400);

    }

    public function kecamatan(Request $request, $id_kota_kabupatens=0)
    {
        $cek_kota_kabupatens = Master_kota_kabupaten::where('id_kota_kabupatens',$id_kota_kabupatens)
                                                    ->count();
        if($cek_kota_kabupatens != 0)
        {
            if ($request->has('term'))
            {
                $ambil_kecamatans = Master_kecamatan::where('kota_kabupatens_id',$id_kota_kabupatens)
                                                ->where('nama_kecamatans', 'ILIKE', '%'.$request->term.'%')
                                                ->orderBy('nama_kecamatans')
                                                ->get();
            }
            else
            {
                $ambil_kecamatans = Master_kecamatan::where('kota_kabupatens_id',$id_kota_kabupatens)
                                                    ->orderBy('nama_kecamatans')
                                                    ->get();
            }
            return response()->json($ambil_kecamatans,200);
        }
        else
            return response()->json(['message' => 'kecamatan tidak ditemukan'],400);

    }

    public function kelurahan(Request $request, $id_kecamatans=0)
    {
        $cek_kecamatans = Master_kecamatan::where('id_kecamatans',$id_kecamatans)
                                                    ->count();
        if($cek_kecamatans != 0)
        {
            if ($request->has('term'))
            {
                $ambil_kelurahans = Master_kelurahan::where('kecamatans_id',$id_kecamatans)
                                                ->where('nama_kelurahans', 'ILIKE', '%'.$request->term.'%')
                                                ->orderBy('nama_kelurahans')
                                                ->get();
            }
            else
            {
                $ambil_kelurahans = Master_kelurahan::where('kecamatans_id',$id_kecamatans)
                                                    ->orderBy('nama_kelurahans')
                                                    ->get();
            }
            return response()->json($ambil_kelurahans,200);
        }
        else
            return response()->json(['message' => 'kelurahan tidak ditemukan'],400);

    }
}