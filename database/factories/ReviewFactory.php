<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>fn()=>User::all()->random(),
            'product_id'=>fn()=>Product::all()->random(),
            'review'=> $this->faker->realText(),
            'rating'=>$this->faker->numberBetween(1,5)
        ];
    }
}
