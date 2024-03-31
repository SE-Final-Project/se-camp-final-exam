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
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->title->tit_name }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img style="width: 100px" src="{{ url('/images/uploads/' . $user->avatar) }}"></td>
                    <td>
                        <a href="{{ url('/edit-user')."/".$user->id }}" class="btn btn-warning">Edit</a>
                        <button onclick="deleteUser({{$user->id}})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        async function deleteUser(id) {
            Swal.fire({
                title: "Do you want to delete yet?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const response = await fetch(`/delete-user/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    });
                    if (response.status === 200) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        window.location.reload();
                    }
                }
            });
        }
    </script>
@endsection
