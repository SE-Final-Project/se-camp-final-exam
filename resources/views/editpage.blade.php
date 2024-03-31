@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01">
                    </div>

                    <label for="input01" class="col-sm-2 col-form-label">name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01">
                    </div>

                    <label for="input01" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01">
                    </div>

                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01">
                    </div>


                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route('edit')}}"  class="btn btn-info">Submit</a>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
