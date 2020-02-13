<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            'list-users', 'edit-users', 'delete-users',
            'list-role', 'create-role', 'edit-role', 'delete-role',
            'list-profile',
    ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
