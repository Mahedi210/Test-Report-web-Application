<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryPageController extends Controller
{

    public function index(){

        return view('admin.category.ccategory');

    }



    public function store(Request $request){

        $this->validate($request,[
            'category_name' => 'required|string',
            'order_number' => 'required|integer',

        ]);

        $categorys= new Category;
        $categorys->category_name=$request->category_name;
        $categorys->order_number=$request->order_number;
        $categorys->save();
        return redirect('/lcategory');
    }

    public function edit($id){

        $category=Category::find($id);
        return view('admin.category.ecategory',compact('category'));
    }


    public function update(Request $request,$id){

        $categorys=Category::find($id);
        $categorys->category_name=$request->category_name;
        $categorys->order_number=$request->order_number;
        $categorys->save();
        return redirect('/lcategory');

    }


    public function list(){

        $categorys=Category::all();
        $categorys = DB::table('categories')->orderBy('id', 'desc')->paginate(5);
        return view('admin.category.lcategory',compact('categorys'));

    }


    public function destroy($id){

        $category = Category::find($id);
        $category->delete();
        return redirect('/lcategory');
    }


}
