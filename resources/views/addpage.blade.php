@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/submit_add-user') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <lable for="input01" class="col-sm-2 col-form-label">Title</lable>
                    <div class="col-sm-10">
                        <select class="form-control" id="input01" name="title_id">
                            <option>เลือก</option>
                            @foreach ($Title as $index )
                            <option value="{{$index->id}}">{{$index->tit_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <lable for="input02" class="col-sm-2 col-form-label">Name</lable>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input02" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <lable for="input03" class="col-sm-2 col-form-label">Email</lable>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="input03" name="email">
                    </div>
                </div><div class="form-group row">
                    <lable for="input04" class="col-sm-2 col-form-label">Password</lable>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="input04" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <lable for="input05" class="col-sm-2 col-form-label">Avatar</lable>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input05" name="avatar">
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
