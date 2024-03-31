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
                <td width="190px">Tools</td>
            </tr>
        </thead>
        <!-- 65160209 กุสมา -->
        <tbody>
            @foreach ($user_view as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->title }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar && in_array(pathinfo($user->avatar, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif']))
                            <img src="{{ $user->avatar }}" style="width: 100px; height: 100px;">
                        @else
                            {{ $user->avatar ?: 'ไม่มีรูป' }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit.user', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete.user', $user->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
             <!-- 65160209 กุสมา -->
        </tbody>

    </table>
    {{-- <script>
        function c_Delete(userId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete-user/' + userId,
                        type: 'DELETE',
                        data: {
                            token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#row' + userId).remove();
                        },
                    });
                }
                location.reload();
            });
        }
    </script> --}}
@endsection
