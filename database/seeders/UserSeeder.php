<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $user = new User();
        // $user->name = 'user';
        // $user->alias = 'sudo';
        // $user->payment_type = 0;
        // $user->email = 'user@gmail.com';
        // $user->password = Hash::make('user');
        // $user->user_role = 1;
        // $user->status = 1;
        // $user->non_payment_count = 0;
        // $user->ban_user = 0;
        // $user->save();
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            $data = new User();
            $data->name = $faker->name;
            $data->number = 1;
            $data->alias = $faker->randomElement([substr(str_shuffle($characters), 0, 4)]);
            $data->payment_type = 0; 
            $data->email = $faker->email; 
            $data->password = Hash::make('user'); 
            $data->user_role = 2; 
            $data->status = 0; 
            $data->save();
        }

       
    }
}
