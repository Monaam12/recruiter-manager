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
            'user-list', 'user-edit', 'user-delete',
            'role-list', 'role-create', 'role-edit', 'role-delete',
    ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
