{{-- /*
final exam
id : 65160243
name : intuon nimthong
section : 2
*/ --}}
@extends('layouts.default')
@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{-- enctype เพื่อให้ store รูปได้ --}}
        <form class="form-horizontal" action="/homepage/{{$crud_data -> id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="input01" name="title" value="{{$crud_data -> name}}">
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="Mr">Mr.</option>
                            <option value="Ms">Ms.</option>
                          </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="name" value="{{$crud_data -> name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$crud_data -> email}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" value="{{$crud_data -> password}}" class="form-control" id="input01">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                            <input name="avatar" class="form-control" type="file">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="/homepage" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
