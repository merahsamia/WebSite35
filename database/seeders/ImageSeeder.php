<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::factory()->create([
            'url' =>'Actualites/relogement-2.jpg',
            'actualite_id' => 1,

        ]);

        Image::factory()->create([
            'url' =>'Actualites/relogement-3.jpg',
            'actualite_id' => 1,

        ]);

        Image::factory()->create([
            'url' =>'Actualites/KJWEUlftB1It3JiNAGRMX967tCdCd184YfBPhJca.jpg',
            'actualite_id' => 2,

        ]);
    }
}
