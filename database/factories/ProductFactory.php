<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->realTextBetween(10,20),
            'sub_category_id'=>fn()=>SubCategory::all()->random(),
            'description'=> $this->faker->realText(),
            'price'=> $this->faker->numberBetween(110,10000) ,
            'weight'=> $this->faker->numberBetween(110,1000) ,
            'image'=>$this->faker->imageUrl(),
            'stock'=> $this->faker->numberBetween(110,1000) ,
        ];
    }
}
