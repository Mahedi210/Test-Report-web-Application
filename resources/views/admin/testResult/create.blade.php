@extends('admin.amaster')

{{--@section('content')--}}


{{--        <div class="form-group form-inline">--}}
{{--            <label for="exampleFormControlSelect1" >Category Name</label>--}}
{{--            <select class="form-control" id="category_id" name="category_name">--}}
{{--                <option>Select Category Name</option>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{$category->id }}">{{$category->category_name}}</option>--}}
{{--                    @endforeach--}}
{{--            </select>--}}
{{--            <div class="form-group form-inline col-sm-5">--}}
{{--                <div class="col-sm-2"><a href="{{url('/ecat',$category->id)}}" class="btn btn-primary">Insert</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--@endsection--}}
@section('content')
<table class="table table-bordered align-self-auto col-md-8">
    <thead>
    <tr>
        <th scope="col" class=" col col-sm-6">category Name</th>
        <th scope="col" class="col col-sm-2">Action</th>
    </tr>
    </thead>
    <tbody>

    @if(count($cats)>0)
        @foreach($cats as $cat)
            <tr>
                <td>{{!empty($cat->category->category_name)?$cat->category->category_name:'' }}</td>
                <td>
                    <div class="row">
                        <div><a href="{{url('/insert',$cat->category_id)}}" class="btn btn-primary">Insert Data</a>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
@endsection
