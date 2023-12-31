<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Laporan_sahabat;
use App\Models\Master_provinsi;
use App\Models\Master_sosial_media;
use App\Models\Master_kontak_kami;

class LaporanSahabatController extends Controller
{

    public function index()
    {
        $data['lihat_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                ->get();
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_kontak_kamis']             = Master_kontak_kami::first();
        $data['lihat_sosial_medias']            = Master_sosial_media::get();
        return view('laporan_sahabat',$data);
    }

    public function kirim(Request $request)
    {
        $aturan = [
            'userfile_file_laporan_sahabat'     => 'required|mimes:png,jpg,jpeg,svg,doc,docx,xls,xlsx,pdf',
            'nama_laporan_sahabats'             => 'required',
            'email_laporan_sahabats'            => 'required',
            'telepon_laporan_sahabats'          => 'required',
            'alamat_laporan_sahabats'           => 'required',
            'kelurahans_id'                     => 'required',
            'aduan_laporan_sahabats'            => 'required',
        ];
        $this->validate($request, $aturan);

        $nama_file_laporan_sahabat = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_file_laporan_sahabat')->getClientOriginalName())));
        $path_file_laporan_sahabat = 'laporansahabat/';
        Storage::disk('public')->put($path_file_laporan_sahabat.$nama_file_laporan_sahabat, file_get_contents($request->file('userfile_file_laporan_sahabat')));

        $laporan_sahabats_data = [
            'kelurahans_id'                         => $request->kelurahans_id,
            'file_laporan_sahabats'                 => $path_file_laporan_sahabat.$nama_file_laporan_sahabat,
            'nama_laporan_sahabats'                 => $request->nama_laporan_sahabats,
            'email_laporan_sahabats'                => $request->email_laporan_sahabats,
            'telepon_laporan_sahabats'              => $request->telepon_laporan_sahabats,
            'alamat_laporan_sahabats'               => $request->alamat_laporan_sahabats,
            'aduan_laporan_sahabats'                => $request->aduan_laporan_sahabats,
            'status_baca_laporan_sahabats'          => 0,
            'created_at'                            => date('Y-m-d H:i:s'),
        ];
        Laporan_sahabat::insert($laporan_sahabats_data);
        
        $setelah_simpan = [
            'alert'  => 'sukses',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan);
    }

}