<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->fullname = 'Maicol Hidalgo';
        $user->birthdate = '06-09-2000';
        $user->email = "maicole.hidalgoz@autonoma.edu.co";
        $user->address = "carrera 8#57e-13";
        $user->password = "12345678";
        $user->phone = "3122901279";
        $user->role_id = 1; //para indicar que es el rol admin
        $user->save();
    }
}
