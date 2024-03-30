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
                <td>title</td>
                <td>ชื่อ</td>
                <td>อีเมล</td>
                <td>รูปโปรไฟล์</td>
                <td width="150px">เครื่องมือ</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->titles }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" class="img-thumbnail" alt="Avatar">
                        <p>{{ basename($user->avatar) }}</p>
                    @else
                        ไม่มีรูป
                    @endif
                </td>
                <td>
                    <a href="{{ url('/edit-user/'.$user->id) }}" class="btn btn-warning">Edit</a>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('delete-user', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="deleteUser('{{ $user->id }}')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function deleteUser(userId) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            buttons: ["Cancel", "Delete"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form-' + userId).submit();
            } else {
                swal("User deletion cancelled!", {
                    icon: "info",
                });
            }
        });
    }
</script>
