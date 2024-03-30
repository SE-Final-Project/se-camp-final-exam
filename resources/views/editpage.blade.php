@extends('layouts.default')

@section('page_name', 'Edit Users Data')
@section('content')

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Edit User Form</h3>
    </div>

    <form id="edit-user-form" class="form-horizontal" action="{{ url("/edit-page/$user_lists->id") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="form-group row">
                <label for="edit-title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <select class="form-control" id="edit-title" name="edit-title">
                        <option disabled>Choose Title...</option>
                        @foreach ($title_lists as $title_list)
                        <option value="{{ $title_list->id }}" {{ $title_list->id == $user_lists->title_id ? 'selected' : '' }}>
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
                    <input type="text" name="edit-name" class="form-control" id="edit-name" value="{{ $user_lists->name }}" required>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="edit-email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="type" name="edit-email" class="form-control" id="edit-email" value="{{ $user_lists->email }}" required>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="edit-avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="edit-avatar" class="custom-file-input" id="edit-avatar" src="{{ $user_lists->avatar }}" >
                        <label class="custom-file-label" for="edit-avatar">{{ $user_lists->avatar }}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ url('/') }}" class="btn btn-secondary float-right">Cancel</a>
            <button type="reset" onclick="resetForm()" class="btn btn-secondary float-right mr-2">Reset</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editAvatarInput = document.getElementById('edit-avatar');
        var defaultAvatarFileName = '{{ $user_lists->avatar }}';

        // ตรวจสอบว่าไฟล์ที่อัปโหลดมีหรือไม่
        if (editAvatarInput.files && editAvatarInput.files.length > 0) {
            // มีไฟล์อัปโหลดอยู่ ให้แสดงชื่อไฟล์นั้น
            editAvatarInput.nextElementSibling.innerHTML = editAvatarInput.files[0].name;
        } else {
            // ไม่มีไฟล์อัปโหลด หรือไม่ได้เลือกไฟล์ใหม่ให้ใช้ชื่อเดิม
            editAvatarInput.nextElementSibling.innerHTML = defaultAvatarFileName ? defaultAvatarFileName : 'Choose File...';
        }
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.getElementById("edit-avatar").addEventListener("change", function(event) {
        var fileName = event.target.files[0].name;
        var label = document.querySelector('.custom-file-label[for="edit-avatar"]');
        label.textContent = fileName;

    });

    function resetForm() {
        document.getElementById("edit-user-form").reset();
        var avatarInput = document.getElementById("edit-avatar");
        avatarInput.value = null; // เซ็ตค่า input ของ avatar เป็น null
        var label1 = document.querySelector('.custom-file-label[for="edit-avatar"]');
        label.textContent = 'Choose File...'; // กำหนดค่า label ใหม่

        var nameInput = document.getElementById("edit-name");
        nameInput.value = null;
        var label2 = document.querySelector('.custom-file-label[for="edit-name"]');
        label2.textContent = '';

        var emailInput = document.getElementById("edit-email");
        emailInput.value = null;
        var label3 = document.querySelector('.custom-file-label[for="edit-email"]');
        label3.textContent = '';
    }
</script>




@endsection
