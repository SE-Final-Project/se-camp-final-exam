@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/customers/{{$c_data -> c_id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="title" name="title" value = {{$c_data -> c_title}}>
                            <option value="คุณ">คุณ</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>

                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name = "name" class="form-control" id="input01" value = {{$c_data -> c_name}}>
                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input02" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name = "email" class="form-control" id="input02" value = {{$c_data -> c_email}}>
                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input03" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="text" name = "avatar" class="form-control" id="input03" value = {{$c_data -> c_avatar}}>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="/customers" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
