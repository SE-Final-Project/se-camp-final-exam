@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form class="form-horizontal" action="{{ url('/edit/' . $user->id) }}" method="post">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select name="title" id="title" class="form-control">
                            @foreach($titles as $index => $title)
                                <option value="{{ $index + 1 }}" {{ $user->title_id == $title->id ? 'selected' : '' }}>{{ $title->tit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="avatar" name="avatar" value="{{$user->avatar}}">
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
