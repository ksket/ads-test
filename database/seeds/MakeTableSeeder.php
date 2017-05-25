<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Make;

class MakeTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        Make::create(['name' => 'Mercedes']);
        Make::create(['name' => 'Mini Cooper']);
        Make::create(['name' => 'Renault']);
    }
    
}