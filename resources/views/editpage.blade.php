@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header >
        <!-- form start -->
    
        <form class="form-horizontal" action="/users/{{$c_data -> c_id}}"method="post">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select name="title" id="" class="form-control" name="" value={{$c_data -> c_title}}>
                            <option value="">เลือก</option>
                            <option value="คุณ">คุณ</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="name" value={{$c_data -> c_name}}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="email" value={{$c_data -> c_email}}>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href=""/users"" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right">reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
