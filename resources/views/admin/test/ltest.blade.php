@extends('admin.amaster')

@section("content")

    <div class="float-right">
        <a class="" href="{{route('test.create')}}">
            <input type="button" value="Create test" class="btn btn-info "/>
        </a>
    </div>

    {{--    <div class="nav">--}}

    {{--        <div class="sb-sidenav-menu-heading">Category</div>--}}
    {{--        <a class="nav-link" href="{{url('/ccategory')}}">--}}
    {{--            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>--}}
    {{--            Create Category--}}
    {{--        </a>--}}


    {{--    </div>--}}

    <table class="table">
        <thead>
        <tr>

            <th scope="col" class="col-sm-4">Test Name</th>
            <th scope="col" class="col-sm-4">Order number</th>
            <th scope="col" class="col-sm-4">Action</th>
        </tr>
        </thead>
        <tbody>

        @if(count($tests)>0)
            @foreach($tests as $test)

                <tr>
                    <td>{{$test->test_name}}</td>
                    <td>{{$test->order_number}}</td>
                    <td>

                        <div class="row">
                            <div class="col-sm-2"><a href="{{url('/etest',$test->id)}}" class="btn btn-primary">Edit</a></div>

                            <div class="col-sm-2">
                                <form action="{{url(url('/dtest',$test->id))}}" method="POST">
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

    {{$tests->links()}}

@endsection

