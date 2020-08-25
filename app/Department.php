<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Department extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
