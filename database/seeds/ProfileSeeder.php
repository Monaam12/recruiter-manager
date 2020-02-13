<?php

use App\Models\Curriculum;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\User::class, 100)->create();

        factory(Curriculum::class, 40)->create();
    }
}
