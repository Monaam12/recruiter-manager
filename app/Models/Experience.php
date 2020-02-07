<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $guarded = [];

    public function Curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
}
