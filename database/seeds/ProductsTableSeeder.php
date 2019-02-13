<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;


  class ProductsTableSeeder extends Seeder
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
            DB::table('products')->insert([
                'code' => $faker->lexify('?????????????'),
                'price' => $faker->randomFloat(2,100,1500),
                'size' => rand(0,20),
                'description' => $faker->sentence(6,true),
                'ageTarget' =>  rand(0,12),
                'category_id' =>  rand(1,5),
                'brand_id' =>  rand(1,12),
                'season_id' =>  rand(1,2),
                'productGender_id' =>  rand(1,3),
                'stock' =>  rand(1,10),


            ]);
        }
    }
}
