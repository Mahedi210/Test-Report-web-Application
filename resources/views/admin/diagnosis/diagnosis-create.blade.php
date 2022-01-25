@extends('admin.amaster')
@section('content')

     <form action="{{route('diagnosis.store')}}" method="POST" >
            @csrf
            <div class="row ml-5">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @if(count($categories)>0)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="title" class="text text-right">Title : </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Please inpute title">
                        </div>
                    </div>
                </div>
                <div id="diagnosis">
                </div>

            </div>
        </form>
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $('#category_id').change(function (){
                let category_id=$('#category_id').val();
                let title=$('#title').val();
              /*  console.log(category_id),*/
                fetchData(category_id,title);
            });
        })

        function fetchData(category_id,title){
            //alert(category_id);
            $.ajax({
                type:'get',
                url:'/fetchData',
                data: {
                    'category_id': category_id,
                    'title': title,
                },
                success:function (response){
                    console.log(response);
                    $('#diagnosis').empty()
                    $('#diagnosis').html(response);
                }
            });
        }

    </script>
@endsection

