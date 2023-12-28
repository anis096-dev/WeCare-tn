<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TreatmentSeeder::class);
        $this->call(SubTreatmentSeeder::class);
        $this->call(AppointmentsSeeder::class);

    }
}
