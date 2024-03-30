@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
     <table class="table table-bordered"> <!-- ตาราง -->
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
            @foreach ($user as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>คุณ</td> 
                    <!-- title -->
                    
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar != null) 
                        <!-- ถ้าไม่มีรูปแสดงไม่มีรูปภาพ -->
                            <img src="{{ asset('uploads/' . $user->avatar) }}" width="70px" height="70px" alt="image">
                        @else
                            ไม่มีรูปภาพ
                        @endif
                    </td>
                    <td style="display: flex;">
                        <a href="{{ url('edit-user/').'/'. $user->id }}" class="btn btn-warning">Edit</a>
                        <button style="margin-left: 10px" class="btn btn-danger delete-btn"
                            data-id="{{ $user->id }}">Delete</button> 
                            <!-- ปุ่ม delete -->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
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