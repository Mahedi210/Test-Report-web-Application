@extends('admin.amaster')
@section('content')

    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD Student</h5>
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
                        <input type="text" class="email form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Phone</label>
                        <input type="text" class="phone form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Course</label>
                        <input type="text" class="course form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_student">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-5">
                <div id="success_message"></div>
                <div class="card-header">
                    <h4>Student Data<a href="#" data-bs-toggle="modal" data-bs-target="#AddStudentModal" class="btn btn-primary float-end btn-sm">Add Student</a>  </h4>
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
            fetchstudent();
            function fetchstudent(){
                $.ajax({
                    type:'get',
                    url:'/fetchData',
                    dataType:"json",
                    success:function (response){

                        //console.log(response.students);
                        $.each(response.students,function (key,item){
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
            $(document).on('click','.add_student',function (e){
                e.preventDefault();
                var data={
                    'name':$('.name').val(),
                    'email':$('.email').val(),
                    'phone':$('.phone').val(),
                    'course':$('.course').val(),
                }
                 // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'/screate',
                    data:data,
                    dataType:"json",
                    success:function (response){
                         console.log(response.errors.name);
                        if (response.status == 400){
                            $('#saveform_errorlist').html("");
                            $('#saveform_errorlist').addClass('alert alert-danger');
                            $.each(reaponse.errors,function(key,err_values){

                                $('#saveform_errorlist').append('<li>'+err_values+'</li>');
                            });
                        }
                        else {
                            $('#saveform_errorlist').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddStudentModal').hide();
                            $('#AddStudentModal').find('input').val('');
                            fetchstudent();
                        }
                    }
                })
            })
        })
    </script>

@endsection
