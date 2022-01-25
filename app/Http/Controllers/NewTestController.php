<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_test;
use App\Test;
use App\TestResult;
use App\TestResult1;
use App\TestResultDetail;
use App\TestresultDetail1;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewTestController extends Controller
{
    public function index(){

//        $testResults = TestResult::where([
//            'id' => $testResultId ,  'status' => 1
//        ])->with('testResultDetails')->first();

        $tests = Test::all();
        $categories = Category::all();
        return view('admin.newtest.newtest-create',compact('categories','tests'));
    }


    public function insert(){

        return view('admin.diagnosis.diagnosis-insert');

    }
    public function edit(){

        return view('admin.diagnosis.diagnosis-edit');

    }

    public function list(){

        return view('admin.diagnosis.diagnosis-list');
    }

    public function fetchData(Request $request){
        $categoryTests = Category_test::where('category_id',$request->category_id)->pluck( 'test_id')->toArray();
        return response()->json([
            'categoryTest'=>$categoryTests,
        ]);

    }


    public function stor(Request $request){


        $this->validate($request, [

            'title' =>'required|max:48',
            'test_name'=>'required|max:48',
            'results'=>'required',
            'remarks' =>'required|max:48'
        ]);

        $title = $request->title;
        $test_name = $request->test_name;
        $category_id = $request->category_id;
        $results = $request->results;
        $remarks = $request->remarks;
        $dates = $request->dates;

        $testResult = [
            'category_id' => $category_id,
            'title' => $title,
            'date' => Carbon::now()
        ];

        TestResult1::insert($testResult);


        $testResultDetails=new TestresultDetail1;

        TestresultDetail1::create( [
            'test_name' => $test_name,
            'category_id' => $category_id,
            'results'=>$results,
            'remarks'=>$remarks,
            'date' => Carbon::now(),
        ]);

        return back();

    }

    public function store(Request $request){
        {
//            dd($request);

            $title = $request->title;
            //dd($title);
            $category_id = $request->category_id;
            $results = $request->results;
            $remarks = $request->remarks;
            $dates = $request->dates;

            // dd($results);
            try {
                /** counting if results is empty or not **/
                $cnt = 0;

                foreach ($results as $result) {
                    if ($result != null)
                        $cnt++;
                }
                if ($cnt == 0) {
                    throw new \Exception('Result field is Required!');
                }
                // dd($results);

                $testResult = [
                    'category_id' => $category_id,
                    'title' => $title,
                    'date' => Carbon::now()
                ];

                if (!$insertedTestResult =TestResult::create($testResult)) {
                    throw new \Exception('TestResult submission Failed!');
                }



                foreach ($results as $testId => $testResult) {
                    //dd($insertedTestResult->id);
                    $item = [
                        'test_result_id' => !empty($insertedTestResult) ? $insertedTestResult->id : "",
                        'category_id' => $category_id,
                        'test_id' => $testId,
                        'results' => !empty($testResult) ? $testResult : null,
                        'remarks' => !empty($remarks) ? $remarks[$testId] : '',
                        'date' => $dates[$testId],
                        'status' => !empty($testResult) ? 1 : 2,
                    ];


                    if (!TestResultDetail::create($item)) {
                        //dd("hi");
                        throw new \Exception('TestResultDetail submission Failed!');
                    }

                }

                return redirect()->route('diagnosis.create')
                    ->with([
                        'message' => __('Diagnosis saved Successfully'),
                        'alert-type' => 'success'
                    ]);

            } catch (\Throwable $exception) {
                dd($exception->getMessage());
                //DB::rollBack();
                Log::debug($exception->getMessage());

                return back()
                    ->with([
                        'message' => $exception->getMessage(),
                        'alert-type' => 'error'
                    ])->withInput();
            } finally {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            }
        }

    }
}
