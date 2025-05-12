<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo de categorías
        $categories = [
            ['name' => 'Maquillaje', 'description' => 'Labiales, Rubor, Corrector'],
            ['name' => 'Skincare', 'description' => 'Mascarillas,  etc.'],
            ['name' => 'Cabello', 'description' => 'Tintes, Acondicionadores, etc.'],
            ['name' => 'Fragancias', 'description' => 'Perfumes, Cremas, etc.'],
        ];

        Category::insert($categories);
    }
}
