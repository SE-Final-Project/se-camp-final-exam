@extends('layouts.default')
<?php use App\Models\Title; ?>

@section('page_name', 'Users Data')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CODE HERE -->

    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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

            @foreach ($users as $User)
                <tr>
                    <td>{{ $User->id }}</td>
                    <td>คุณ</td>
                    <td>{{ $User->name }}</td>
                    <td>{{ $User->email }}</td>
                    <td>
                        @if ($User->avatar)
                            <img src="{{ asset($User->avatar) }}" width='50' height='50' class="img img-responsive"
                                alt="">
                        @else
                            Not have Avatar
                        @endif
                    </td>


                    <td>
                        <a href="{{ url('/edit-user/' . $User->id) }}" class="btn btn-warning">Edit</a>
                        <form id="delete-form-{{ $User->id }}" method="post"
                            action="{{ url('/delete-user/' . $User->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger"
                                onclick="deleteUser('{{ $User->id }}')">Delete</button>
                        </form>
                    </td>

                    <script>
                        function deleteUser(userId) {
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
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                }
                            });
                        }
                    </script>
            @endforeach
        </tbody>
    </table>
@endsection
</body>
