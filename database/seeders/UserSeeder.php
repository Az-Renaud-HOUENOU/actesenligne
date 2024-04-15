<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Cyrille',
            'email' => 'cyrille@gmail.com',
            'contact' => '98652471',
            'password' => Hash::make('123456'),
            'fonction' => 'Secrétaire Administratif'
        ]);
        DB::table('etudiants')->insert([
            'nom' => 'CODJO',
            'prenom' => 'Jean',
            'option' => 'Génie Logiciel',
            'email' => 'codjojean@gmail.com',
            'matricule' => '52896247',
            'password' => Hash::make('CJEAN'),
            'contact' => '64848498'
        ]);
    }
}
