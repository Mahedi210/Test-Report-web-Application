<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestPageController extends Controller
{
    public function index(){

        return view('admin.test.ctest');

    }

    public function store(Request $request){

        $tests= new Test();
        $tests->test_name=$request->testName;
        $tests->order_number=$request->orderNumber;
        $tests->save();
        return redirect('/ltest');
    }

    public function list(){

        $tests=Test::all();
        $tests = DB::table('tests')->orderBy('id', 'desc')->paginate(5);
        return view('admin.test.ltest',compact('tests'));

    }



    public function edit($id){

        $test=Test::find($id);
//        return redirect('/etest',compact($test));
        return view('admin.test.etest',compact('test'));

    }



    public function update(Request $request,$id){

        $tests=Test::find($id);
        $tests->test_name=$request->test_name;
        $tests->order_number=$request->order_number;
        $tests->save();
        return redirect('/ltest');

    }


    public function destroy($id){

        $test = Test::find($id);
        $test->delete();
        return redirect('/ltest');

    }



}
