@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td width="35px">#</td>
                <td width="100px">Title</td>
                <td>name</td>
                <td>email</td>
                <td width="120px">avatar</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->title?->tit_name ?? 'N/A' }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" width="80" class="img-circle elevation-2" alt="User Image">
                        @else
                            <span>ไม่มีรูป</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edit.user', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('delete.user', ['id' => $user->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
