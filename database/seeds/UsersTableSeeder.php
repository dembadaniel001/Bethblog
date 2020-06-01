<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','dembadaniel001@gmail.com')->first();

        if (!$user) {
            User::create([

                'name' => 'Demba Daniel',
                'email' => 'dembadaniel001@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),

            ]);
        }
    }
}
