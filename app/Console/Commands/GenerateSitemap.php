<?php

namespace App\Console\Commands;

use App\Models\Master_kategori_swara_nusvantara;
use Illuminate\Console\Command;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;
use App\Models\Master_swara_nusvantara;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();
        $sitemap->add(
            Url::create("/")
                ->setPriority(1.0)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );
        $sitemap->add(
            Url::create("sosok")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );
        $sitemap->add(
            Url::create("swara-nusvantara")
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );
        Master_kategori_swara_nusvantara::orderBy('nama_kategori_swara_nusvantaras')->get()->each(function (Master_kategori_swara_nusvantara $kategori_swara_nusvantaras) use ($sitemap) {
            $sitemap->add(
                Url::create("/swara-nusvantara/{$kategori_swara_nusvantaras->slug_kategori_swara_nusvantaras}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        Master_swara_nusvantara::join('master_kategori_swara_nusvantaras','kategori_swara_nusvantaras_id','=','master_kategori_swara_nusvantaras.id_kategori_swara_nusvantaras')->orderBy('nama_kategori_swara_nusvantaras')->orderBy('judul_swara_nusvantaras')->get()->each(function (Master_swara_nusvantara $swara_nusvantara) use ($sitemap) {
            $sitemap->add(
                Url::create("/swara-nusvantara/{$swara_nusvantara->slug_kategori_swara_nusvantaras}/{$swara_nusvantara->slug_swara_nusvantaras}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        $sitemap->add(
            Url::create("laporan-sahabat")
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );
        $sitemap->add(
            Url::create("dukungan-sahabat")
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
