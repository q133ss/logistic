<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaypointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Waypoint::create([
            'user_id' => 1,
            'departure_date' => '09.06.2022',
            'travel_time' => '2 дня',
            'arrival_date' => '12.0.6.2022',
            'weight' => '1200 кг',
            'size' => '5 м3',
            'packages_qty' => '32',
            'departure_city_id' => 1,
            'arrival_city_id' => 3,
            'distance' => '1200 км',
            'passed' => '400 км',
            'type_id' => rand(1, 2),
            'workload' => rand(0, 85),
            'available_weight' => rand(200, 1000),
            'available_size' => rand(1, 3),
            'number' => rand(1, 99)
        ]);
    }
}
