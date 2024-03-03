<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role=new Role();
        $role->name='Organisateur';
        $role->save();

        User::create([
            'name' => 'organisateur',
            'email' => 'organisateur@gmail.com',
            'password' => bcrypt('organisateur@gmail.com'),
            'id_role' => '2',
        ]);
    }
}
