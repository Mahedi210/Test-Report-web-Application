<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacherss';

    protected $fillable = [
        'name', 'email','phone','course',
    ];

}
