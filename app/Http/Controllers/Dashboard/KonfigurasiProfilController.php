<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use Auth;
use Storage;
use App\Models\Master_level_sistem;
use App\Models\User;

class KonfigurasiProfilController extends AdminCoreController
{
    public function index()
    {
    	$data['lihat_level_sistems']	= Master_level_sistem::where('id_level_sistems',Auth::user()->level_sistems_id)->first();
        session()->forget('halaman');
       	return view('dashboard.konfigurasi_profil.lihat',$data);
    }

    public function prosesedit(Request $request)
    {
    	$id_users  	= Auth::user()->id;
        $ambil_foto_user = $request->userfile_foto_user;
        if($ambil_foto_user != '')
        {
            $aturan = [
                'userfile_foto_user'    => 'required|mimes:png,jpg,jpeg,svg',
                'name'                  => 'required',
            ];
            $this->validate($request, $aturan);

            $cek_foto_user       = User::where('id',$id_users)->first();
            if(!empty($cek_foto_user))
            {
                $foto_user_lama        = $cek_foto_user->profile_photo_path;
                if (Storage::disk('public')->exists($foto_user_lama))
                    Storage::disk('public')->delete($foto_user_lama);
            }

            $nama_foto_user = date('Ymd').date('His').str_replace(')','',str_replace('(','',str_replace(' ','-',$request->file('userfile_foto_user')->getClientOriginalName())));
            $path_foto_user = 'user/';
            Storage::disk('public')->put($path_foto_user.$nama_foto_user, file_get_contents($request->file('userfile_foto_user')));

            $data = [
                'profile_photo_path'  	=> $path_foto_user.$nama_foto_user,
                'name'                  => $request->name,
                'updated_at'            => date('Y-m-d H:i:s'),
            ];
        }
        else
        {
            $aturan = [
                'name'                  => 'required',
            ];
            $this->validate($request, $aturan);

            $data = [
                'name' 			     	=> $request->name,
                'updated_at'	     	=> date('Y-m-d H:i:s'),
            ];
        }

        User::where('id',$id_users)->update($data);

        $setelah_simpan = [
            'alert'  => 'sukses',
            'text'   => 'Profil berhasil diperbarui',
        ];
        return redirect()->back()->with('setelah_simpan', $setelah_simpan)->withInput($request->all());
    }
}