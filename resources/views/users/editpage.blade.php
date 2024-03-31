@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
<div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">  <!-- title -->
                    <label for="title" class="col-sm-2 col-form-label" >Title</label>
                    <div class="col-sm-10"> 
                        <select class="form-control" id="title" name="title">
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">  <!-- Name -->
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>

            
                <div class="form-group row">  <!-- Email -->
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email">
                    </div>
                </div>

                <div class="form-group row">  <!-- password -->
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" id="avatar" accept="image/*">
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
