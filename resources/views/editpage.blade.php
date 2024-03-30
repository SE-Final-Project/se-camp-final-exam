@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user.update', $m_user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <input type="hidden" name="tit_order">
                    <div class="col-sm-10">
                        <select class="form-control select2" style="width: 100%;" name="tit_name">
                        // Retrieve value for old data
                           <?php
                            $options = ['Alabama', 'Alaska', 'California', 'Delaware', 'Tennessee', 'Texas', 'Washington'];
                            foreach ($options as $option) {
                                $selected = isset($m_user->id) && $m_title->tit_name === $option ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="name"
                            value="{{ $m_user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="input01" name="email"
                            value="{{ $m_user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="input01" name="password"
                            value="{{ $m_user->password }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="avatar" onchange="displayFileName(this)">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>

                </div>

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
<script>
    function displayFileName(input) {
       const fileName = input.files[0].name;
       const label = input.nextElementSibling;
       label.innerText = fileName;
   }
</script>
