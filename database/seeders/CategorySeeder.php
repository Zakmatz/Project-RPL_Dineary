<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'WiFi Kencang',
            'Harga Terjangkau',
            'Instagrammable',
            'Rasa Terbaik',
            'Quiet & Cozy',
            'Nature Vibes',
            'WFC Friendly',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}