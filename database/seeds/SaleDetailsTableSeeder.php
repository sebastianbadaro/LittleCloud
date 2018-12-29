<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SaleDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,600) as $index)
      {
          DB::table('saleDetails')->insert([
              'sale_id' => rand(1,100),
              'product_id' => rand(1,5),
              'price' => rand(1,5),
              'amount' => $faker->randomFloat(2,100,1500),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

          ]);
      }
    }
}
