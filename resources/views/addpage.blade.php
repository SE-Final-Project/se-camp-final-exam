
@extends('layouts.default')

@section('page_name', 'Add Users Data')
@section('content')

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add User Form</h3>
    </div>
    <!-- /.card-header -->

    {{-- enctype="multipart/form-data --}}
    <!-- form start -->
    <form class="form-horizontal" action="{{ url("/add-page") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <select class="form-control" id="title" name="title">
                            <option value="" selected disabled>เลือก</option>
                            @foreach ($title_lists as $index => $title_list)
                                <option value="{{ $title_list->id }}">{{ $title_list->tit_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">กรุณาเลือก Title</div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="avatar" name="avatar">
                        <label class="custom-file-label" for="avatar">Choose File</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info" onclick="validateForm()" name="btn-submit">Submit</button>
            <a href="{{ url('/') }}" class="btn btn-secondary float-right">Cancel</a>
            <button type="reset" class="btn btn-secondary float-right mr-2">Reset</button>
        </div>
    </form>
    </div>

<style>
    /* Customize file input label */
    .custom-file-label::after {
        content: "Browse";
    }
</style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        document.getElementById("avatar").addEventListener("change", function(event) {
            var fileName = event.target.files[0].name;
            var label = document.querySelector('.custom-file-label[for="avatar"]');
            label.textContent = fileName;
        });
    </script>

    <script>
        function validateForm() {
            var title = document.getElementById('title');
            if (title.value === '') {
                title.classList.add('is-invalid');
            } else {
                title.classList.remove('is-invalid');
            }
        }
    </script>

@endsection


