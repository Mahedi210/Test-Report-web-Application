@extends('admin.amaster')

@section('content')

    <div class="float-right">

        <a class="" href="{{url('/ccat')}}">
            <input type="button" value="Create Category" class="btn btn-info "/>
        </a>

    </div>

    <table class="table table-bordered align-self-auto">
        <thead>
        <tr>
            <th scope="col" class=" col col-sm-4">category Name</th>
            <th scope="col" class="col col-sm-4">Test name</th>
            <th scope="col" class="col col-sm-4">Action</th>
        </tr>
        </thead>
        <tbody>

        @if(count($cats)>0)
            @foreach($cats as $cat)
                <tr>
                    <td>{{ !empty($cat->category->category_name)?$cat->category->category_name:'' }}</td>
                    <td>{{ !empty($cat->test->test_name)?$cat->test->test_name:'' }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2"><a href="{{url('/ecat',$cat->category_id)}}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-sm-2">
                                <form action="{{url(url('/dcat',$cat->id))}}" method="POST">
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
    {{$cats->links()}}
@endsection


