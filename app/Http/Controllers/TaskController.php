<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function index(){

        return view('admin.task.create');
    }

    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:191',
            'course'=>'required|max:191',

        ]);

        if ($validator->fails()){

            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{

            $student=new Task();
            $student->name=$request->input('name');
            $student->email=$request->input('email');
            $student->phone=$request->input('phone');
            $student->course=$request->input('course');
            $student->save();

            return response()->json([
                'status'=>200,
                'message'=>'Added Successfully',
            ]);


        }


    }


    public function fetchData(){
        $tasks=Task::all();
        return response()->json([
            'tasks'=>$tasks,
        ]);
    }
}
