@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <!-- การเลือก Title  --> <!-- 65160240 นายอภิภัสร์ ทศพร -->
                        <select class="form-control" id="title_id" name="title_id">
                            <option value="1" name="Sir" id="Sir">คุณ</option>
                            <option value="2" name="Mr" id="Mr">นาย</option>
                            <option value="3" name="Ms" id="Ms">นางสาว</option>
                            <option value="4" name="Mrs" id="Mrs">นาง</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10"><!-- แสดงข้อมูลเดิมที่มีอยู่ของชื่อ และแก้ไขได้  --> <!-- 65160240 นายอภิภัสร์ ทศพร -->
                        <input type="text" name="name" value="{{ $user->name}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row"><!-- แสดงข้อมูลเดิมที่มีอยู่ของ email และแก้ไขได้  --> <!-- 65160240 นายอภิภัสร์ ทศพร -->
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                </div>
<div class="form-group row"><!-- แสดงข้อมูลเดิมที่มีอยู่ของรูปภาพ และแก้ไขได้  --> <!-- 65160240 นายอภิภัสร์ ทศพร -->
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                                <input type="file" class="custom-file-input form-control" aria-describedby="inputGroupFileAddon01" id="avatar" name="avatar" value="{{ $user-> avatar }}">
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
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
