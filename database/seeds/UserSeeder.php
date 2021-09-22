<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create([
            'first_name' => 'Noel',
            'last_name' => 'Kapungu',
            'email' => 'admin@gmail.com',
            'address' => 'Mombasa',
            'phone_no' => '0766567867',
            'gender' => 'Male',
            'password' => Hash::make('123456'),
        ]);
    }
}