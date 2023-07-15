<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_subscribe;

class SubscribeController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_subscribe = 'subscribe';
        if (General::hakAkses($link_subscribe, 'lihat') == 'true') {
            $data['link_subscribe'] = $link_subscribe;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_subscribes'] = Master_subscribe::orderBy('created_at')
                                                    ->paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.subscribe.lihat', $data);
        } else 
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_subscribe = 'subscribe';
        if (General::hakAkses($link_subscribe, 'lihat') == 'true') {
            $data['link_subscribe'] = $link_subscribe;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_subscribes'] = Master_subscribe::where('email_subscribes', 'LIKE', '%' . $hasil_kata . '%')
                                                ->orderBy('created_at')
                                                ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.subscribe.lihat', $data);
        } else
            return redirect('dashboard/subscribe');
    }

    public function publikasi($id_subscribes=0)
    {
        $link_subscribe = 'subscribe';
        if (General::hakAkses($link_subscribe, 'baca') == 'true') {
            $cek_subscribes = Master_subscribe::where('id_subscribes',$id_subscribes)->first();
            if(!empty($cek_subscribes))
            {
                if($cek_subscribes->status_publikasi_subscribes == 0)
                    $status_publikasi_subscribes = 1;
                else
                    $status_publikasi_subscribes = 0;

                $subscribe_data = [
                    'status_publikasi_subscribes' => $status_publikasi_subscribes,
                ];
                Master_subscribe::where('id_subscribes',$id_subscribes)
                        ->update($subscribe_data);
                return redirect('dashboard/subscribe');
            }
            else
                return redirect('dashboard/subscribe');
        } else
            return redirect('dashboard/subscribe');
    }

    public function hapus($id_subscribes=0)
    {
        $link_subscribe = 'subscribe';
        if (General::hakAkses($link_subscribe, 'hapus') == 'true') {
            $cek_subscribes = Master_subscribe::where('id_subscribes',$id_subscribes)->first();
            if(!empty($cek_subscribes))
            {
                Master_subscribe::where('id_subscribes',$id_subscribes)->delete();
                return response()->json(["sukses" => "sukses"], 200);
            }
            else
                return redirect('dashboard/subscribe');
        } else
            return redirect('dashboard/subscribe');
    }

}