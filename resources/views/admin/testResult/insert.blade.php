@extends('admin.amaster')

@section('content')

    <form action="{{route('testResult.store')}}" method="POST" >
        @csrf
    <table class="table table-bordered align-self-auto"  style="width:100%">
        <thead>
        <tr>
            <td><div class="form-group form-inline">
                    <label for="exampleFormControlSelect1" class="text text-right">Category Name :</label>

                    <select class="form-control" id="category_id" name="category_id" >
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                                @if($id == $category->id)
                                    <option value="{{ $category->id }}" >{{$category->category_name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div></td>
            <td><div class="form-group form-inline">
                    <div class="form-group">
                        <label for="patient_name" class="text text-right">Patient name : </label>
                        <input type="text" class="form-control" id="Patient_name" name="patient_name" placeholder="Please inpute patient name">
                    </div>
                </div>
            </td>

        </tr>

        </thead>
        <tbody>



                            @if(count($categoryTests)>0)
                                @foreach($categoryTests as $categoryTest)
                                    <tr>
                                    <td>
                                        <label class="text text-right" for="test_name">{{$categoryTest->test->test_name}} :</label>
                                        <input type="text" id="result" name="test_result[{{ $categoryTest->test_id }}]">
                                    </td>

                                        <td>
                                            <label class="text text-right" for="remerks">Remerks</label>
                                            <input type="text" id="remerks" name="test_remarks[{{ $categoryTest->test_id }}]">
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <td>
                                <div class="form-group form-inline">
                                    <div class="form-group">
                                        <label class="text text-right" for="Date">date</label>
                                        <input type="date" id="date" name="date">
                                    </div>
                                </div>
                            </td>


        </tbody>
    </table>
    <input type="submit" class="btn-primary" name="submit" value="submit" />
    </form>

@endsection


