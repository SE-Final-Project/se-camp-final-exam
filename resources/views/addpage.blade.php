@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!--add user-->
        <form class="form-horizontal" action="{{ route('add.user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="title_id" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title_id" name="title_id">
                             <!--Select title-->
                            <option selected hidden>Titles</option>
                            @foreach ($titles as $title)
                                <option value="{{ $title->id }}">{{ $title->tit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <!--Name-->
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <!--Email-->
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <!--Password-->
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <!--Pic-->
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <!--show url-->
                            <input type="file" class="custom-file-input" id="avatar" name="avatar" onchange="showFileName()">
                            <label class="custom-file-label" for="avatar" id="avatar-label">Choose file</label>
                        </div>
                        @if ($errors->has('avatar'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span>
                        @endif
                        <p id="avatar-url" style="display:none;"></p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!--submit-->
                <button type="submit" class="btn btn-info">Submit</button>
                <!--cancle-->
                <a href="{{ route('homepage') }}" class="btn btn-default float-right">Cancel</a>
                <!--reset-->
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
    <script>
        //show url
        function showFileName() {
            var input = document.getElementById('avatar');
            var label = document.getElementById('avatar-label');
            var url = document.getElementById('avatar-url');
            var file = input.files[0];
            label.innerHTML = file.name;
            url.style.display = 'block';
        }
    </script>
@endsection
