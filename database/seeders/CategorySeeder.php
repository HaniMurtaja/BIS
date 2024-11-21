<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name_ar' => 'الملابس']);
        Category::create(['name_ar' => 'الإلكترونيات']);
        Category::create(['name_ar' => 'الأثاث']);
    }
}
