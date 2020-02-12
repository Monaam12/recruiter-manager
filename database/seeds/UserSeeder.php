<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
        ]);

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id', 'id')->all();
        $role->permissions()->sync($permissions);

        $admin->roles()->sync([$role->id]);

        for ($i = 0; $i < 10; ++$i) {
            factory(App\User::class, 100)->create();
        }
    }
}
