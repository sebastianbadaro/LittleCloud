<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('notifications')->insert(['description' => 'Bienvenido a Little Cloud','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'seen' => false]);
      DB::table('notifications')->insert(['description' => 'Queda 0 stock de Jean Rojo','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'seen' => false]);
      DB::table('notifications')->insert(['description' => 'Queda 0 stock de Remera Blanca','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'seen' => false]);

    }
}
