@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>

        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form class="form-horizontal" action="{{ url('/homepage') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    {{-- <div class="col-sm-10">
                        <select>
                            <option class="form-control" id="title" value="typetitle"> คุณ </option>
                        </select>
                    </div> --}}
                    <div class="col-sm-10">
                        <select class="form-control" id="title">
                            <option value="typetitle">คุณ</option>
                            <option value="typetitle">นาง</option>
                            <option value="typetitle">นางสาว</option>
                            <option value="typetitle">นาย</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" onchange="updateFileName(this)">
                            <label class="custom-file-label" for="avatar" id="avatar-label">Choose file</label>
                        </div>
                    </div>
                </div>
                <script>
                    function updateFileName(input) {
                        var fileName = input.files[0].name;
                        var label = document.getElementById('avatar-label');
                        label.textContent = fileName;
                    }
                </script>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ url('/homepage') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>

            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
