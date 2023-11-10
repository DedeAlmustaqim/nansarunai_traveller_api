<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
  
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'img_path' => 'https://images.unsplash.com/photo-1698444214003-dfdea976064a?q=80&w=1631&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}