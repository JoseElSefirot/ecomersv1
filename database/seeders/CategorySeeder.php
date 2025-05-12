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
        //
        $categories = [
            ['name' => 'rostro', 'description' => 'Labiales, Rubor, Corrector'],
            ['name' => 'labios ', 'description' => 'Mascarillas,  etc.'],
            ['name' => 'ojos', 'description' => 'Tintes, Acondicionadores, etc.'],
        ];

        Category::insert($categories);
    }
}
