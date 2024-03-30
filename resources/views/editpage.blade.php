@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit User Form</h3>
    </div>

    <form class="form-horizontal" action="{{ url("/edit-page/$users->id") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="form-group row">
                <label for="edit-title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <select class="form-control" id="edit-title" name="edit-title">
                        <option disabled>Choose Title...</option>
                        @foreach ($title_lists as $title_list)
                        <option value="{{ $title_list->id }}" {{ $title_list->id == $users->title_id ? 'selected' : '' }}>
                            {{ $title_list->tit_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="card-body">
            <div class="form-group row">
                <label for="edit-name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="edit-name" class="form-control" id="edit-name" value="{{ $users->name }}">
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="edit-email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="type" name="edit-email" class="form-control" id="edit-email" value="{{ $users->email }}">
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="edit-avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="edit-avatar" class="custom-file-input" id="edit-avatar">
                        <label class="custom-file-label" for="edit-avatar">Choose File...</label>
                    </div>
                </div>
            </div>
        </div>



        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('/') }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.getElementById("edit-avatar").addEventListener("change", function(event) {
        var fileName = event.target.files[0].name;
        var label = document.querySelector('.custom-file-label[for="edit-avatar"]');
        label.textContent = fileName;
    });
</script>

@endsection
