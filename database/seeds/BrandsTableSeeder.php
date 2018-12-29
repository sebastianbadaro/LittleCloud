<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('brands')->insert(['name' => 'ZUPPA','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'CROXI','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'GOLFUS 76','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
