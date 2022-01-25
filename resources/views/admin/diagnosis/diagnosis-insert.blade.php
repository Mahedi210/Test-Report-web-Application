@extends('admin.amaster')

@section('content')
    <form action="{{route('diagnosis.store')}}" method="POST" >
        @csrf
        <table class="table table-bordered align-self-auto"  style="width:100%">
            <thead>
            <tr>
                <td><div class="form-group form-inline">
                        <label for="exampleFormControlSelect1" class="text text-right">Category Name :</label>
                        <select class="form-control" id="category_id" name="category_id" >
{{--                            @if(count($categories)>0)--}}
{{--                                @foreach($categories as $category)--}}
{{--                                    @if($id == $category->id)--}}
{{--                                        <option value="{{ $category->id }}" >{{$category->category_name}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
                        </select>

                    </div></td>
                <td colspan="3"><div class="form-group form-inline">
                        <div class="form-group">
                            <label for="patient_name" class="text text-right">Patient name : </label>
                            <input type="text" class="form-control" id="Patient_name" name="patient_name" placeholder="Please inpute patient name">
                        </div>
                    </div>
                </td>

            </tr>
            </thead>
            <tbody>

            <tr>
                        <td>
                            <label class="text text-right" for="test_name">Test Name :</label>
                            <input type="text" id="result" name="test_name">
                        </td>

                        <td>
                             <label class="text text-right" for="result">Result</label>
                              <input type="text" id="result" name="result">
                        </td>

                        <td>
                            <label class="text text-right" for="remerks">Remerks</label>
                            <input type="text" id="remerks" name="remarks">
                        </td>

                        <td>
                            <label class="text text-right" for="Date">Date</label>
                            <input type="date" id="date" name="date">
                        </td>


            </tr>
            </tbody>
        </table>
        <input type="submit" class="btn-primary" name="submit" value="submit" />
    </form>
@endsection


