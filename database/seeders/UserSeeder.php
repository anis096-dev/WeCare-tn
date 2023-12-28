<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_id = Role::where('key','administrator')->first()->id;
        $country_id = Country::where('slug','TN')->first()->id;
        $city_id = City::where('slug','Tunis')->first()->id;

        User::firstOrCreate([
            'name'              => 'Admin',
            'phone'             => null,
            'date_of_birth'     => null,
            'gender'            => 'male',
            'occupation'        => null,
            'bio'               => null,
            'present_adress'    => null,
            'permanent_adress'  => null,
            'CIN'               => null,
            'file'              => null,
            'status'            => 1,
            'phone_verified'    => 1,
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'profile_photo_path'=> null,
            'password'          => Hash::make('password'), // password
            'remember_token'    => Str::random(10),
            'role_id'           => $role_id,
            'country_id'        => $country_id,
            'city_id'           => $city_id,
            'specialty_id'      => NULL,
            'last_seen'         => null,
        ]);
    }
}
