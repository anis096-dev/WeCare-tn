<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialty::firstOrCreate([
            'name' => 'Nurse',
            'slug' => 'NRS',
            'desc' => 'have many duties, including caring for patients, communicating with doctors, administering medicine and checking vital signs. nurses play a vital role in medical facilities and enjoy a large number of job opportunities.',
        ]);

        Specialty::firstOrCreate([
            'name' => 'Physiotherapist',
            'slug' => 'PHY',
            'desc' => 'Treatment to restore, maintain, and make the most of a patient\'s mobility, function, and well-being. It helps through physical rehabilitation, injury prevention, and health and fitness. Physiotherapists get you involved in your own recovery.',
        ]);

        Specialty::firstOrCreate([
            'name' => 'Care-giver',
            'slug' => 'C-G',
            'desc' => 'it ensures the hygiene and comfort of the patient under the responsibility of the nurse. It contributes to the care of the sick.',
        ]);
    }
}
