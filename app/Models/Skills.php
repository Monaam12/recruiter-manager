<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';

    protected $guarded = [];

    public function Curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
