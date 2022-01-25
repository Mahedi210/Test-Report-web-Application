@extends('admin.amaster')

@section("content")

    <div class="float-right">
        <a class="" href="{{route('diagnosis.create')}}">
            <input type="button" value="Create Diagnosis" class="btn btn-info "/>
        </a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="col-sm-4">Category Name</th>
            <th scope="col" class="col-sm-4">Title</th>
            <th scope="col" class="col-sm-4">Action</th>
        </tr>
        </thead>

        <tbody>

        @if(count($testResults)>0)
            @foreach($testResults as $testResult)
            <tr>
                <td>{{$testResult->category->category_name}}</td>
                <td>{{$testResult->title}}</td>
                <td>
                    <div class="row">
                        <div class="col-sm-2"><a href="{{url('/diagnosis-edit',$testResult->id)}}" class="btn btn-primary">Edit</a></div>

                        <div class="col-sm-2">
                            <form action="{{url(url('/diagnosis-delete',$testResult->id))}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                            </form>

                        </div>

                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
@endsection

