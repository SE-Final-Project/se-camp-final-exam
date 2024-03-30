@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('update-user/' . $user->id) }}" method="post" enctype="multipart/form-data">
            {{-- ถ้ากดปุ่ม Submit แล้วจะไปเรียกใช้ Route ตาม url ที่ระบุ--}}
            @csrf
            @method('put')
            <div class="card-body">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title_id" name="title_id">
                            <option value="1" name="Sir" id="Sir">คุณ</option>
                            <option value="2" name="Mr" id="Mr">นาย</option>
                            <option value="3" name="Ms" id="Ms">นางสาว</option>
                            <option value="4" name="Mrs" id="Mrs">นาง</option>
                        </select>
                    </div>
                </div>
                {{-- แสดง dropdown สำหรับแก้ไขคำนำหน้าชื่อ --}}

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value={{$user->name}}>
                    </div>
                </div>
                {{-- แสดงกล่องข้อความสำหรับแก้ไขชื่อ และแสดงข้อมูลเดิม --}}

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value={{$user->email}}>
                    </div>
                </div>
                {{-- แสดงกล่องข้อความสำหรับแก้ไข email และแสดงข้อมูลเดิม --}}

                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                                <input type="file" class="custom-file-input form-control" aria-describedby="inputGroupFileAddon01" id="avatar" name="avatar">
                            {{-- แสดงกล่องข้อความสำหรับเพิ่มไฟล์รูปภาพใหม่ --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    {{-- ถ้ากดปุ่ม Submit ข้อมูลที่แก้ไขแล้วจะถูกบันทึกลงระบบ--}}
                    <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                    {{-- ถ้ากดปุ่ม Cancel จะไปสู่หน้าหลัก--}}
                    <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                    {{-- ถ้ากดปุ่ม Reset ข้อมูลจะถูกลบออกจากช่องที่กรอก--}}
                </div>
                <!-- /.card-footer -->
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
