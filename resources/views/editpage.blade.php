@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        {{-- ชินธร สมบัติกำจรกุล 65160105 --}}
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('update-user/'.$Users->id) }}" method="post" enctype="multipart/form-data">
            {{-- เมื่อทำการกดปุ่ม submit แล้วจะ update ตามค่าที่ตรงกับ id --}}
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    {{-- เก็บค่า title ใหม่ที่แก้เข้ามา --}}
                    <div class="col-sm-10">
                        <select class="form-control" id="title" name="title">
                            <option value="คุณ">คุณ</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $Users->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $Users->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <label class="custom-file-label"for="avatar">Choose file</label>
                            <input type="file" class="custom-file-input form-control" aria-describedby="inputGroupFileAddon01" id="avatar" name="avatar">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                {{-- ถ้ากด submit ข้อมูลก็จะ update แต่ถ้ากด cancel ก็จะกลับไปหน้าหลัก reset ก็จะหายทั้งหมด --}}
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
