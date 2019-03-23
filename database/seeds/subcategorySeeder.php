<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class subcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subcategories')->insert(['name' => 'Cat1','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('subcategories')->insert(['name' => 'Cat2','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('subcategories')->insert(['name' => 'Cat3','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('subcategories')->insert(['name' => 'Cat4','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('subcategories')->insert(['name' => 'Cat5','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
