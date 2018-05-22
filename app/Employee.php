<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo(\App\Department::class);
    }
}
