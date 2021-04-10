<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::firstOrCreate(['name' => 'Avril Lavigne']);
        Artist::firstOrCreate(['name' => 'Justin Bieber']);
        Artist::firstOrCreate(['name' => 'Taylor Swift']);
    }
}
