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
        //\App\Models\User::factory(5)->create();
        DB::table('users')->insert([
            'name' => 'Renaud',
            'email' => 'houenourenaud3@gmail.com',
            'matricule' => '15978821',
            'password' => Hash::make('@HoAzRe@'),
            'fonction' => 'Super Administrateur'
        ],
        [
            'name' => 'Jean',
            'email' => 'codjojean@gmail.com',
            'matricule' => '52896247',
            'password' => Hash::make('CJEAN'),
            'fonction' => 'Etudiant'
        ]);
    }
}
