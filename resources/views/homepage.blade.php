@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ route('user.create') }}" class="btn btn-success"> Add User </a>
    </div>

    @if ($message = Session::get('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
        </div>
        <script>
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 2000);
        </script>
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
            {{-- show data from database 65160244 Audomsuk --}}
            @foreach ($users_data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->title_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img src="{{ asset('uploads/user/' . $user->avatar) }}" alt="" style="width: 50px">
                        @if ($user->avatar == null)
                            <p>No Image Available!</p>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
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
