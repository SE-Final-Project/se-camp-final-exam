@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input00" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="input00" name="title">
                            <option value="">เลือก</option>
                            <option value="คุณ">คุณ</option>
                            <option value="คุณนาย">คุณนาย</option>
                            <option value="คุณท่าน">คุณท่าน</option>
                            <option value="เจ้าสัว">เจ้าสัว</option>
                          </select>
                        <br>
                    </div>
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01">
                        <br>
                    </div>
                    <label for="input02" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input02">
                        <br>
                    </div>
                    <label for="input04" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                        <label class="custom-file-label" for="avatar">Choose file</label>
                        <br>
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
