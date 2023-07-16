<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Helpers\General;
use App\Models\Master_program;
use Storage;

class ProgramController extends AdminCoreController
{

    public function index(Request $request)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'lihat') == 'true') {
            $data['link_program'] = $link_program;
            $data['hasil_kata'] = '';
            $url_sekarang = $request->fullUrl();
            $data['lihat_programs'] = Master_program::paginate(10);
            session()->forget('halaman');
            session()->forget('hasil_kata');
            session(['halaman' => $url_sekarang]);
            return view('dashboard.program.lihat', $data);
        } else
            return redirect('dashboard');
    }

    public function cari(Request $request)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'lihat') == 'true') {
            $data['link_program'] = $link_program;
            $url_sekarang = $request->fullUrl();
            $hasil_kata = $request->cari_kata;
            $data['hasil_kata'] = $hasil_kata;
            $data['lihat_programs'] = Master_program::where('nama_programs', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->orWhere('konten_programs', 'LIKE', '%' . $hasil_kata . '%')
                                                        ->paginate(10);
            session(['halaman' => $url_sekarang]);
            session(['hasil_kata' => $hasil_kata]);
            return view('dashboard.program.lihat', $data);
        } else
            return redirect('dashboard/program');
    }

    public function tambah(Request $request)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'tambah') == 'true')
            return view('dashboard.program.tambah');
        else
            return redirect('dashboard/program');
    }

    public function prosestambah(Request $request)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'tambah') == 'true') {
            $aturan = [
                'userfile_gambar_program' => 'required|mimes:jpg,jpeg,png',
                'userfile_icon_program' => 'required|mimes:jpg,jpeg,png',
                'nama_programs'          => 'required',
                'konten_programs'           => 'required',
            ];
            $this->validate($request, $aturan);

            $nama_gambar_program = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_program')->getClientOriginalName())));
            $path_gambar_program = 'program/';
            Storage::disk('public')->put($path_gambar_program . $nama_gambar_program, file_get_contents($request->file('userfile_gambar_program')));

            $nama_icon_program = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_icon_program')->getClientOriginalName())));
            $path_icon_program = 'program/';
            Storage::disk('public')->put($path_icon_program . $nama_icon_program, file_get_contents($request->file('userfile_icon_program')));

            $programs_data = [
                'gambar_programs' => $path_gambar_program . $nama_gambar_program,
                'icon_programs' => $path_icon_program.$nama_icon_program,
                'nama_programs' => $request->nama_programs,
                'konten_programs'  => $request->konten_programs,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $id_programs = Master_program::insertGetId($programs_data);

            $simpan = $request->simpan;
            $simpan_kembali = $request->simpan_kembali;
            if ($simpan) {
                $setelah_simpan = [
                    'alert' => 'sukses',
                    'text' => 'Data berhasil ditambahkan',
                ];
                return redirect()->back()->with('setelah_simpan', $setelah_simpan);
            }
            if ($simpan_kembali) {
                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/kategori_program';

                return redirect($redirect_halaman);
            }
        } else
            return redirect('dashboard/program');
    }

    public function edit($id_programs = 0)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'edit') == 'true') {
            $cek_programs = Master_program::where('id_programs', $id_programs)->first();
            if (!empty($cek_programs)) {
                $data['edit_programs'] = $cek_programs;
                return view('dashboard.program.edit', $data);
            } else
                return redirect('dashboard/program');
        } else
            return redirect('dashboard/program');
    }

    public function prosesedit($id_programs = 0, Request $request)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'edit') == 'true') {
            $cek_programs = Master_program::where('id_programs', $id_programs)->first();
            if (!empty($cek_programs)) {
                if (!empty($request->userfile_gambar_program)) {
                    $aturan = [
                        'userfile_gambar_program' => 'required|mimes:jpg,jpeg,png',
                        'nama_programs' => 'required',
                        'konten_programs' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $gambar_program_lama = $cek_programs->gambar_programs;
                    if (Storage::disk('public')->exists($gambar_program_lama))
                        Storage::disk('public')->delete($gambar_program_lama);

                    $nama_gambar_program = date('Ymd') . date('His') . str_replace(')', '', str_replace('(', '', str_replace(' ', '-', $request->file('userfile_gambar_program')->getClientOriginalName())));
                    $path_gambar_program = 'program/';
                    Storage::disk('public')->put($path_gambar_program . $nama_gambar_program, file_get_contents($request->file('userfile_gambar_program')));

                    $programs_data = [
                        'gambar_programs' => $path_gambar_program . $nama_gambar_program,
                        'nama_programs' => $request->nama_programs,
                        'konten_programs' => $request->nama_programs,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_program::where('id_programs', $id_programs)
                        ->update($programs_data);
                } else {
                    $aturan = [
                        'nama_programs' => 'required',
                        'konten_programs' => 'required',
                    ];
                    $this->validate($request, $aturan);

                    $programs_data = [
                        'nama_programs' => $request->nama_programs,
                        'konten_programs' => $request->konten_programs,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    Master_program::where('id_programs', $id_programs)
                        ->update($programs_data);
                }

                if (request()->session()->get('halaman') != '')
                    $redirect_halaman = request()->session()->get('halaman');
                else
                    $redirect_halaman = 'dashboard/program';

                return redirect($redirect_halaman);
            } else
                return redirect('dashboard/program');
        } else
            return redirect('dashboard/program');
    }

    public function hapus($id_programs = 0)
    {
        $link_program = 'program';
        if (General::hakAkses($link_program, 'hapus') == 'true') {
            $cek_programs = Master_program::where('id_programs', $id_programs)->first();
            if (!empty($cek_programs)) {
                
                $gambar_program_lama = $cek_programs->gambar_programs;
                if (file_exists($gambar_program_lama))
                    unlink($gambar_program_lama);

                $icon_program_lama = $cek_programs->icon_programs;
                if (file_exists($icon_program_lama))
                    unlink($icon_program_lama);
                
                Master_program::where('id_programs', $id_programs)
                                ->delete();
                return response()->json(["sukses" => "sukses"], 200);
            } else
                return redirect('dashboard/program');
        } else
            return redirect('dashboard/program');
    }

}