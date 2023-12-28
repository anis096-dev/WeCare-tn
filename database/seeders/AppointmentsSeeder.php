<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointments')->delete();
        
        \DB::table('appointments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'adress' => 'test',
                'country_id' => '1',
                'city_id' => '2',
                'created_at' => '2023-10-16 12:12:48',
                'age' => '27',
                'deleted_at' => NULL,
                'duration' => '3 days - يوم',
                'email' => 'anis@gmail.com',
                'start_date' => '2023-10-17 09:00',
                'first_name' => 'test',
                'last_name' => 'test',
                'gender' => 'male',
                'appointment_id' => 'RDV_0000001',
                'Location_of_care' => 'Home - المنزل',
                'number_of_visits' => 'Just once - مرة واحدة',
                'phone' => '23222223',
                'prescription' => 'No',
                'prescription_file' => NULL,
                'specialty_id' => '1',
                'user_id' => NULL,
                'subtreatments' => '["1","2","3"]',
                'updated_at' => '2023-11-16 09:45:52',
            ),
        ));
        
        
    }
}