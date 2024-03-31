@extends('layouts.default')

@section('page_name', 'Edit User Data')
@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit User Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- Form start -->
    <form class="form-horizontal" action="{{ route('update-user', ['id' => $User->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT method for updates -->
        <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title" name="title">
                            <option value="">Select Title</option>
                            @foreach($titles->sortBy('tit_order') as $title)
                            <option value="{{ $title->tit_name }}">{{ $title->tit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name"placeholder="Enter name" value="{{ $User->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email"placeholder="Enter email" value="{{ $User->email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="avatar" onchange="previewImage(this)">
                                <label class="custom-file-label" for="avatar" id="avatarLabel">Choose file</label>
                            </div>

                        </div>
                        <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100px; max-height: 100px;">
                    </div>
                </div>
                <script>
                    function previewImage(input) {
                        var file = input.files[0];
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var imagePreview = document.getElementById('imagePreview');
                            var avatarLabel = document.getElementById('avatarLabel');

                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            avatarLabel.textContent = file.name;
                        };

                        reader.readAsDataURL(file);
                    }
                </script>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('homepage') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>

            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
