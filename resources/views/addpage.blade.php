@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- Title --}}
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">title</label>
                    {{-- <div class="col-sm-10"> --}}
                        <select class="form-select col-sm-10 ps-2 pd-2" aria-label="Default select example" name="title">
                            <option selected>เลือก</option>
                            <option value="1">นาย</option>
                            <option value="2">นางสาว</option>
                            <option value="3">นาง</option>
                            <option value="4">คุณ</option>
                        </select>
                    {{-- </div> --}}
                </div>
                {{-- Title --}}
                {{-- Nmae --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                {{-- Nmae --}}
                {{-- Email --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                {{-- Email --}}
                {{-- password --}}
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                {{-- password --}}
                {{-- avatar --}}
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                </div>
                {{-- password --}}
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
