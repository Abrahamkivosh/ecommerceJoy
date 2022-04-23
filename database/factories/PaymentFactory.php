<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'order_id'=>fn()=>Order::all()->random(),
            'merchantRequestID' => $this->faker->uuid(),
            'checkoutRequestID'=>$this->faker->uuid() ,
            'result'=>$this->faker->uuid(),
            'merchantRequestID' => $this->faker->uuid(),
            'resultCode' => $this->faker->boolean(),
            'responseCode'=>$this->faker->randomElement(['200','401','400','500']),
            'resultDesc' =>$this->faker->randomElement(["The service request has been accepted successfully.","Rejected"]),
            'responseDescription'=>$this->faker->randomElement(["The service request has been accepted successfully.","Rejected"]),
            'customerMessage'=>$this->faker->randomElement(["The service request has been accepted successfully.","Rejected"]),
            'mpesaReceiptNumber'=> $this->faker->phoneNumber() ,
            'phoneNumber'=> $this->faker->phoneNumber() ,
            'amount'=> $this->faker->numberBetween(110,100000) ,
            'active' => $this->faker->boolean(70),
        ];
    }
}
