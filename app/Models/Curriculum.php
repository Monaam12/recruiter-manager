<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curricula';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(Skills::class);
    }

    public function Experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function Trainings()
    {
        return $this->hasMany(Training::class);
    }
}
