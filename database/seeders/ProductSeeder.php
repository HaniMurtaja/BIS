<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothingCategory = Category::where('name_ar', 'الملابس')->first();
        $electronicsCategory = Category::where('name_ar', 'الإلكترونيات')->first();

        Product::create([
            'name_ar' => 'قميص رجالي',
            'description_ar' => 'قميص رجالي فاخر مصمم من أفضل المواد.',
            'price' => 100.50,
            'image' => 'path_to_image.jpg',
            'category_id' => $clothingCategory->id,
        ]);

        Product::create([
            'name_ar' => 'هاتف ذكي',
            'description_ar' => 'هاتف ذكي مع شاشة كبيرة وكاميرا عالية الجودة.',
            'price' => 500.99,
            'image' => 'path_to_image.jpg',
            'category_id' => $electronicsCategory->id,
        ]);
    }
}
