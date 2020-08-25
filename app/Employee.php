<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class Employee extends Model
{
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
