<?php

namespace App\Http\Controllers;

use App\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{

    public function index(){

        return view('admin.teacher.create');
    }

    public function fetchData(){
        $teachers=Teacher::all();
        return response()->json([
            'teachers'=>$teachers,
        ]);

    }

    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:191',
            'course'=>'required|max:191',
            ]);
        if($validator->fails()){
          return response()->json([
              'status'=>400,
              'errors'=>$validator->messages(),

          ]);

        }else{

            $teacher=new Teacher();
            $teacher->name=$request->input('name');
            $teacher->email=$request->input('email');
            $teacher->phone=$request->input('phone');
            $teacher->course=$request->input('course');
            $teacher->save();
            return response()->json([
                'status'=>200,
                'message'=>'Added Successfully',
            ]);


        }
    }

}
