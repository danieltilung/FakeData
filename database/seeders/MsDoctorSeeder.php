<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MsDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create('it_IT');

        for($i =0; $i < 1000;$i++){
        DB::table('doctor')->insert([
            'DoctorName' => $faker->unique()->name,
            'DoctorDOB' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'DoctorAddress' => $faker->address,
            'DoctorSalary'=> $faker->randomElement($array = array (1000000,2000000,3000000,5000000,7000000,10000000))
        ]);
    }
    }
}
