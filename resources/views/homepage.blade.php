@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- ตาราง -->
                <td width="35px">#</td>
                <td>Title</td>
                <td>Name</td>
                <td>Email</td>
                <td>Avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        @if ($item->avatar != null)
                            <img src="{{ asset('uploads/' . $item->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูป
                        @endif
                    </td>
                    <td style="display: flex ; height: 95px ">
                        <!-- ปุ่มกด Edit -->
                        <a href="{{ url('edit-user/' . $item->id) }}" class="btn btn-warning"
                            style="height: 38px ; margin-right :5px ; width: 70px">Edit</a>
                        <!-- ปุ่มกด Delete -->
                        <button style="height: 38px ; margin-left: 10px" class="btn btn-danger delete-btn"
                            data-id="{{ $item->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // ฟังก์ชั่นปุ่ม Delete
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var userId = $(this).data('id');

                // แสดงข้อความตอบโต้ผู้ใช้งาน
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
                        // แสดงข้อความคำขอจากผู้ใช้งาน
                        $.ajax({
                            url: 'delete-user/' + userId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // ลบแถวของผู้ใช้ที่ถูกลบออกจาก DOM
                                    $('#user_' + userId).remove();

                                    // แจ้งการลบข้อมูลสำเร็จ
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        // โหลดหน้าเพจใหม่
                                        location.reload();
                                    });
                                } else {
                                    // จัดการกับข้อผิดพลาด
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
