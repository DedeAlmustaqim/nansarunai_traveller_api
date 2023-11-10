<?php

namespace Database\Factories;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
class ContentFactory extends Factory
{
  
    public function definition()
    {
        $category = Category::inRandomOrder()->first(); 
        $sub_category = SubCategory::inRandomOrder()->first(); 
       
        return [
            'name' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'category_id' => $category->id, // Ganti dengan id kategori yang sesuai
            'sub_category_id' => $sub_category->id, // Ganti dengan id sub-kategori yang sesuai
            'img_path' => 'https://images.unsplash.com/photo-1698444214003-dfdea976064a?q=80&w=1631&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

