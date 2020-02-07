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
        Curriculum::create([
                'first_name' => 'admin',
                'last_name' => 'admin',
                'age' => '20',
                'address' => 'street kalban',
                'phone' => '72727427',
        ]);
    }
}
