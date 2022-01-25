<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $guarded = [];
    protected $table = 'test_results';

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function testResultDetail(){

        return $this->hasMany(TestResultDetail::class)->with('test');
    }



}
