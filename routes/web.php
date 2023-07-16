<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

//Beranda
use App\Http\Controllers\BerandaController as Beranda;

//Testimoni
use App\Http\Controllers\TestimoniController as Testimoni;

//Sosok
use App\Http\Controllers\SosokController as Sosok;

//Swara Nusvantara
use App\Http\Controllers\SwaraNusvantaraController as SwaraNusvantara;

//Laporan Sahabat
use App\Http\Controllers\LaporanSahabatController as LaporanSahabat;

//Dukungan Sahabat
use App\Http\Controllers\DukunganSahabatController as DukunganSahabat;

//Wilayah
use App\Http\Controllers\WilayahController as Wilayah;

//Dashboard
use App\Http\Controllers\Dashboard\DashboardController as Dashboard;

//Konfigurasi Profil
use App\Http\Controllers\Dashboard\KonfigurasiProfilController as DashboardKonfigurasiProfil;

//Konfigurasi Akun
use App\Http\Controllers\Dashboard\KonfigurasiAkunController as DashboardKonfigurasiAkun;

//Konfigurasi Web
use App\Http\Controllers\Dashboard\SlideshowController as DashboardSlideshow;
use App\Http\Controllers\Dashboard\ProfilController as DashboardProfil;
use App\Http\Controllers\Dashboard\ProgramController as DashboardProgram;
use App\Http\Controllers\Dashboard\SosialMediaController as DashboardSosialMedia;
use App\Http\Controllers\Dashboard\TestimoniController as DashboardTestimoni;
use App\Http\Controllers\Dashboard\KategoriSwaraNusvantaraController as DashboardKategoriSwaraNusvantara;
use App\Http\Controllers\Dashboard\SwaraNusvantaraController as DashboardSwaraNusvantara;
use App\Http\Controllers\Dashboard\KomentarSwaraNusvantaraController as DashboardKomentarSwaraNusvantara;
use App\Http\Controllers\Dashboard\LaporanSahabatController as DashboardLaporanSahabat;
use App\Http\Controllers\Dashboard\DukunganSahabatController as DashboardDukunganSahabat;
use App\Http\Controllers\Dashboard\KontakKamiController as DashboardKontakKami;
use App\Http\Controllers\Dashboard\SubscribeController as DashboardSubscribe;
use App\Http\Controllers\Dashboard\GaleriController as DashboardGaleri;
use App\Http\Controllers\Dashboard\WidgetController as DashboardWidget;

