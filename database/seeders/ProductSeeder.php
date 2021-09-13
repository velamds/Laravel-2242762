<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory(30)->create();

    }
}
