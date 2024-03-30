@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{-- <form class="form-horizontal" action="{{ url('/home') }}" method="post"> --}}
            <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="col-md-12">
            <div class="form-group  my-3">
{{-- title --}}
            <strong>Title</strong>
            <select name="title" >
                <option value="คุณ">Select</option>
                <option value="คุณ">คุณ</option>
            </select>
        </div>
{{-- name --}}
                    <br>
                    <label for="input02" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input02" name="name">
                    </div>
{{-- email --}}
                    <br>
                    <label for="input03" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input03" name="email">
                    </div>
{{-- password --}}
                    <br>
                    <label for="input04" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input03" name="password">
                    </div>

{{-- avatar --}}
                    <div>
                        <hr>
                        <label for="input05" class="col-sm-2 col-form-label">Avartar</label>

                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="avatar" >
                            </form>
                            <hr>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{ url('/home') }}" class="btn btn-default float-right">Cancel</a>
                        <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
