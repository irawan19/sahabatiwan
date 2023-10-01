<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Auth;
use App\Models\Session;
use App\Models\User;
use App\Models\Master_konfigurasi_aplikasi;
use App\Models\Master_swara_nusvantara;
use App\Models\Laporan_sahabat;
use App\Models\Dukungan_sahabat;
use App\Models\Apa_kata_mereka;
use App\Models\Komentar_swara_nusvantara;

class DashboardController extends AdminCoreController
{
    public function logout(Request $request)
    {
        $check_session = Session::where('user_id',Auth::user()->id)->count();
        if($check_session != 0)
            Session::where('user_id',Auth::user()->id)->delete();

        $users_data = [
            'remember_token' => ''
        ];
        User::where('id',Auth::user()->id)
                ->update($users_data);

        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');
    }

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = Master_konfigurasi_aplikasi::first();
        $data['total_swara_nusvantara']         = Master_swara_nusvantara::where('tanggal_publikasi_swara_nusvantaras','<=',date('Y-m-d H:i:s'))->count();
        $data['total_komentar']                 = Komentar_swara_nusvantara::count();
        $data['total_laporan_sahabat']          = Laporan_sahabat::count();
        $data['total_dukungan_sahabat']         = Dukungan_sahabat::count();
        $data['total_apa_kata_merekas']         = Apa_kata_mereka::count();
        $data['total_admins']                   = User::count();
        return view('dashboard.dashboard.lihat',$data);
    }

}