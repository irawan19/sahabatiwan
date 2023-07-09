<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use Storage;
use App\Models\Master_profil;

class ProfilController extends AdminCoreController
{

    public function index()
    {
    	$data['lihat_profils']	= Master_profil::first();
        session()->forget('halaman');
       	return view('dashboard.profil.lihat',$data);
    }

    public function prosesedit(Request $request)
    {

    }

}