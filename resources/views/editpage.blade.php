@extends('layouts.default')

@section('page_name', 'Edit User Data')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('update-user', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="title" id="inputTitle">
                            <option value="">เลือก</option>
                            <option value="นาย" {{ $user->title === 'นาย' ? 'selected' : '' }}>นาย</option>
                            <option value="นาง" {{ $user->title === 'นาง' ? 'selected' : '' }}>นาง</option>
                            <option value="นางสาว" {{ $user->title === 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                            <option value="เด็กชาย" {{ $user->title === 'เด็กชาย' ? 'selected' : '' }}>เด็กชาย</option>
                            <option value="เด็กหญิง" {{ $user->title === 'เด็กหญิง' ? 'selected' : '' }}>เด็กหญิง</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="inputName" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Leave blank to keep the current password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputAvatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar" id="inputAvatar" onchange="updateFileName()">
                            <label class="custom-file-label" for="inputAvatar" id="avatarLabel">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('scripts')
    <script>
        // Update the custom file label with the selected file name
        function updateFileName() {
            var input = document.getElementById('inputAvatar');
            var label = document.getElementById('avatarLabel');
            label.innerText = input.files[0].name;
        }
    </script>
@endsection
