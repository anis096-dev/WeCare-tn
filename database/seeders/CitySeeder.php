<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Ariana',
            'slug'=>'ariana',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Jendouba',
            'slug'=>'jendouba',
        ]);
        
        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Beja',
            'slug'=>'beja',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Siliana',
            'slug'=>'siliana',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Kef',
            'slug'=>'kef',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Tunis',
            'slug'=>'tunis',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Bizerte',
            'slug'=>'bizerte',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Kairouen',
            'slug'=>'kairouen',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Gasserin',
            'slug'=>'gasserin',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Gafsa',
            'slug'=>'gafsa',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Gabes',
            'slug'=>'gabes',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Mednine',
            'slug'=>'mednine',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Touzer',
            'slug'=>'touzer',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Ben Arous',
            'slug'=>'ben arous',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Manouba',
            'slug'=>'manouba',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Tatouine',
            'slug'=>'tatouine',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Tunis',
            'slug'=>'tunis',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Sfax',
            'slug'=>'sfax',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Mahdia',
            'slug'=>'mahdia',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Sousse',
            'slug'=>'sousse',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Nabel',
            'slug'=>'nabel',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Gbelli',
            'slug'=>'gbelli',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Monastir',
            'slug'=>'monastir',
        ]);

        City::firstOrCreate([
            'country_id'=> Country::where('slug','TN')->first()->id,
            'name'=>'Zaghouen',
            'slug'=>'zaghouen',
        ]);
    }
}
