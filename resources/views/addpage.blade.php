@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/customers" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="title" name="title">
                            <option value="คุณ">คุณ</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>

                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name = "name" class="form-control" id="input02">
                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name = "email" class="form-control" id="input03">
                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" name = "password" class="form-control" id="input04">
                    </div>
                    <br /> <br />
                    <br /> 
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input type="text" name = "avatar" class="form-control" id="input05">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <form action="/add-user" method = "POST">
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="/customers" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            </form>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
