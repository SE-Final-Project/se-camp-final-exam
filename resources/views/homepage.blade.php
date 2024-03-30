@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
<!-- CODE HERE -->
<div class="float-right pb-4">
    <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <td width="35px">#</td>
            <td>Title</td>
            <td>name</td>
            <td>email</td>
            <td>avatar</td>
            <td width="150px">Tools</td>
        </tr>
    </thead>
    <tbody>
        <!-- ลูปที่เอาไว้เก็บค่า -->
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <!-- เงื่อนไขการใส่รูปภาพถ้ามีจะแสดงไปที่ uploads -->
                @if ($item->avatar != null)
                <img src="{{ asset('uploads/' . $item->avatar) }}" width="70px" height="70px" alt="image">
                <!-- แต่ถ้าไม่ใส่รูปภาพจะแสดงคำว่า ไม่มีรูป -->
                @else
                ไม่มีรูป
                @endif
            </td>
            <td style="display: flex; height: 95px">
                <a href="{{ url('edit-user/' . $item->id) }}" class="btn btn-warning" style="height: 38px ; margin-right :5px ; width: 70px">Edit</a>
                <button style="height: 38px ; margin-left: 10px" class="btn btn-danger delete-btn" data-id="{{ $item->id }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('js')
<script>
    //ถ้ากดปุ่ม Delete จะแสดงข้อความ Alert ขึ้นมา//
    $(document).ready(function() {
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete-user/' + userId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        // ลบสำเร็จ //
                        success: function(response) {
                            if (response.success) {
                                $('#user_' + userId).remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(() => {

                                    location.reload();
                                });
                            } else {
                                // แสดงข้อความว่ามีข้อผิดพลาด //
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete user.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        });
    });
</script>
@endsection