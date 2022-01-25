<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResultDetail extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function testResult(){
        return $this->belongsTo(TestResult::class,'test_result_id');
    }

    public function test(){
        return $this->belongsTo(Test::class,'test_id');
    }


}
