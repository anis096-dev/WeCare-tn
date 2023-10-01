<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        Treatment::firstOrCreate([
            'name' => 'Injection',
            'specialty_id' => 1,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Pansement',
            'specialty_id' => 1,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Ablabation points de surture/agrafes',
            'specialty_id' => 1,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Aide à la toilette/aide à l\'habillage',
            'specialty_id' => 3,
            'price_day' => '10',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Srveillance glycémie/diabète',
            'specialty_id' => 3,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);
    }
}
