@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/add-user') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Title</label>
                    <input type="hidden" name="tit_order">
                    <div class="col-sm-10">
                        <select class="form-control select2" style="width: 100%;" name="tit_name">
                            <?php
                            $options = ['Alabama', 'Alaska', 'California', 'Delaware', 'Tennessee', 'Texas', 'Washington'];
                            foreach ($options as $option) {
                                $selected = (isset($form->id) && $form->minimal === $option) ? 'selected' : '';
                                echo "<option value=\"$option\" $selected>$option</option>";
                            }

                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input01" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="input01" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input01" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="input01" name="password" required>
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
                <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
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
