@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ route('user.create') }}" class="btn btn-success"> Add User </a>
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
            @foreach ($users_data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        @if ($user->title_id == 1)
                            <p>Monkey</p>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img src="{{ asset('uploads/user/' . $user->avatar) }}" alt="" style="width: 50px">
                        @if ($user->avatar == null)
                            <p>ไม่มีรูปภาพ</p>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
