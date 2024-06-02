<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actualite;


class ActualiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actualite::factory()->create([
            'title' =>'Actualite1',
            'content' => 'Lorem Ipsum is simply dummy text of the printing',

        ]);


        Actualite::factory()->create([
            'title' =>'Actualite2',
            'content' => 'Lorem Ipsum is simply dummy text of the printing',

        ]);

       


     

    }
}
