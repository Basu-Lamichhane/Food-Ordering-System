<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions= [
        [ 'name' => 'Tandi',],
        [ 'name' => 'Parsa',],
        [ 'name' => 'Narayanghat',],
        [ 'name' => 'Bharatpur',],
        [ 'name' => 'Tikauli',],
                 ];
        foreach($regions as $region)
        {
            Region::create($region);
        }
    }
}
