@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>

        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form class="form-horizontal" action="{{ url('/add-user') }}" method="post" enctype="multipart/form-data">
        @csrf

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
                        <input type="text" name="name" class="form-control" id="name"placeholder="Enter name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="email"placeholder="Enter email" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text"  name="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                    </div>
                </div>


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
