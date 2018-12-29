<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
           GenderTableSeeder::class,
           PaymentTypeTableSeeder::class,
           SeasonsTableSeeder::class,
           ProductGendersTableSeeder::class,
           BrandsTableSeeder::class,
           CategoriesTableSeeder::class,
           ClientsTableSeeder::class,
           ProductsTableSeeder::class,
           SalesTableSeeder::class,
           SaleDetailsTableSeeder::class,
         ]);
    }
}
