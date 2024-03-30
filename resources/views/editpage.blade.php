@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/update-user') }}/{{ $user->id }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">

                        <select class="form-control" name="title">
                            <option>เลือก</option>
                            {{-- @foreach ($titles as $data)
                            @if ($data->id == $user->title_id)
                                <option value="{{ $data->id }}" selected>{{ $data->tit_name }}</option>

                            @endif
                            <option value="{{ $data->id }}">{{ $data->tit_name }}</option>
                            @endforeach --}}

                            @foreach ($titles as $data)
                            @if ($data->id == $user->title_id)
                                <option value="{{ $data->id }}" selected>{{ $data->tit_name }}</option>
                            @else
                                <option value="{{ $data->id }}">{{ $data->tit_name }}</option>
                            @endif
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Name" name="name" value="{{ $user->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Emali</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Emali" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="Password" name="password" value="{{ $user->password }}">
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="avatar">
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
