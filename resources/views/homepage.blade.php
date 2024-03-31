@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
<!--home-->
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    <!--head table-->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="35px">#</th>
                <th width="100px">Title</th>
                <th>Name</th>
                <th>Email</th>
                <th width="150px">Avatar</th>
                <th width="200px">Tools</th>
            </tr>
        </thead>
        <tbody>
            <!--show user-->
            @foreach ($users as $user)
            <tr id="row_{{ $user->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->title ? $user->title->tit_name : 'N/A' }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!--ถ้ามีแสดงรูป-->
                    @if ($user->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->avatar) }}" width="100">
                    <!--ถ้าไม่มีรูป-->
                    @else
                        <span>ไม่มีรูป</span>
                    @endif
                </td>
                <td>
                    <!--edit-->
                    <a href="{{ route('edit.user', $user->id) }}" class="btn btn-warning">Edit</a>
                    <!--delete-->
                    <form action="{{ route('delete.user', $user->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<!--Sweet Alert -->
{{-- @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(userId) {
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
                    url: '/delete-user/' + userId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#row_' + userId).remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    },
                });
            }
        });
    }
</script>
@endpush --}}
