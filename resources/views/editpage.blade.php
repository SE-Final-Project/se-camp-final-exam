@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- เอาข้อมูลเก่ามาแก้ไข -->
        <form class="form-horizontal" action="{{ url('update-user/' . $user->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <!-- กล่องข้อความ Title -->
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <!-- สามารถเลือกได้ว่าจะเอาอันไหน -->
                        <select class="form-control" id="title" name="title" value="{{ $user->title }}">
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
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}">
                    </div>
                </div>
                <!-- กล่องข้อความ Email -->
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $user->email }}">
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
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
