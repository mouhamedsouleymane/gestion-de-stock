<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Moteur', 'description' => 'Pièces pour moteur automobile'],
            ['name' => 'Freinage', 'description' => 'Système de freinage'],
            ['name' => 'Suspension', 'description' => 'Amortisseurs et ressorts'],
            ['name' => 'Électrique', 'description' => 'Composants électriques'],
            ['name' => 'Carrosserie', 'description' => 'Pièces de carrosserie'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
