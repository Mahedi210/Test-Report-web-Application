
@extends('admin.amaster')

@section('content')


    <form action="{{route('test&category.store')}}" method="POST" >
        @csrf
        <div class="form-group form-inline">
            <label for="exampleFormControlSelect1" >Category Name</label>
            <select class="form-control" id="category_id" name="category_id">
                @if(count($categories)>0)
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->category_name}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group form-inline">
            @if(count($tests)>0)
                @foreach($tests as $test)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="test_id" name="test_id[]" value="{{ $test->id }}">
                        <label class="form-check-label" for="inlineCheckbox1">{{$test->test_name}}</label>
                    </div>

                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection

{{--@section('script')--}}

{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $('#category_id').change(function (){--}}


{{--                // console.log($('#category_id').val());--}}
{{--                alert($('#category_id').val());--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--@endsection--}}

{{--@extends('admin.amaster')--}}

{{--@section('content')--}}

{{--    <form action="{{route('test&category.store')}}" method="POST" >--}}
{{--        @csrf--}}
{{--        <div class="form-group form-inline">--}}
{{--            <label for="exampleFormControlSelect1" >Category Name</label>--}}

{{--                    <select class="form-control" id="category_id" name="category_id">--}}
{{--                        <option>Select Category Name</option>--}}
{{--                        @if(count($categories)>0)--}}
{{--                            @foreach($categories as $category)--}}
{{--                        <option value="{{ $category->id }}">{{$category->category_name}}</option>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </select>--}}
{{--        </div>--}}

{{--        <div class="form-group form-inline" id="show">--}}

{{--        </div>--}}
{{--        <button type="submit" class="btn btn-primary">Submit</button>--}}

{{--    </form>--}}
{{--@endsection--}}

{{--@section('script')--}}

{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $(document).on('click','#category_id',function (e){--}}
{{--                e.preventDefault();--}}
{{--                function fetchdata(){--}}
{{--                    $.ajaxSetup({--}}
{{--                        headers: {--}}
{{--                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                        }--}}
{{--                    });--}}
{{--                    $.ajax({--}}
{{--                        type:'get',--}}
{{--                        url:'/getdata',--}}
{{--                        dataType:"json",--}}
{{--                        success:function (response){--}}
{{--                            --}}{{--$.each(response.tests,function (key,test){--}}
{{--                            --}}{{--    $('#show').append(--}}
{{--                            --}}{{--      ' <div class="form-check form-check-inline">\--}}
{{--                            --}}{{--        <input class="form-check-input" {{ in_array($test->id, $categoryTests)?'checked':'' }} type="checkbox" id="test_id" name="test_id[]" value="{{ $test->id }}">\--}}
{{--                            --}}{{--        <label class="form-check-label" for="inlineCheckbox1">'+test->test_name+'</label>\--}}
{{--                            --}}{{--       </div>',--}}
{{--                            --}}{{--    );--}}
{{--                            --}}{{--});--}}
{{--                        }--}}

{{--                    })--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

