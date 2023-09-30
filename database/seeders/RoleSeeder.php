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

        User::factory(20)->create();
    }
}
