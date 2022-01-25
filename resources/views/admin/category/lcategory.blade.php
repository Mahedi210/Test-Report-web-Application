@extends('admin.amaster')

@section("content")

    <div class="float-right">
        <a class="" href="{{route('category.create')}}">
            <input type="button" value="Create Category" class="btn btn-info "/>
        </a>
    </div>

    <table class="table">
        <thead>
        <tr>

            <th scope="col" class="col-sm-4">Category Name</th>
            <th scope="col" class="col-sm-4">Order Number</th>
            <th scope="col" class="col-sm-4">Action</th>
        </tr>
        </thead>
        <tbody>

        @if(count($categorys)>0)
            @foreach($categorys as $category)
                <tr>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->order_number}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-2"><a href="{{url('/ecategory',$category->id)}}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-sm-2">
                                <form action="{{url(url('/dcategory',$category->id))}}" method="POST">
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
    {{ $categorys->links()}}

@endsection

