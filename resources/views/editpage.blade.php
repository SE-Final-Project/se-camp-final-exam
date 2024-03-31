@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10 col-form-label">
                        <select class="form-control" name = "title">
                            <?php foreach($data_title as $data_titles) {?> 
                            <option value="{{$data_titles -> id}}">{{$data_titles -> tit_name}}</option>
                             <!--ดึงข้อมูล title ออกไป แสดงให้ user เลือก --> 
                            <?php } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name = "avatar">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection