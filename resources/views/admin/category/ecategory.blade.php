@extends('admin.amaster');

@section('content')

    <form action="{{route('category.update',$category->id)}}" method="POST">

        @csrf

        <div class="form-group">

            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}">
        </div>

        <div class="form-group">
            <label for="order_number">Order Number</label>
            <input type="number" class="form-control" id="order_number" name="order_number" value="{{$category->order_number}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
