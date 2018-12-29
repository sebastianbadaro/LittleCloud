<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
    	foreach (range(1,20) as $index)
      {
	        DB::table('clients')->insert([
	            'firstname' => $faker->firstName,
	            'lastname' => $faker->lastname,
	            'email' => $faker->email,
	            'phone' => $faker->phoneNumber,
	            'DNI' => $faker->ssn,
	            'address' => $faker->streetAddress,
	            'birthdate' => $faker->dateTimeBetween('-60 years', '-18 years'),
	            'gender_id' => rand(1,3),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

	        ]);
	    }
    }
}
