<!-- 65160100 Apiwat Chookhai -->
@extends('layouts.default') <!-- ใช้ layout ที่กำหนดไว้เป็น default -->

@section('page_name', 'Add User Data') <!-- กำหนดชื่อหน้าเป็น 'Add User Data' -->

@section('content')
    <div class="card card-info"> <!-- การ์ดสีข้อมูล -->
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3> <!-- หัวเรื่องฟอร์มเพิ่มผู้ใช้ -->
        </div>
        <!-- /.card-header -->
        <!-- เริ่มต้นแบบฟอร์ม -->
        <form class="form-horizontal" action="{{ route('submit-user') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- CSRF Protection -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="title" id="inputTitle">
                            <option value="">เลือก</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="เด็กหญิง">เด็กหญิง</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="inputName" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="inputEmail" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Leave blank to keep the current password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAvatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar" id="inputAvatar" onchange="updateFileName()">
                            <label class="custom-file-label" for="inputAvatar" id="avatarLabel">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button> <!-- ปุ่มสำหรับส่ง -->
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a> <!-- ปุ่มสำหรับยกเลิก -->
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('scripts') <!-- สคริปต์ -->
    <script>
        // อัปเดตป้ายชื่อไฟล์ที่กำลังเลือก
        function updateFileName() {
            var input = document.getElementById('inputAvatar');
            var label = document.getElementById('avatarLabel');
            label.innerText = input.files[0].name;
        }
    </script>
@endsection
