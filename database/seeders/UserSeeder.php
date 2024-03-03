<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role=new Role();
        $role->name='User';
        $role->save();

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user@gmail.com'),
            'id_role' => '3',
        ]);
    }
}
