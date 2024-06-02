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
            'url' =>'Actualites/actualite1.png',
            'actualite_id' => 1,

        ]);

        Image::factory()->create([
            'url' =>'Actualites/actualite2.jpg',
            'actualite_id' => 1,

        ]);

        Image::factory()->create([
            'url' =>'Actualites/journal.jpg',
            'actualite_id' => 2,

        ]);
    }
}
