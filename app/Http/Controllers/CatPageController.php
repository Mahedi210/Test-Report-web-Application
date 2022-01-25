<?php

namespace App\Http\Controllers;
use App\Category;
use App\Category_test;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatPageController extends Controller
{

    public function index()

    {
        $tests = Test::all();
        $categories = Category::all();
        return view('admin.cat.ccat', compact('tests', 'categories'));
    }


    public function store(Request $request)

    {
        $categoryTests = Category_test::where('category_id',$request->category_id)->pluck('test_id','test_id')->toArray();
        $tests = $request->test_id;
        $results=array_diff($tests,$categoryTests);

        foreach ($results as $result) {
            $data = [
                'category_id' => $request->category_id,
                'test_id' => $result,
            ];

            Category_test::insert($data);
        }
        //dd($data);
        return redirect('/lcat');
    }


    public function list()

    {
        $cats = Category_test::where('status', 1)->with('category', 'test')->groupBy('category_id')->orderBy('id', 'desc')->paginate(5);
        return view('admin.cat.lcat', compact('cats'));
    }


    public function edit($id)
    {
        $tests = Test::get();
        $categories = Category::all();
        $categoryTests = Category_test::where('category_id', $id)->pluck('test_id')->toArray();
        return view('admin.cat.ecat', compact('tests', 'categories', 'id', 'categoryTests'));

    }


    public function update(Request $request)

    {
        $categoryTests = Category_test::where('category_id',$request->category_id)->pluck('test_id', 'test_id')->toArray();
        $tests = $request->test_id;
        $data = [];
        foreach ($tests as $key => $test) {
            if (!empty($test)) {
                if(in_array($test, $categoryTests)){
                    unset($categoryTests[$test]);
                }else{
                    $data = [
                        'category_id' => $request->category_id,
                        'test_id' => $test,
                    ];
                    Category_test::insert($data);
                }
            }

        }

        foreach ($categoryTests as $categoryTest){

             $delete= Category_test::Where('test_id',$request->test_id=$categoryTest);
             $delete->delete();
        }

        return redirect('/lcat');

    }


    public function destroy($id)

    {
        $cat = Category_test::find($id);
        $cat->delete();
        return redirect('/lcat');

    }

    public function getdata(Request $request){

        $categoryTests=Category_test::where('category_id',$request->category_id)->pluck('test_id','test_id')->toArray();
        return response()->json([

            'categoryTests'=>$categoryTests,
        ]);


    }


    public function fetchdata($id){

        $tests = Test::get();
        $categories = Category::all();
        $categoryTests = Category_test::where('category_id', $id)->pluck('test_id')->toArray();
        return response()->json([

            'tests'=>$tests,
            'categories'=>$categories,
            'categoryTests'=>$categoryTests,

        ]);




    }


}
