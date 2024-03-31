<!--
#view-name : editpage.blade.php
#view-description : display edit page
#input : Title, Name, Email, Password, Avatar
#output : dialog box
#author : Thidarat Onsanit 65160337
#create-date : 2024-03-31
#update : 1 #edited-date : 2024-03-31 #edited-by : Thidarat Onsanit 65160337
#edit-description : can edit all data as example display.
-->

@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/'.$data_user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- /.card-body -->
            {{-- form to input title. Thidarat Onsanit 65160337--}}
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        {{-- select title. Thidarat Onsanit 65160337--}}
                        <select class="form-control" aria-label="Default select example" name="Title" id="inputTitle">
                            <option>เลือก</option>
                            {{-- loop to select title from Controller to change id to name of title. Thidarat Onsanit 65160337--}}
                            @foreach ($data_title as $data)
                            <option value="{{$data->id}}"
                            @if ($data->id === $data_user->title_id)
                                selected
                            @endif>
                                {{$data->tit_name}}
                            </option>
                            @endforeach
                          </select>

                    </div>
                </div>
                {{-- form to input name. Thidarat Onsanit 65160337--}}
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="Name" class="form-control" id="inputName" value="{{$data_user->name}}">
                    </div>
                </div>
                {{-- form to input email. Thidarat Onsanit 65160337--}}
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="Email" class="form-control" id="inputEmail" value="{{$data_user->email}}">
                    </div>
                </div>
                {{-- form to input avatar. Thidarat Onsanit 65160337--}}
                <div class="form-group row">
                <label for="inputAvatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="input-group col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile" name="Avatar">
                        <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                {{-- add path to show page aftaer click Cancel. Thidarat Onsanit 65160337--}}
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('js')
    <!-- bs-custom-file-input. Thidarat Onsanit 65160337 -->
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script. Thidarat Onsanit 65160337 -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
