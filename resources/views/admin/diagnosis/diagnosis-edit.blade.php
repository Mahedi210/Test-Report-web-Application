@extends('admin.amaster')
@section('content')

    <form action="{{route('diagnosis.update')}}" method="POST" >
        @csrf
        <div class="row ml-5">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $categoryId => $categoryName)
                            <option {{$categoryId == $testResults->category_id ? 'selected' : ''}}
                                    value="{{ $categoryId }}">{{ !empty($categoryName) ? $categoryName : '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <div class="form-group">
                        <label for="title" class="text text-right">Title : </label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $testResults->title}}">
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr >
                                <th scope="col">Test Name</th>
                                <th scope="col">Result</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if((!empty($testResults)) && (!empty($testResults['testResultDetail'])))
                                <input type="hidden" name="test_result_id" value="{{ $testResults->id }}">
                                @foreach($testResults['testResultDetail'] as $testDetail)

                                    <tr>
                                        <input type="hidden"
                                               name="test_detail_ids[{{ !empty($testDetail->test_id) ? $testDetail->test_id : ''}}]"
                                               value="{{ $testDetail->id }}" class="mr-1">
                                        <td>
                                            <label
                                                class="mr-2">{{ !empty($testDetail->test->test_name) ? $testDetail->test->test_name : ''}}</label>
                                        </td>
                                        <td><input type="result"
                                                   name="results[{{ !empty($testDetail->test_id) ? $testDetail->test_id : ''}}]"
                                                   id="results"
                                                   value="{{ !empty($testDetail->results) ? $testDetail->results : ''}}"
                                                   class="form-control"></td>
                                        <td><input type="remark"
                                                   name="remarks[{{!empty($testDetail->test_id) ? $testDetail->test_id : ''}}]"
                                                   id="remarks"
                                                   value="{{ !empty($testDetail->remarks) ? $testDetail->remarks : ''}}"
                                                   class="form-control"></td>
                                        <td><input type="date"
                                                   name="dates[{{!empty($testDetail->test_id) ? $testDetail->test_id : ''}}]"
                                                   id="dates"
                                                   value="{{ !empty($testDetail->date) ? $testDetail->date : date('Y-m-d', strtotime(\Carbon\Carbon::now())) }}"
                                                   class="form-control"></td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>

                        </table>
                    </div>
                    <div class="row ml-2">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-outline-secondary float-right">Submit</button>
                        </div>
                    </div>
                </div>
        </div>

    </form>

@endsection
