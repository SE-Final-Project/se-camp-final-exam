@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
{{-- ณัฐดนัย ธาราโรจน์ชัยกุล 65160329 --}}

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{-- เมื่อกด submit form แล้วจะไปตาม url ที่ระบุ โดยส่งค่า id ของ User ที่ได้ทำการแก้ไข --}}
        <form class="form-horizontal" action="{{url('update-user/' . $user->id )}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">

                {{-- แสดง dropdown สำหรับแก้ไขคำนำหน้า --}}
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title_id" name="title_id" >
                            <option value="1" name="Sir" id="Sir">คุณ</option>
                            <option value="2" name="Mr" id="Mr">นาย</option>
                            <option value="3" name="Ms" id="Ms">นางสาว</option>
                            <option value="4" name="Mrs" id="Mrs">นาง</option>
                        </select>
                    </div>
                </div>

                {{-- ฟอร์มinputสำหรับแก้ไขชื่อ --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value={{ $user->name }}>
                    </div>
                </div>

                {{-- ฟอร์มinputสำหรับแก้ไขอีเมล --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value={{ $user->email }}>
                    </div>
                </div>

                {{-- ฟอร์มinputสำหรับแก้ไขไฟล์ avatar --}}
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                                <input type="file" class="custom-file-input form-control" aria-describedby="inputGroupFileAddon01" id="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                {{-- เมื่อกด submit จะไปตาม url ที่ระบุใน action--}}
                {{-- เมื่อกด cancle จะกลับไปหน้า homepage --}}
                {{-- เมื่อกด reset คืนค่าข้อมูลเก่า --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                    <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                </div>
                <!-- /.card-footer -->
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
