<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_test;
use App\Test;
use App\TestResult;
use App\TestResultDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DiagnosisController extends Controller
{

    public function index()
    {
        $tests = Test::all();
        $categories = Category::all();
        return view('admin.diagnosis.diagnosis-create', compact('categories', 'tests'));
    }

    public function insert()
    {

        return view('admin.diagnosis.diagnosis-insert');

    }

    public function edit($testResultId)
    {

        $categories = Category::where('status', 1)->pluck('category_name', 'id')->toArray();
        $testResults = TestResult::where([
            'id' => $testResultId,
            'status' => 1
        ])
            ->with('testResultDetail')
            ->first();
        return view('admin.diagnosis.diagnosis-edit', compact('categories', 'testResults'));

    }

    public function list()
    {

        $testResults = TestResult::where('status', 1)->with('category')->get();
        return view('admin.diagnosis.diagnosis-list', compact('testResults'));

    }

    public function fetchData(Request $request)
    {

        $categoryId = $request->category_id;
        $title = $request->title;
        $testResults = null;
        $testResults = TestResult::where([
            'title' => $title,
            'category_id' => $categoryId,
            'date' => date('Y-m-d')
        ])
            ->with('testResultDetail')
            ->first();
        $categoryTests = Category_test::where('category_id', $categoryId)->with('category', 'test')->get();
        return view('admin.diagnosis.category-wise-test', compact('categoryTests', 'testResults'));

    }


//store controller start

    public function store(Request $request)
    {
        {
//            dd($request);
            $title = $request->title;
            $category_id = $request->category_id;
            $results = $request->results;
            $remarks = $request->remarks;
            $dates = $request->dates;

            // dd($results);

            //DB::beginTransaction();
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
                //dd($testResult);

                //$insertedTestResult = null;
                //if (empty($testResultId)) {
                // dd($testResult);
                if (!$insertedTestResult = TestResult::create($testResult)) {
                    throw new \Exception('TestResult submission Failed!');
                }

                /*}
                else {
                    if (!TestResult::where('id', $testResultId)->update($testResult)) {
                        throw new \Exception('TestResult submission Failed!');
                    }
                }*/


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


                    //if (empty($testResultId)) {
                    if (!TestResultDetail::create($item)) {
                        //dd("hi");
                        throw new \Exception('TestResultDetail submission Failed!');
                    }
                    //dd("hello");
                    /*} else {
                        //dd($testIds);
                        if (!TestResultDetail::where('id', $testDetailIds[$testId])->update($item)) {
                            throw new \Exception('TestResultDetail submission Failed!');
                        }
                    }*/
                }

                //DB::commit();
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
    //store controller end

    //start update method
    public function update(Request $request)
    {

        {
//            dd($request);

            $title = $request->title;
            //dd($title);
            $testResultId = $request->test_result_id;
            $testDetailIds = $request->test_detail_ids;
            $category_id = $request->category_id;
            $results = $request->results;
            $remarks = $request->remarks;
            $dates = $request->dates;

            // dd($results);

            //DB::beginTransaction();
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
                //dd($testResult);

                $insertedTestResult = null;
                if (empty($testResultId)) {
                    // dd($testResult);
                    if (!$insertedTestResult = TestResult::create($testResult)) {
                        throw new \Exception('TestResult submission Failed!');
                    }

                } else {
                    if (!TestResult::where('id', $testResultId)->update($testResult)) {
                        throw new \Exception('TestResult submission Failed!');
                    }
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


                    if (empty($testResultId)) {
                        if (!TestResultDetail::create($item)) {
                            //dd("hi");
                            throw new \Exception('TestResultDetail submission Failed!');
                        }
                        //dd("hello");
                    } else {
                        //dd($testIds);
                        if (!TestResultDetail::where('id', $testDetailIds[$testId])->update($item)) {
                            throw new \Exception('TestResultDetail submission Failed!');
                        }
                    }
                }

                //DB::commit();
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
    //end update method

    //delete controller start

    public function destroy($id)

    {
        $testResult = TestResult::find($id);
        $testResult->delete();
        return redirect('/diagnosis-list');

    }

    //end delete controller


    public function reportCreate(Request $request)
    {

        // dd($request);
        $dateFrom = !empty($request->date_from) ? $request->date_from : '';
        $dateTo = !empty($request->date_to) ? $request->date_to : '';
        $categoryId = $request->category_id;
        // dd($categoryId);
        $testDetails = null;
        $charts = [];
        $finalData = [];
//        dd($dateFrom);

        if (!empty($dateFrom) && !empty($dateTo)) {
            $testDetails = TestResultDetail::where(['category_id' => $categoryId, 'status' => 1])
                ->whereBetween('date', [$dateFrom, $dateTo])
                ->with('test')
                ->get();
//            dd($testDetails);
            foreach ($testDetails as $key => $detail) {

                // dd($detail);

                if (empty($charts[$detail->test_id])) {
                    $charts[$detail->test_id] = [
                        'test_name' => $detail->test->test_name,
                        'results' => []
                    ];
                }
                $charts[$detail->test_id]['results'][$detail->date] = $detail->results;
            }
//             dd($charts);
        }
        //        dd($charts);

        $categories = Category::where('status', 1)->pluck('category_name', 'id')->toArray();

        //dd($categories);

        return view('admin.diagnosis.report-create', compact('categories', 'dateFrom', 'dateTo'));

    }

    public function reportView(Request $request)
    {

        // dd($request);
        $dateFrom = !empty($request->date_from) ? $request->date_from : '';
        $dateTo = !empty($request->date_to) ? $request->date_to : '';
        $categoryId = $request->category_id;
        // dd($categoryId);
        $testDetails = null;
        $charts = [];
        $finalData = [];
      /* dd($dateFrom);*/
        if (!empty($dateFrom) && !empty($dateTo)) {
            $testDetails = TestResultDetail::where(['category_id' => $categoryId, 'status' => 1])
                ->whereBetween('date', [$dateFrom, $dateTo])
                ->with('test')
                ->get();
          /* dd($testDetails);*/
            foreach ($testDetails as $key => $detail) {

                //dd($detail);

                if (empty($charts[$detail->test_id])) {
                    $charts[$detail->test_id] = [
                        'test_name' => $detail->test->test_name,
                        'results' => []
                    ];
                }
                $charts[$detail->test_id]['results'][$detail->date] = $detail->results;
            }

        }

        $finalResults = [];
        foreach($charts as $testId => $value) {
            /*dd($testId,$value);*/
            if (empty($finalResults[$testId])) {
                $finalResults[$testId] = [
                    'test_name' => $value['test_name'],
                    'results' => [],
                ];
                $finalResults[$testId]['results'][] = ['date', 'test'];
            }//dd($finalResults);
            foreach ($value["results"] as $key => $result) {
                $finalResults[$testId]['results'][] = [$key, (int)$result];
            }
        }//dd($finalResults);
        $demo = [
            ['Year', 'Sale'],
            ['2013', 200],
            ['2014', 250],
            ['2015', 660],
            ['2016', 1030]
        ];
        /*dd($demo,$finalResults);*/
         /*$testData=[];
         $testData[]=['year','sale'];
         foreach($finalResults as $finalResult){

            foreach ($finalResult["results"] as $nvalue){
                $testData[]=$nvalue;
            }
        }*/
     /* dd($testData);*/
        /*dd($finalResults);*/
        /*$fr = $finalResults[20]['results'];

        $demoData = json_encode($fr);*/
      /*  dd($demoData);*/
       /* $demoData1 = json_encode($demo);*/
    //  dd($demoData,$demoData1);
        $categories = Category::where('status', 1)->pluck('category_name', 'id')->toArray();
        return view('admin.diagnosis.report-view', compact('charts',  'categories', 'testDetails','finalResults'));
    }

}


