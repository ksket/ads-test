<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class VehicleTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        // Mercedes
        Vehicle::create(['name' => 'C230', 'make_id' => 1]);
        Vehicle::create(['name' => 'GLA', 'make_id' => 1]);
        Vehicle::create(['name' => 'AMG 63', 'make_id' => 1]);
        
        // Mini Cooper
        Vehicle::create(['name' => 'Cooper S', 'make_id' => 2]);
        Vehicle::create(['name' => 'Countryman S', 'make_id' => 2]);
        Vehicle::create(['name' => 'John Cooper', 'make_id' => 2]);

        // Renault
        Vehicle::create(['name' => 'R19', 'make_id' => 3]);
        Vehicle::create(['name' => 'R25', 'make_id' => 3]);
        Vehicle::create(['name' => 'Super 5', 'make_id' => 3]);
    }
    
}