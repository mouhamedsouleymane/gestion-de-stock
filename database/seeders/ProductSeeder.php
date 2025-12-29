<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Filtre à huile', 'reference' => 'FH001', 'price' => 15.50, 'stock_quantity' => 50, 'category_id' => 1],
            ['name' => 'Plaquettes de frein avant', 'reference' => 'PF001', 'price' => 45.00, 'stock_quantity' => 30, 'category_id' => 2],
            ['name' => 'Amortisseur avant', 'reference' => 'AM001', 'price' => 120.00, 'stock_quantity' => 15, 'category_id' => 3],
            ['name' => 'Batterie 12V', 'reference' => 'BAT001', 'price' => 85.00, 'stock_quantity' => 20, 'category_id' => 4],
            ['name' => 'Rétroviseur droit', 'reference' => 'RET001', 'price' => 65.00, 'stock_quantity' => 10, 'category_id' => 5],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
