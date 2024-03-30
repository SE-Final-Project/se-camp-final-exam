@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- กล่องข้อความ Title -->
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <!-- สามารถเลือกได้ว่าจะเอาอันไหน -->
                        <select class="form-control" id="title" name="title">
                            <option value="คุณ">คุณ</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="เด็กหญิง">เด็กหญิง</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                </div>
                <!-- กล่องข้อความ Name -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <!-- กล่องข้อความ Email -->
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <!-- กล่องข้อความ Password -->
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <!-- กล่องข้อความ Avatar -->
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <!-- ใส่รูปภาพ -->
                        <div class="custom-file">
                            <label class="custom-file-label" for="avatar">Choose file</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!-- ปุ่มกดตกลง -->
                <button type="submit" class="btn btn-info">Submit</button>
                <!-- ปุ่มกดยกเลิก -->
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <!-- ปุ่มกดรีเซ็ท -->
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
