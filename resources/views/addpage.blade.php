<!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ -->

@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนดึงข้อมูลจาก Database มาใส่ Drop down-->
                        <?php
                        $c = mysqli_connect('localhost', 'root', '', 'final_exam_camp_db');
                        mysqli_query($c, 'SET NAMES UTF8');
                        $sql = ' SELECT * FROM titles ORDER BY tit_order ASC; ';
                        $q = mysqli_query($c, $sql);
                        echo "<select name='titles' class='form-control'>
                              <option value=''> เลือก </option>";
                        while ($f = mysqli_fetch_assoc($q)) {
                            echo "<option value='{$f['tit_order']}'>{$f['tit_name']}</option>";
                        }
                        echo '</select>';
                        mysqli_close($c);
                        ?>
                    </div>
                </div>
                <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนสำหรับกรอกชื่อ-->
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName">
                    </div>
                </div>
                <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนสำหรับกรอกอีเมล-->
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail">
                    </div>
                </div>
                <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนสำหรับกรอกรหัสผ่าน-->
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <!-- 65160219 นางสาวดวงกมล ลืออริยทรัพย์ เป็นส่วนสำหรับอัปโหลดไฟล์รูป-->
                <div class="form-group row">
                    <label for="inputFile" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputFile">
                            <label class="custom-file-label" for="inputFile">Choose file</label>
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
        </form>
    </div>
    <!-- /.card -->
@endsection
