<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::firstOrCreate([
            'name' => 'Tunisia',
            'slug' => 'TN',
            'iso3' => 'TNU',
            'country_code' => '+216'
        ]);
    }
}
