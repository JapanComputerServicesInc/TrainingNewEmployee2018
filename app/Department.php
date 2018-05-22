<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Department extends Model
{
    protected $guarded = ['id'];

//    public function employee()
//    {
//        return $this->belongsTo(Employee::class);
//    }
}
