<?php

use Illuminate\Database\Seeder;
use App\Superheroe;

class SuperheroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Superheroe::create([
            'name'=>'Spiderman',
            'producer' => 'MARVEL'
        ]);
        Superheroe::create([
            'name'=>'Hulk',
            'producer' => 'MARVEL'
        ]);
        Superheroe::create([
            'name'=>'Aquaman',
            'producer' => 'DC'
        ]);
        Superheroe::create([
            'name'=>'Thor',
            'producer' => 'MARVEL'
        ]);
        Superheroe::create([
            'name'=>'Linterna Verde',
            'producer' => 'DC'
        ]);
    }
}
