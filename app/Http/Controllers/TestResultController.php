<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_test;
use App\Test;
use App\TestResult;
use Illuminate\Http\Request;

class TestResultController extends Controller
{

    public function index(){

        $categories = Category::all();
        $cats = Category_test::where('status', 1)->with('category', 'test')->groupBy('category_id')->orderBy('id', 'desc')->paginate(5);
        return view('admin.testResult.create', compact( 'categories','cats'));

    }

    public function insert($id){

        $tests = Test::get();
        $categories = Category::all();
        $categoryTests = Category_test::where('category_id', $id)->with('category','test')->get();
        return view('admin.testResult.insert', compact('tests', 'categories', 'id', 'categoryTests'));

    }


    public function store(Request $request){

        $category_id=$request->category_id;
        $patient_name=$request->patient_name;
        $test_results=$request->test_result;
        $test_remarks=$request->test_remarks;
        $date=$request->date;
       //dd($category_id,$patient_name,$test_result,$test_remarks,$date,$test_id);

        //$res = count($request->test_result);
        //dd($res);
        //$i = 0;

        foreach($test_results as $kay => $value){

            $data = [
                'category_id'=>$category_id,
                'patient_name'=>$patient_name,
                'test_id'=>$kay,
                'test_result'=>$value,
                'test_remarks'=>$test_remarks[$kay],
                'date'=>$date,
            ];
            //$i++;
            TestResult::insert($data);
        }
        //dd($data);
        return back();
    }

    public function list(){

        return view('admin.testResult.list');

    }

    public function edit(){

        return view('admin.testResult.edit');

    }

    public function update(){


    }

    public function destroy(){


    }


}
