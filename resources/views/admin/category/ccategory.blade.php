@extends('admin.amaster')

@section("content")

    <form action="{{route('category.store')}}" method="POST" class="form-inline">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Please inpute category name">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="order_number">Order Number</label>
                    <input type="number" class="form-control" id="order_number" name="order_number" placeholder="please input order number">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection


<div class="row">
    <div class="col-md-12">

    </div>
</div>

