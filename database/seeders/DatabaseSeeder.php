<?php

namespace Database\Seeders;

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

        $this->call(ProductsSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(UserRolesTableSeeder::class);
        // $this->call(BrandsSeeder::class);
        // $this->call(RelatedProductsSeeder::class);
        // $this->call(CategoriesSeeder::class);
    }
}
