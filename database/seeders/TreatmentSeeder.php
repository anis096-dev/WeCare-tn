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
            'currency' => 'dt',
            'specialty_id' => 1,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Pansement',
            'currency' => 'dt',
            'specialty_id' => 1,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Ablabation points de surture/agrafes',
            'currency' => 'dt',
            'specialty_id' => 1,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Aide à la toilette/aide à l\'habillage',
            'currency' => 'dt',
            'specialty_id' => 3,
            'price_day' => '10',
            'price_night_weekend' => '25',
        ]);

        Treatment::firstOrCreate([
            'name' => 'Srveillance glycémie/diabète',
            'currency' => 'dt',
            'specialty_id' => 3,
            'price_day' => '15',
            'price_night_weekend' => '25',
        ]);
    }
}
