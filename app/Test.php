<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'test_name', 'order_number'
    ];
}
