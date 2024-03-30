@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit User Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ url('update-user/'. $users->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
         <!-- เก็บค่า title ที่ต้องการจะเปลี่ยน -->
        <div class="card-body">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <select class="form-control" id="title_id" name="title_id">
                        <option value="1" name="คุณ" id="คุณ">คุณ</option>
                        <option value="2" name="นาย" id="นาย">นาย</option>
                        <option value="3" name="นาง" id="นาง">นาง</option>
                        <option value="4" name="นางสาว" id="นางสาว">นางสาว</option>
                    </select>
                </div>
            </div>
            <!-- เก็บค่า name ที่ต้องการจะเปลี่ยน -->
            <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value={{$users->name}}>
                </div>
            </div>
            <!-- เก็บค่า email ที่ต้องการจะเปลี่ยน -->
            <div class="form-group row">
                <label for="input01" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" value={{$users->email}}>
                </div>
            </div>
            <!-- เก็บค่า avrtar ที่ต้องการจะเปลี่ยน -->
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="avatar" id="filepicture" class="custom-file-input">
                        <label class="custom-file-label" for="filepicture">Choose file</label>
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