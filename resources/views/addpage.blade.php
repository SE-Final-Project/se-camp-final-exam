@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('add.user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="title_id" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="title_id" name="title_id">
                            <option selected hidden>Titles</option>
                            {{-- <option value="คุณ">คุณ</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option> --}}
                            {{-- แท็บช่องของ title เป็น dropdown --}}
                            @foreach ($titles as $title)
                                <option value="{{ $title->id }}">{{ $title->tit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
{{-- แท็บช่องของ name สำหรับใส่ชื่อ --}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
{{-- แท็บช่องของ email สำหรับใส่ email --}}
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
{{-- แท็บช่องของ password สำหรับใส่ password --}}
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
{{-- แท็บช่องของ avatar สำหรับใส่รูป --}}
                <div class="form-group row">
                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
            </div>
        </form>
    </div>
@endsection
