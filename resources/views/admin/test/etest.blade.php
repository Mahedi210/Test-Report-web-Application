@extends('admin.amaster');

@section('content')

    <form action="{{route('test.update',$test->id)}}" method="POST">

        @csrf
        <div class="form-group">
            <label for="test_name">Test Name</label>
            <input type="text" class="form-control" id="test_name" name="test_name" value="{{$test->test_name}}">
        </div>

        <div class="form-group">
            <label for="order_number">Order Number</label>
            <input type="number" class="form-control" id="order_number" name="order_number" value="{{$test->order_number}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection


