<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Dukungan_sahabat;
use App\Models\Master_provinsi;
use App\Models\Master_sosial_media;
use App\Models\Master_kontak_kami;

class DukunganSahabatController extends Controller
{
    public function index()
    {
        $data['lihat_provinsis']                = Master_provinsi::orderBy('nama_provinsis')
                                                                ->get();
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['lihat_kontak_kamis']             = Master_kontak_kami::first();
        $data['lihat_sosial_medias']            = Master_sosial_media::get();
        return view('dukungan_sahabat',$data);
    }

    public function kirim(Request $request)
    {
        $aturan = [
            'userfile_ktp_dukungan_sahabat'     => 'required|mimes:png,jpg,jpeg,svg',
            'nama_dukungan_sahabats'            => 'required',
            'nik_dukungan_sahabats'             => 'required',
            'telepon_dukungan_sahabats'         => 'required',
            'alamat_dukungan_sahabats'          => 'required',
            'kelurahans_id'                     => 'required',
        ];
        $this->validate($request, $aturan);

        $nama_ktp_dukungan_sahabat = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_ktp_dukungan_sahabat')->getClientOriginalName())));
        $path_ktp_dukungan_sahabat = 'dukungansahabat/';
        Storage::disk('public')->put($path_ktp_dukungan_sahabat.$nama_ktp_dukungan_sahabat, file_get_contents($request->file('userfile_ktp_dukungan_sahabat')));

        $dukungan_sahabats_data = [
            'kelurahans_id'                         => $request->kelurahans_id,
            'ktp_dukungan_sahabats'                 => $path_ktp_dukungan_sahabat.$nama_ktp_dukungan_sahabat,
            'nama_dukungan_sahabats'                => $request->nama_dukungan_sahabats,
            'nik_dukungan_sahabats'                 => $request->nik_dukungan_sahabats,
            'telepon_dukungan_sahabats'             => $request->telepon_dukungan_sahabats,
            'alamat_dukungan_sahabats'              => $request->alamat_dukungan_sahabats,
            'status_baca_dukungan_sahabats'         => 0,
            'created_at'                            => date('Y-m-d H:i:s'),
        ];
        Dukungan_sahabat::insert($dukungan_sahabats_data);
        
        $setelah_simpan = [
            'alert'  => 'sukses',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
    }

}