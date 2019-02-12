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
      DB::table('brands')->insert(['name' => '984','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'BARCELITO','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'BERMELLON','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'BLUE','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'BY TRAIN','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'CHEITO','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'CHIC CHAC','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'CLOT','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'LOUISIANA','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'NARANJO','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'TID BIT','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'VOSS','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
