@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/') }}" method="POST">
            {{-- ฟอร์มการเพิ่ม User 65160097 --}}
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="title_id">
                            <option value="">เลือก</option>
                            <?php foreach ($titles as $index => $title) {?>
                            <option value="<?php echo $title->tit_order ?>">{{ $title->tit_name }}</option>
                            <?php }?>
                        </select>
                        <br>
                    </div>
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="name">
                        <br>
                    </div>
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input02" name="email">
                        <br>
                    </div>
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="Password" class="form-control" id="input03" name="password">
                        <br>
                    </div>
                    <label for="input01" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="custom-file-input" id="input4" name="avatar">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                <br>
                            </div>
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
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection
