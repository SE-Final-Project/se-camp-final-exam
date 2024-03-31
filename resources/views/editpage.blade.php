@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="input_Title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select name="title" class="form-control">
                            <option value="option 1" {{ $user->title == 'option 1' ? 'selected' : '' }}>Option 1</option>
                            <option value="option 2" {{ $user->title == 'option 2' ? 'selected' : '' }}>Option 2</option>
                            <option value="option 3" {{ $user->title == 'option 3' ? 'selected' : '' }}>Option 3</option>
                            <option value="option 4" {{ $user->title == 'option 4' ? 'selected' : '' }}>Option 4</option>
                            <option value="option 5" {{ $user->title == 'option 5' ? 'selected' : '' }}>Option 5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input_Name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="input_Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input_email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="input_email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input_Avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
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
