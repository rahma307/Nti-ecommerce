<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class ProductUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
       $products = Product::all();

            foreach ($users as $user) {
                $user->products()->attach($products);
           }
    }
}
