@extends('layouts.default')
@section('page_name', 'Edit Users user')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
         <!-- 65160209 กุสมา -->
        <form class="form-horizontal" action="{{ route('update.user', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title" placeholder="เลือก" name ="db_title">
                            <option selected>เลือก</option>
                            <option>คุณ</option>
                            <option>เด็กหญิง</option>
                            <option>เด็กชาย</option>
                            <option>นาย</option>
                            <option>นาง</option>
                            <option>นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="db_name"
                            value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name ="db_email"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="db_avatar"
                                accept="image/*">
                            <label class="custom-file-label" for="avatar">Choose File</label>
                        </div>
                        <div id="fileName"></div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
            </div>
             <!-- 65160209 กุสมา -->
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
