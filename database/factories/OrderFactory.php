<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['pending','approved','delivered','rejected']);
        return [
            'user_id'=>fn()=>User::all()->random(),
            'amount' => $this->faker->randomFloat(2, 0, 10000),
            'shipping_address'=>$this->faker->streetAddress() ,
            'order_phone'=>$this->faker->phoneNumber(),
            'status' => $status ,
            'delivery_date' =>Carbon::now()->addDays(random_int(0,30))
        ];
    }
}
