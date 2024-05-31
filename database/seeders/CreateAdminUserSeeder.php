<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Renaud',
            'email' => 'houenourenaud3@gmail.com',
            'contact' => '69635976',
            'fonction' => 'Super Administrateur',
            'password' => bcrypt('@HoAzRe@')
        ]);

        $role = Role::create(['name' => 'Adminroot']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
