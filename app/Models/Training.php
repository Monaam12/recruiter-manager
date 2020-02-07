<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';

    protected $guarded = [];

    public function Curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
