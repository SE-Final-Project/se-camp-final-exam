@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action={{ url('/insert') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body mt-2">
                <div class="form-group row">

                    <label for="input-title" class="col-sm-2 col-form-label my-2">Title : </label>

                    <div class="col-sm-10 ">
                        <select class="form-control " name="input-title">
                            <option value="">เลือก</option>
                            @foreach ($titles as $tit_data)
                            <option value="{{ $tit_data['title_id'] }}">{{ $tit_data['tit_name'] }}</option>
                            @endforeach

                        </select>
                    </div>

                    <label for="input-name" class="col-sm-2 col-form-label my-2 ">Name : </label>
                    <div class="col-sm-10 mt-20">
                        <input type="text" class="form-control" name="input-name">
                    </div>
                    <label for="input-email" class="col-sm-2 col-form-label my-2">Email : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="input-email">
                    </div>
                    <label for="input-password" class="col-sm-2 col-form-label my-2">Password : </label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="input-password">
                    </div>
                    <label for="input-avatar" class="col-sm-2 col-form-label my-2">Avatar : </label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="input-avatar">
                    </div>


                    
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
