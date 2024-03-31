@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action={{ url('/update/' . $users['id']) }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input-title" class="col-sm-2 col-form-label my-2">Title : </label>
                    <div class="col-sm-10 ">
                        /*
                        65160241 Amonpan Noicgaroen
                        Create a table for filling in data in the data editing section.
                        */
                        <select class="form-control " value="{{ $users['title_id'] }}" name="input-title">
                            <option value="1">นาย</option>
                            <option value="2">นางสาว</option>
                            <option value="3">นาง</option>
                            <option value="4">คุณ</option>
                        </select>
                    </div>
                    <label for="input-name" class="col-sm-2 col-form-label my-2">Name : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="input-name" value="{{ $users['name'] }}">
                    </div>
                    <label for="input-email" class="col-sm-2 col-form-label my-2">Email : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="input-email" value="{{ $users['email'] }}">
                    </div>
                    <label for="input-avatar" class="col-sm-2 col-form-label my-2">Avatar : </label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="input-avatar" value="{{ $users['avatar'] }}">
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
