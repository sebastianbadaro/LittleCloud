<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert(['name' => 'Remera','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'subcategory_id' => 2]);
      DB::table('categories')->insert(['name' => 'Pantalon','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'subcategory_id' => 1]);
      DB::table('categories')->insert(['name' => 'Abrigo','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'subcategory_id' => 3]);
      DB::table('categories')->insert(['name' => 'Biju','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'subcategory_id' => 1]);
      DB::table('categories')->insert(['name' => 'Calzado','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'subcategory_id' => 1]);
    }
}
