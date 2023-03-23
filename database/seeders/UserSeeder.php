<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'full_name' => 'super_administrateur',
            'email' => 'super_admin@gmail.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role_id' => 1
        ]);





        
    }
}
