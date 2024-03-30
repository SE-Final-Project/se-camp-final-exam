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
                <td>Name</td>
                <td>Email</td>
                <td>Avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            <!--loop การแสดงข้อมูล -->  <!-- 65160240 นายอภิภัสร์ ทศพร -->
            @foreach ($user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>คุณ</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!--เงื่อนไขในการเก็บข้อมูลรูปภาพ -->  <!-- 65160240 นายอภิภัสร์ ทศพร -->
                        @if ($user->avatar != null)
                            <img src="{{ asset('picture/' . $user->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูป
                        @endif
                    </td>
                    <td style="display: flex">
                        <a href="{{ url('edit-user/').'/'.$user->id }}" class="btn btn-warning">Edit</a>&nbsp;
                        <button style="margin-left: 10px" class="btn btn-danger delete-btn" data-id="{{ $user->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        // แสดงการทำงานของ  SweetAlert //65160240 นายอภิภัสร์ ทศพร
        $(document).ready(function() {
            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
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
                                    $('#user_' + userId).remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                    });
                                } else {
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

