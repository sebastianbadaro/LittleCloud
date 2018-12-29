<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('seasons')->insert(['name' => 'Invierno','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('seasons')->insert(['name' => 'Verano','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
