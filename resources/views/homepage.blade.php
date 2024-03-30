@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="35px">#</th>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th width="150px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>นาย</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar != null)
                            <img src="{{ asset('uploads/' . $user->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูปภาพ
                        @endif
                    </td>
                    <td style="display:flex">
                        <a href="{{ url('/edit-user/') . '/' . $user->id }}" class="btn btn-warning">Edit</a>
                        <form method="POST" action="{{ url('delete-user/' . $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button style="margin-left: 10px" class="btn btn-danger delete-btn"
                                data-id="{{ $user->id }}">Delete</button>
                            </script>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
{{-- ส่วนของ Sweet alert --}}
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
                                    // ลบแถวของผู้ใช้ที่ถูกลบออกจาก DOM
                                    $('#user_' + userId).remove();

                                    // แสดง SweetAlert แจ้งการลบข้อมูลสำเร็จ
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        // Reload the page after the SweetAlert is closed
                                        location.reload();
                                    });
                                } else {
                                    // Handle error response if needed
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
