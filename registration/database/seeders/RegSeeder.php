<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RegData;
use Faker\Factory as Faker;

class RegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {
        $faker = Faker::create();
        $regData = new RegData;
        $regData->name = $faker->name;
        $regData->email = $faker->email;
        $regData->mobile = "999999999";
        $regData->gender = "female";
        $regData->education = "GRADUATE";
        $regData->hobbie = "cricket";
        $regData->save();

    }
}
