<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductGendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('productgenders')->insert(['name' => 'Varon','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('productgenders')->insert(['name' => 'Nena','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('productgenders')->insert(['name' => 'Unisex','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
