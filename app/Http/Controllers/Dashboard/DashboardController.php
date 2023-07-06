<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends AdminCoreController
{
    public function logout(Request $request)
    {
        $check_session = \App\Models\Session::where('user_id',Auth::user()->id)->count();
        if($check_session != 0)
            \App\Models\Session::where('user_id',Auth::user()->id)->delete();

        $users_data = [
            'remember_token' => ''
        ];
        \App\Models\User::where('id',Auth::user()->id)
                        ->update($users_data);

        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');
    }

    public function index()
    {
        $data['lihat_konfigurasi_aplikasis']    = \App\Models\Master_konfigurasi_aplikasi::first();
        $data['total_pesanans']                 = 0;
        $data['total_items']                    = 0;
        $data['total_pelanggans']               = 0;
        $data['total_admins']                   = 0;
        return view('dashboard.dashboard.lihat',$data);
    }

}