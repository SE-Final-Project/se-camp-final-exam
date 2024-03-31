@extends('layouts.default')

@section('page_name', 'Edit User Data')

@section('content')

    <div class="card card-info">

        <div class="card-header">

            <h3 class="card-title">Edit User Data</h3>

        </div>

        <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="form-group row">

                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>

                    <div class="col-sm-10">

                        <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">

                    </div>

                </div>

                <div class="form-group row">

                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>

                    <div class="col-sm-10">

                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $user->email }}" autocomplete="off">

                    </div>

                </div>

                <div class="form-group row">

                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>

                    <div class="col-sm-10">

                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="รหัสผ่าน">

                    </div>

                </div>

                <div class="form-group row">

                    <label for="inputAvatar" class="col-sm-2 col-form-label">Avatar</label>

                    <div class="col-sm-10">

                        <input type="file" class="form-control-file" id="inputAvatar" name="avatar">

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-info">Submit</button>

                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>

            </div>

        </form>

    </div>

@endsection
