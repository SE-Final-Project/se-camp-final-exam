@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/adddata') }}" method="post">
            @csrf
            <div class="card-body">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title_id" name="title_id">
                            @foreach ($titles as $title)
                                <option value="{{$title->id}}">{{ $title->tit_name}}</option>
                            @endforeach


                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="กรอกชื่อ-นามสกุล" id="name"
                            name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control <?php if($errors->has('email')){ ?>is-invalid<?php } ?>"
                            placeholder="กรอกอีเมล" id="email" name="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">

                        <input type="password" class="form-control" placeholder="กรอกรหัสผ่าน" id="password" name="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                                <input type="file" class="custom-file-input form-control"
                                    aria-describedby="inputGroupFileAddon01" id="avatar" name="avatar"
                                    onchange="previewImage(this);">
                            </div>
                        </div>
                        <img id="preview" src="#" alt="Preview" style="max-width: 100px; max-height: 100px;">
                    </div>
                </div>

                <script>
                    function previewImage(input) {
                        var file = input.files[0];
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(file);
                    }
                </script>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                    <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                </div>
                <!-- /.card-footer -->
            </div>
        </form>

    @endsection
