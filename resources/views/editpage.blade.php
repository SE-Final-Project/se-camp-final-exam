@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/user' . '/' . $datas->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                {{-- Title --}}
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">title</label>
                    <select class="form-select" aria-label="Default select example" name="title">
                        <option {{ asset($datas) ? 'selected' : '' }} value="{{$datas->title_id}}">
                            {{ asset($datas) ? $datas->title->tit_name : 'เลือก' }}
                        </option>
                        <option value="1">นาย</option>
                        <option value="2">นางสาว</option>
                        <option value="3">นาง</option>
                        <option value="4">คุณ</option>
                    </select>
                </div>
                {{-- Title --}}
                {{-- Nmae --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $datas->name }}">
                    </div>
                </div>
                {{-- Nmae --}}
                {{-- Email --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $datas->email }}">
                    </div>
                </div>
                {{-- Email --}}
                {{-- avatar --}}
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">avatar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                </div>
                {{-- password --}}
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
