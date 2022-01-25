@extends('admin.amaster')

@section('content')

    <div class="modal fade" id="AddTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="saveform_errorlist"></ul>

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="name form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Email</label>
                        <input type="email" class="email form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Phone</label>
                        <input type="text" class="phone form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Course</label>
                        <input type="text" class="course form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_task" >Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-5">
                <div id="success_message"></div>
                <div class="card-header">
                    <h4>Task Data<a href="#" data-bs-toggle="modal" data-bs-target="#AddTaskModal" class="btn btn-primary float-end btn-sm">Add Task</a>  </h4>
                </div>
                <div class="card-body">
                    <table CLASS="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>course</th>
                            <th>EDIT</th>
                            <th>Delete</th>
                        </tr>
                        </thead>

                        <tbody>
{{--                        <tr>--}}
{{--                            <td>id</td>--}}
{{--                            <td>name</td>--}}
{{--                            <td>email</td>--}}
{{--                            <td>phone</td>--}}
{{--                            <td>phone</td>--}}
{{--                            <td>course</td>--}}
{{--                            <td>delete</td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function (){

            fetchTask()
            function fetchTask(){
                $.ajax({
                    type:'get',
                    url:'/fetch-task',
                    dataType:"json",
                    success:function (response){

                        console.log(response.tasks);

                        $.each(response.tasks,function (key,item){
                            $('tbody').append(
                                '  <tr>\
                                <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.email+'</td>\
                            <td>'+item.phone+'</td>\
                            <td>'+item.course+'</td>\
                            <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary">Edit</button></td>\
                            <td><button type="button" value="'+item.id+'" class="delete_student btn btn-danger">Delete</button></td>\
                        </tr>.'

                            );
                        });
                    }

                });

            }

            $(document).on('click','.add_task',function (e){
                e.preventDefault();
                var data={
                    'name':$('.name').val(),
                    'email':$('.email').val(),
                    'phone':$('.phone').val(),
                    'course':$('.course').val(),
                };
                 // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:"POST",
                    url:"/tacreate",
                    data:data,
                    dataType:"json",
                    success:function (response){
                        console.log(response);
                        if (response==400)
                        {
                            $('#saveform_errorlist').html('')
                            $('#saveform_errorlist').addClass('alert alert-danger');
                            $.each(response.errors,function (key,error_values){
                                $('#savefrom_errorlist').append('<li>'+error_values+'</li>')
                            });
                        }
                        else {

                                               $('#saveform_errorlist').html("");
                                                $('#success_message').addClass('alert alert-success');
                                                $('#success_message').text(response.message);
                                                $('#AddTaskModal').hide();
                                                $('#AddTaskModal').find('input').val('');

                        }
                    }
                });
            });
        });
    </script>
@endsection


{{--@section('script')--}}



{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            fetchstudent();--}}
{{--            function fetchstudent(){--}}
{{--                $.ajax({--}}
{{--                    type:'get',--}}
{{--                    url:'/fetchData',--}}
{{--                    dataType:"json",--}}
{{--                    success:function (response){--}}

{{--                        //console.log(response.students);--}}
{{--                        $.each(response.students,function (key,item){--}}
{{--                            $('tbody').append(--}}
{{--                                '  <tr>\--}}
{{--                                <td>'+item.id+'</td>\--}}
{{--                            <td>'+item.name+'</td>\--}}
{{--                            <td>'+item.email+'</td>\--}}
{{--                            <td>'+item.phone+'</td>\--}}
{{--                            <td>'+item.course+'</td>\--}}
{{--                            <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary">Edit</button></td>\--}}
{{--                            <td><button type="button" value="'+item.id+'" class="delete_student btn btn-danger">Delete</button></td>\--}}
{{--                        </tr>.'--}}

{{--                            );--}}
{{--                        });--}}
{{--                    }--}}

{{--                });--}}

{{--            }--}}
{{--            $(document).on('click','.add_student',function (e){--}}
{{--                e.preventDefault();--}}
{{--                var data={--}}
{{--                    'name':$('.name').val(),--}}
{{--                    'email':$('.email').val(),--}}
{{--                    'phone':$('.phone').val(),--}}
{{--                    'course':$('.course').val(),--}}
{{--                }--}}
{{--                // console.log(data);--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}

{{--                $.ajax({--}}
{{--                    type:'POST',--}}
{{--                    url:'/screate',--}}
{{--                    data:data,--}}
{{--                    dataType:"json",--}}
{{--                    success:function (response){--}}
{{--                        console.log(response.errors.name);--}}
{{--                        if (response.status == 400){--}}
{{--                            $('#saveform_errorlist').html("");--}}
{{--                            $('#saveform_errorlist').addClass('alert alert-danger');--}}
{{--                            $.each(reaponse.errors,function(key,err_values){--}}

{{--                                $('#saveform_errorlist').append('<li>'+err_values+'</li>');--}}
{{--                            });--}}
{{--                        }--}}
{{--                        else {--}}
{{--                            $('#saveform_errorlist').html("");--}}
{{--                            $('#success_message').addClass('alert alert-success');--}}
{{--                            $('#success_message').text(response.message);--}}
{{--                            $('#AddStudentModal').hide();--}}
{{--                            $('#AddStudentModal').find('input').val('');--}}
{{--                        }--}}
{{--                    }--}}
{{--                })--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}

{{--@endsection--}}
