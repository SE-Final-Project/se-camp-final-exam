@extends('layouts.default')

@section('page_name', 'Edit Users Data') 
<!-- แก้ไขข้อมูล 65160106 ณัฏฐ์ภพ-->
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <form class="form-horizontal" action="{{ url('/update/'.$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label> 
                    <div class="col-sm-10">
                        <select class="form-control" id="title" name="title"> <!-- ฟอร์มแก้ไขข้อมูล title 65160106 ณัฏฐ์ภพ-->
                            <option value="คุณ">คุณ</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="เด็กหญิง">เด็กหญิง</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row"> <!-- ฟอร์มแก้ไขข้อมูล name 65160106 ณัฏฐ์ภพ-->
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row"> <!-- ฟอร์มแก้ไขข้อมูล email 65160106 ณัฏฐ์ภพ-->
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                </div>
                
                <div class="form-group row"> <!-- ฟอร์มแก้ไขข้อมูล avatar 65160106 ณัฏฐ์ภพ-->
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                                <input type="file" class="custom-file-input form-control"
                                    aria-describedby="inputGroupFileAddon01" id="avatar" name="avatar"> 
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                    <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                </div>
                
        </form>
    </div>
    
@endsection
