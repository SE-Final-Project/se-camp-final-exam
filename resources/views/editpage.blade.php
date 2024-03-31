@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('update-user', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select  class="form-control" id="title" name="title">
                            <option value="">เลือก</option>
                            {{-- show title  65160324 Yanisa --}}
                            @foreach($titles->sortBy('id') as $title)
                                <option value="{{ $title->tit_name }}" {{ $user->title == $title->tit_name ? 'selected' : '' }}>{{ $title->tit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar" onchange="updateFileName(this)">
                            <label class="custom-file-label" for="avatar" id="avatar-label">Choose file</label>
                        </div>
                    </div>
                </div>
                <script>
                    function updateFileName(input) {
                        var fileName = input.files[0].name;
                        var label = document.getElementById('avatar-label');
                        label.innerText = fileName;
                    }
                </script>
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
