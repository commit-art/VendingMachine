<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'name' => 'Coca-cola',
            'price' => 1.5,
        ]);
        Product::factory()->create([
            'name' => 'Snickers',
            'price' => 1.2,
        ]);
        Product::factory()->create([
            'name' => "Lay's",
            'price' => 2,
        ]);
    }
}
