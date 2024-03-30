@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{-- <form class="form-horizontal" action="{{ url('/') }}" method="post"> --}}
            <form class="form-horizontal" action="/home/{{$new_data -> id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="col-md-12">
                <div class="form-group  my-3">
{{-- title --}}
            <strong>Title</strong>
            <select name="title " >
                <option value="{{ $new_data->title}}">--คุณ--</option>
                <option value="คุณ">คุณ</option>
            </select>
        </div>
{{-- name --}}
                    <br>
                    <label for="input02" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $new_data->name}}" name="name">
                    </div>
{{-- email --}}
                    <br>
                    <label for="input03" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input03" name="email" value="{{ $new_data->email}}">
                    </div>

{{-- avatar --}}
                    <div>
                        <hr>
                        <label for="input05" class="col-sm-2 col-form-label">Avartar</label>

                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file"  name="avatar" >
                            </form>
                            <hr>
                    </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/home') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
