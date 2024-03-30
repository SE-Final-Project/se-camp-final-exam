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
            @foreach ($users as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td></td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                        {{-- เช็คค่า avater ว่ามีไหม --}}
                        @if ($users->avatar != null)
                            <img src="{{ asset('uploads/' . $users->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูป
                        @endif
                    </td>
                    <td style="display: flex; height: 95px">
                        <a href="{{ url('edit-user/' . $users->id) }}" class="btn btn-warning"
                            style="height: 38px ; margin-right :5px ; width: 70px">Edit</a>
                            {{-- ถ้ากดปุ่ม edit จะไปสู่หน้าสำหรับแก้ไขข้อมูล --}}
                        <button style="height: 38px ; margin-left: 10px" class="btn btn-danger delete-btn"
                            data-id="{{ $users->id }}">Delete</button>
                            {{-- ถ้ากดปุ่ม delete จะแสดงแจ้งเตือน SweetAlert --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
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
                            success: function(response) {
                                if (response.success) {
                                    //เมื่อลบผู้ใช้สำเร็จจะทำการลบข้อมูลของผู้ใช้ออกจาก DOM
                                    $('#user_' + userId).remove();

                                    //แสดง SweetAlert แจ้งเตือนว่าลบสำเร็จ
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                        //แสดงหน้าเว็บหลังจากกดยืนยัน SweetAlert ไปแล้ว
                                    });
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete user.',
                                        'error'
                                        //เมื่อลบผู้ใช้ไม่สำเร็จจะแสดงข้อความนี้
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
