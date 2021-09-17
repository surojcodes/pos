<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username'=> "admin",
            'name'=> "Bimala Manandhar",
            'password'=> Hash::make('@L4pqTYHS7'),
        ]);
    }
}