//Konfigurasi Aplikasi
use App\Http\Controllers\Dashboard\MenuController as DashboardMenu;
use App\Http\Controllers\Dashboard\LevelSistemController as DashboardLevelSistem;
use App\Http\Controllers\Dashboard\AdminController as DashboardAdmin;
use App\Http\Controllers\Dashboard\KonfigurasiAplikasiController as DashboardKonfigurasiAplikasi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Beranda::class, 'index']);
Route::get('/cari', [Beranda::class, 'cari']);
Route::post('/subscribe', [BerandaController::class, 'subscribe']);
Route::get('/testimoni', [Testimoni::class, 'index']);
Route::post('/testimoni/kirim', [Testimoni::class, 'kirim']);
Route::get('/sosok', [Sosok::class, 'index']);
Route::get('/swara-nusvantara', [SwaraNusvantara::class, 'index']);
Route::get('/swara-nusvantara/cari', [SwaraNusvantara::class, 'cari']);
Route::get('/swara-nusvantara/kategori/{slug_kategori_swara_nusvantara}', [SwaraNusvantara::class, 'kategori']);
Route::get('/swara-nusvantara/detail/{slug_kategori_swara_nusvantara}/{slug_swara_nusvantara}', [SwaraNusvantara::class, 'detail']);
Route::post('/swara-nusvantara/komentar/kirim', [SwaraNusvantara::class, 'kirimkomentar']);
Route::get('/laporan-sahabat', [LaporanSahabat::class, 'index']);
Route::post('/laporan-sahabat/kirim', [LaporanSahabat::class, 'kirim']);
Route::get('/dukungan-sahabat', [DukunganSahabat::class, 'index']);
Route::post('/dukungan-sahabat/kirim', [DukunganSahabat::class, 'kirim']);
Route::get('/sitemap', function(){
    return redirect('sitemap.xml');
});
Route::get('/kota-kabupaten/{id}', [Wilayah::class, 'kotakabupaten']);
Route::get('/kecamatan/{id}', [Wilayah::class, 'kecamatan']);
Route::get('/kelurahan/{id}', [Wilayah::class, 'kelurahan']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::group(['prefix' => 'dashboard'], function (){
        //Dashboard
        Route::get('/', [Dashboard::class, 'index'])->name('dashboard');

        //Konfigurasi Profil
        Route::group(['prefix' => 'konfigurasi_profil'], function(){
            Route::get('/', [DashboardKonfigurasiProfil::class, 'index']);
            Route::post('/prosesedit', [DashboardKonfigurasiProfil::class, 'prosesedit']);
        });

        //Konfigurasi Akun
        Route::group(['prefix' => 'konfigurasi_akun'], function() {
            Route::get('/', [DashboardKonfigurasiAkun::class, 'index']);
            Route::post('/prosesedit', [DashboardKonfigurasiAkun::class, 'prosesedit']);
        });

        //Konfigurasi Web
            //Slideshow
            Route::group(['prefix' => 'slideshow'], function() {
                Route::get('/', [DashboardSlideshow::class, 'index']);
                Route::get('/cari', [DashboardSlideshow::class, 'cari']);
                Route::get('/tambah', [DashboardSlideshow::class, 'tambah']);
                Route::post('/prosestambah', [DashboardSlideshow::class, 'prosestambah']);
                Route::get('/edit/{id}', [DashboardSlideshow::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardSlideshow::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardSlideshow::class, 'hapus']);
            });

            //Profil
            Route::group(['prefix' => 'profil'], function() {
                Route::get('/', [DashboardProfil::class, 'index']);
                Route::post('/prosesedit', [DashboardProfil::class, 'prosesedit']);
            });

            //Program
            Route::group(['prefix' => 'program'], function() {
                Route::get('/', [DashboardProgram::class, 'index']);
                Route::get('/cari', [DashbooardProgram::class, 'cari']);
                Route::get('/tambah', [DashboardProgram::class, 'tambah']);
                Route::post('/prosestambah', [DashboardProgram::class, 'prosestambah']);
                Route::get('/edit/{id}', [DashboardProgram::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardProgram::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardProgram::class, 'hapus']);
            });

            //Sosial Media
            Route::group(['prefix' => 'sosial_media'], function() {
                Route::get('/', [DashboardSosialMedia::class, 'index']);
                Route::get('/cari', [DashboardSosialMedia::class, 'cari']);
                Route::get('/tambah', [DashboardSosialMedia::class, 'tambah']);
                Route::post('/prosestambah', [DashboardSosialMedia::class, 'prosestambah']);
                Route::get('/edit/{id}', [DashboardSosialMedia::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardSosialMedia::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardSosialMedia::class, 'hapus']);
            });

            //Testimoni
            Route::group(['prefix' => 'testimoni'], function() {
                Route::get('/', [DashboardTestimoni::class, 'index']);
                Route::get('/cari', [DashboardTestimoni::class, 'cari']);
                Route::get('/baca/{id}', [DashboardTestimoni::class, 'baca']);
                Route::get('/publikasi/{id}', [DashboardTestimoni::class, 'publikasi']);
                Route::get('/hapus/{id}', [DashboardTestimoni::class, 'hapus']);
            });

            //Kategori Swara Nusvantara
            Route::group(['prefix' => 'kategori_swara_nusvantara'], function(){
                Route::get('/', [DashboardKategoriSwaraNusvantara::class, 'index']);
                Route::get('/cari', [DashboardKategoriSwaraNusvantara::class, 'cari']);
                ROute::get('/tambah', [DashboardKategoriSwaraNusvantara::class, 'tambah']);
                Route::post('/prosestambah', [DashboardKategoriSwaraNusvantara::class, 'prosestambah']);
                Route::get('/edit/{id}', [DashboardKategoriSwaraNusvantara::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardKategoriSwaraNusvantara::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardKategoriSwaraNusvantara::class, 'hapus']);
            });

            //Swara Nusvantara
            Route::group(['prefix' => 'swara_nusvantara'], function() {
                Route::get('/', [DashboardSwaraNusvantara::class, 'index']);
                Route::get('/cari', [DashboardSwaraNusvantara::class, 'cari']);
                ROute::get('/tambah', [DashboardSwaraNusvantara::class, 'tambah']);
                Route::post('/prosestambah', [DashboardSwaraNusvantara::class, 'prosestambah']);
                Route::get('/baca/{id}', [DashboardSwaraNusvantara::class, 'baca']);
                Route::get('/edit/{id}', [DashboardSwaraNusvantara::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardSwaraNusvantara::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardSwaraNusvantara::class, 'hapus']);
            });

            //Komentar Swara Nusvantara
            Route::group(['prefix' => 'komentar_swara_nusvantara'], function() {
                Route::get('/', [DashboardKomentarSwaraNusvantara::class, 'index']);
                Route::get('/cari', [DashboardKomentarSwaraNusvantara::class, 'cari']);
                Route::get('/baca/{id}', [DashboardKomentarSwaraNusvantara::class, 'baca']);
                Route::get('/publikasi/{id}', [DashboardKomentarSwaraNusvantara::class, 'publikasi']);
                Route::get('/hapus/{id}', [DashboardKomentarSwaraNusvantara::class, 'hapus']);
            });

            //Laporan Sahabat
            Route::group(['prefix' => 'laporan_sahabat'], function() {
                Route::get('/', [DashboardLaporanSahabat::class, 'index']);
                Route::get('/cari', [DashboardLaporanSahabat::class, 'cari']);
                Route::get('/baca/{id}', [DashboardLaporanSahabat::class, 'baca']);
                Route::get('/hapus/{id}', [DashboardLaporanSahabat::class, 'hapus']);
            });

            //Dukungan Sahabat
            Route::group(['prefix' => 'dukungan_sahabat'], function() {
                Route::get('/', [DashboardDukunganSahabat::class, 'index']);
                Route::get('/cari', [DashboardDukunganSahabat::class, 'cari']);
                Route::get('/baca/{id}', [DashboardDukunganSahabat::class, 'baca']);
                Route::get('/hapus/{id}', [DashboardDukunganSahabat::class, 'hapus']);
            });

            //Kontak Kami
            Route::group(['prefix' => 'kontak_kami'], function() {
                Route::get('/', [DashboardKontakKami::class, 'index']);
                Route::post('/prosesedit', [DashboardKontakKami::class, 'prosesedit']);
            });

            //Subscribe
            Route::group(['prefix' => 'subscribe'], function() {
                Route::get('/', [DashboardSubscribe::class, 'index']);
                Route::get('/hapus/{id}', [DashboardSubscribe::class, 'hapus']);
            });

            //Galeri
            Route::group(['prefix' => 'galeri'], function() {
                Route::get('/', [DashboardGaleri::class, 'index']);
                Route::get('/cari', [DashboardGaleri::class, 'cari']);
                Route::get('/tambah', [DashboardGaleri::Class, 'tambah']);
                Route::post('/prosestambah', [DashboardGaleri::class, 'prosestambah']);
                Route::get('/edit/{id}', [DashboardGaleri::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardGaleri::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardGaleri::class, 'hapus']);
            });

            //Widget
            Route::group(['prefix' => 'widget'], function() {
                Route::get('/', [DashboardWidget::class, 'index']);
            });

        //Konfigurasi Aplikasi
            //Menu
            Route::group(['prefix' => 'menu'], function () {
                Route::get('/', [DashboardMenu::class, 'index']);
                Route::get('/cari', [DashboardMenu::class, 'cari']);
                Route::get('/urutan', [DashboardMenu::class, 'urutan']);
                Route::post('/prosesurutan', [DashboardMenu::class, 'prosesurutan']);
                Route::get('/tambah', [DashboardMenu::class, 'tambah']);
                Route::post('/prosestambah', [DashboardMenu::class, 'prosestambah']);
                Route::get('/baca/{id}', [DashboardMenu::class, 'baca']);
                Route::get('/edit/{id}', [DashboardMenu::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardMenu::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardMenu::class, 'hapus']);
                Route::get('/submenu/{id}', [DashboardMenu::class, 'submenu']);
                Route::get('/cari_submenu/{id}', [DashboardMenu::class, 'cari_submenu']);
                Route::get('/tambah_submenu/{id}', [DashboardMenu::class, 'tambah_submenu']);
                Route::post('/prosestambah_submenu/{id}', [DashboardMenu::class, 'prosestambah_submenu']);
                Route::get('/urutan_submenu/{id}', [DashboardMenu::class, 'urutan_submenu']);
                Route::get('/baca_submenu/{id}', [DashboardMenu::class, 'baca_submenu']);
                Route::get('/edit_submenu/{id}', [DashboardMenu::class, 'edit_submenu']);
                Route::post('/prosesedit_submenu/{id}', [DashboardMenu::class, 'prosesedit_submenu']);
                Route::get('/hapus_submenu/{id}', [DashboardMenu::class, 'hapus_submenu']);
            });

            //Level Sistem
            Route::group(['prefix' => 'level_sistem'], function () {
                Route::get('/', [DashboardLevelSistem::class, 'index']);
                Route::get('/cari', [DashboardLevelSistem::class, 'cari']);
                Route::get('/tambah', [DashboardLevelSistem::class, 'tambah']);
                Route::post('/prosestambah', [DashboardLevelSistem::class, 'prosestambah']);
                Route::get('/baca/{id}', [DashboardLevelSistem::class, 'baca']);
                Route::get('/edit/{id}', [DashboardLevelSistem::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardLevelSistem::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardLevelSistem::class, 'hapus']);
            });

            //Admin
            Route::group(['prefix' => 'admin'], function () {
                Route::get('/', [DashboardAdmin::class, 'index']);
                Route::get('/cari', [DashboardAdmin::class, 'cari']);
                Route::get('/tambah', [DashboardAdmin::class, 'tambah']);
                Route::post('/prosestambah', [DashboardAdmin::class, 'prosestambah']);
                Route::get('/baca/{id}', [DashboardAdmin::class, 'baca']);
                Route::get('/edit/{id}', [DashboardAdmin::class, 'edit']);
                Route::post('/prosesedit/{id}', [DashboardAdmin::class, 'prosesedit']);
                Route::get('/hapus/{id}', [DashboardAdmin::class, 'hapus']);
            });

            //Konfigurasi Aplikasi
            Route::group(['prefix' => 'konfigurasi_aplikasi'], function () {
                Route::get('/', [DashboardKonfigurasiAplikasi::class, 'index']);
                Route::post('/prosesedit', [DashboardKonfigurasiAplikasi::class, 'prosesedit']);
                Route::post('/proseseditlogo', [DashboardKonfigurasiAplikasi::class, 'proseseditlogo']);
                Route::post('/prosesediticon', [DashboardKonfigurasiAplikasi::class, 'prosesediticon']);
                Route::post('/proseseditlogotext', [DashboardKonfigurasiAplikasi::class, 'proseseditlogotext']);
                Route::post('/proseseditgambarsubscribe', [DashboardKonfigurasiAplikasi::class, 'proseseditgambarsubscribe']);
                Route::post('/proseseditheader', [DashboardKonfigurasiAplikasi::class, 'proseseditheader']);
            });

        //Logout
        Route::get('/logout', [Dashboard::class, 'logout']);
    });
});
