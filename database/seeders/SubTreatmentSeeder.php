<?php

namespace Database\Seeders;

use App\Models\subTreatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubTreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        subTreatment::firstOrCreate([
            'name' => 'Injection A',
            'currency' => 'dt',
            'treatment_id' => 1,
            'price_day' => '15',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Injection B',
            'currency' => 'dt',
            'treatment_id' => 1,
            'price_day' => '15',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Injection C',
            'currency' => 'dt',
            'treatment_id' => 1,
            'price_day' => '15',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Ablabatio An points de surture/agrafes A',
            'currency' => 'dt',
            'treatment_id' => 2,
            'price_day' => '15',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Aide à la A toilette/aide à l\'habillage A',
            'currency' => 'dt',
            'treatment_id' => 3,
            'price_day' => '10',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Aide à la A toilette/aide à l\'habillage B',
            'currency' => 'dt',
            'treatment_id' => 3,
            'price_day' => '10',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Srveillan Ace glycémie/diabète A',
            'currency' => 'dt',
            'treatment_id' => 4,
            'price_day' => '15',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);

        SubTreatment::firstOrCreate([
            'name' => 'Srveillan Ace glycémie/diabète B',
            'currency' => 'dt',
            'treatment_id' => 4,
            'price_day' => '15',
            'price_night' => '25',
            'price_weekend' => '25',
        ]);
    }
}
