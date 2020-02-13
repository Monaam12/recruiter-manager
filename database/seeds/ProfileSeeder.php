<?php

use App\Models\Curriculum;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skills;
use App\Models\Training;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(Curriculum::class, 200)->create();
        factory(Experience::class, 200)->create();
        factory(Project::class, 200)->create();
        factory(Skills::class, 200)->create();
        factory(Training::class, 200)->create();
    }
}
