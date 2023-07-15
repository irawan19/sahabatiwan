<?php

namespace App\Console\Commands;

use App\Models\Master_swara_nusvantara;
use Illuminate\Console\Command;
use App\Models\Master_subscribe;
use App\Models\Subscribe_swara_nusvantara;
use App\Mail\Subscribe;
use Illuminate\Support\Facades\Mail;

class KirimSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribe:kirim';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirimkan swara nusvantara ke subscribe email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ambil_master_subscribe = Master_subscribe::get();
        if(!$ambil_master_subscribe->isEmpty())
        {
            foreach($ambil_master_subscribe as $subscribe)
            {
                $ambil_swara_nusvantara = Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')
                                                                ->where('tanggal_publikasi_swara_nusvantaras','<=',date('Y-m-d H:i:s'))
                                                                ->where('tanggal_publikasi_swara_nusvantaras','>=',$subscribe->created_at)
                                                                ->get();
                foreach($ambil_swara_nusvantara as $swara_nusvantara)
                {
                    $ambil_subscribe = Subscribe_swara_nusvantara::where('subscribes_id',$subscribe->id_subscribes)
                                                                ->where('swara_nusvantaras_id',$swara_nusvantara->id_swara_nusvantaras)
                                                                ->count();
                    
                    if($ambil_subscribe == 0)
                    {
                        Mail::to($subscribe->email_subscribes)->send(new Subscribe($swara_nusvantara->judul_swara_nusvantaras, $swara_nusvantara->slug_kategori_swara_nusvantaras, $swara_nusvantara->slug_swara_nusvantaras));
                        
                        $subscribe_swara_nusvantaras_data = [
                            'swara_nusvantaras_id'  => $swara_nusvantara->id_swara_nusvantaras,
                            'subscribes_id'         => $subscribe->id_subscribes,
                            'created_at'            => date('Y-m-d H:i:s'),
                        ];
                        Subscribe_swara_nusvantara::insert($subscribe_swara_nusvantaras_data);

                        $this->info("Email telah dikirim ke ".$subscribe->email_subscribes);
                    }
                    else
                        $this->info("Tidak ada swara nusvantara baru");
                }
            }
        }
        else
            $this->info("Tidak ada email subscribe");
    }
}
