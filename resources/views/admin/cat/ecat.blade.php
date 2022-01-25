@extends('admin.amaster')

@section('content')

    <form action="{{route('test&category.update')}}" method="POST" >
        @csrf
        <div class="form-group form-inline">
            <label for="exampleFormControlSelect1" >Category Name</label>

            <select class="form-control" id="category_id" name="category_id">
                @if(count($categories)>0)
                    @foreach($categories as $category)
                        @if($id == $category->id)
                         <option value="{{ $category->id }}" selected>{{$category->category_name}}</option>
                        @else
                            <option value="{{ $category->id }}">{{$category->category_name}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group form-inline">
            @if(count($tests)>0)
                @foreach($tests as $test)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{ in_array($test->id, $categoryTests)?'checked':'' }} type="checkbox" id="test_id" name="test_id[]" value="{{ $test->id }}">
                        <label class="form-check-label" for="inlineCheckbox1">{{$test->test_name}}</label>
                    </div>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

