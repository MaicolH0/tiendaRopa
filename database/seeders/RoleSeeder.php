<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role -> name = "Admin";
        $role-> description = "Administrador del sistema";
        $role -> save();

        $role = new Role();
        $role -> name = "Seller";
        $role-> description = "Vendedor";
        $role -> save();

        $role = new Role;
        $role -> name = "Client";
        $role-> description = "Cliente";
        $role -> save();

        $user = new User;
        $user->fullname = 'Maicol Hidalgo';
        $user->birthdate = '06-09-2000';
        $user->email = "maicole.hidalgoz@autonoma.edu.co";
        $user->address = "carrera 8#57e-13";
        $user->password = "12345678";
        $user->phone = "3122901279";
        $user->role_id = 1; //para indicar que es el rol admin
        $user->save();

        User::factory(20)->create();
    }
}
