<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{

    public function definition()
    {
        $category = Category::inRandomOrder()->first(); 
        return [
            'name' => fake()->name(),
            'category_id' => $category->id
        ];
    }
}
