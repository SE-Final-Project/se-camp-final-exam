@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/edit-user')}}/{{$user->id}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" aria-label=".form-select-lg example" name="title_id">
                            @foreach ($titles as $title)
                                <option value="{{ $title->id }}" name="title_id">{{ $title->tit_name }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="name" placeholder="Artihit Anantasuk">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="email" placeholder="65160367@go.buu.ac.th">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                </div>
            </div>
            <!-- /.card-footer -->
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
    @endsection
