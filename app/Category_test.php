<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_test extends Model
{

    protected $table = 'category_tests';

    protected $fillable = [
        'category_id', 'test_id'
    ];

    public function category()

    {
        return $this->belongsTo(Category::class, 'category_id');

    }


    public function test()

    {
        return $this->belongsTo(Test::class, 'test_id');

    }

}

