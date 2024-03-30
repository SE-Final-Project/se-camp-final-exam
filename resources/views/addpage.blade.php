@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/add-new-user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- seclect title for user from title data --}}
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control form-select" name="title">
                            <option selected>เลือก</option>
                            @foreach ($Titles as $index => $title)
                                <option value="{{ $title->id }}">{{ $title->tit_name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                {{-- ใส่ชื่อของuser --}}
                <div class="form-group row">
                    <label for="input02" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input02" name="name">
                    </div>
                </div>
                {{-- ใส่emailของuser --}}
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input03" name="email">
                    </div>
                </div>
                {{-- ใส่passwordของuser --}}
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input04" name="password">
                    </div>
                </div>
                {{-- อัพโหลดไฟล์รูปภาพของuser --}}
                <div class="form-group row mb-3">
                    <label for="input05" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="input-group mb-3 col-sm-10">
                        <div class="input-group">
                            <input type="file" class="form-control" id="input05" name="file">
                            <label class="input-group-text" for="input05">ฺBrowse</label>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" >Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

@endsection
