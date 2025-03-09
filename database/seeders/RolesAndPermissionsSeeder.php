<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = ['create-record', 'edit-record', 'delete-record'];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        $dataEntry = Role::create(['name' => 'data-entry']);
        $admin = Role::create(['name' => 'admin']);

        $dataEntry->givePermissionTo('create-record');
        $admin->givePermissionTo($permissions);

        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123')
        ]);

        $user2 = User::create([
            'name' => 'data entry',
            'email' => 'dataentry@email.com',
            'password' => bcrypt('data123')
        ]);


        $user1->assignRole('admin');
        $user2->assignRole('data-entry');

    }
}
