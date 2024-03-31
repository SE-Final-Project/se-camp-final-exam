@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('store') }}" method="post">
            @csrf
            <div class="card-body">
                {{-- //65160092 ธนภัทร - เพิ่มform ไว้ให้ใส่ข้อมูลตามตัวอย่าง --}}
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" name = "title_id" placeholder="คุณ">
                            <option value="input01">นางสาว</option>
                            <option value="input02">นาย</option>
                            <option value="input03">นาง</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input02" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input03" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input04" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input05" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar">
                            <label class="custom-file-label" for="customFile">Choose file</label>
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
