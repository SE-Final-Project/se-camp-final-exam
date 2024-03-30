@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add User Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ url('/add-user') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- เก็บค่า title  -->
        <div class="card-body">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <select class="form-control" id="title_id" name="title_id">
                        <option value="" name="เลือก" id="เลือก">เลือก</option>
                        <option value="1" name="คุณ" id="คุณ">คุณ</option>
                        <option value="2" name="นาย" id="นาย">นาย</option>
                        <option value="3" name="นาง" id="นาง">นาง</option>
                        <option value="4" name="นางสาว" id="นางสาว">นางสาว</option>
                    </select>
                </div>
            </div>
             <!-- เก็บค่า name  -->
            <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
             <!-- เก็บค่า email  -->
            <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
             <!-- เก็บค่า password  -->
            <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" name="password" class="form-control">
                </div>
            </div>
             <!-- เก็บค่า avatar  เอาไว้ใส่รูปภาพที่ต้องการจะใส่ -->
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="avatar" id="filepicture" class="custom-file-input">
                        <label class="custom-file-label" for="filepicture">Choose file</label>
                    </div>
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