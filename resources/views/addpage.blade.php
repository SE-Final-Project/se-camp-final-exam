@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal"  action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="form-group row">
                    <label for="input00" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">

                        <select name="title" aria-label="Default select example"  class="form-control">
                            @foreach ($titles as $title)
                            <option value="{{$title->id}}">{{$title->tit_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="input01">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="input02" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="text" class="form-control" id="input02">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="input03" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="pwd">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input04" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                         <input type="file" class="custom-file-input" id="input04" name="avatar">
                         <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('user.index') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
