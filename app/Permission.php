<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
