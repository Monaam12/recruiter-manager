<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $guarded = [];

    public function Curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
