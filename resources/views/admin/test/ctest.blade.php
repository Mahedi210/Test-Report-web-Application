@extends('admin.amaster')

@section("content")

    <form action="{{route('test.store')}}" method="POST" class="form-inline">
        @csrf
        <div class="form-group">
            <label for="category_name">Test Name</label>
            <input type="text" class="form-control" id="test_name" name="testName" placeholder="Please inpute test name">
        </div>
        <div class="form-group">
            <label for="order_number">Order Number</label>
            <input type="number" class="form-control" id="order_number" name="orderNumber" placeholder="please input order number">
        </div>
        <div class="form-group"> <button type="submit" class="btn btn-primary">Submit</button></div>
    </form>

@endsection
