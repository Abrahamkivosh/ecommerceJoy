<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(4)->create();

        if ( User::where('email','josephine@gmail.com')->count() <= 0) {
            # code...
            User::create([
                'name'=>"Super Admin",
                'email'=>"super@gmail.com",
                'phone'=>"0701019722",
                'password'=>Hash::make("password"),
                'is_admin'=> 1
            ]) ;

        }
        $this->call([
            // CategorySeeder::class,
            // SubCategorySeeder::class,
            // ProductSeeder::class,
            // ImageSeeder::class,
            // ReviewSeeder::class,
            // OrderSeeder::class,
            // OrderDetailSeeder::class,
            // PaymentSeeder::class,

        ]);
    }
}
