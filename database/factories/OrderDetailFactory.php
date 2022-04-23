<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id'=>fn()=>Product::all()->random(),
            'order_id'=>fn()=>Order::all()->random(),
            'quantity'=>$this->faker->numberBetween(1,5),
            'sub_total' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
