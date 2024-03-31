@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ route('add-user') }}" class="btn btn-success">Add User</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Title</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img src="{{ Storage::url($user->avatar) }}" alt="avatar" style="width: 50px; height: auto;">
                    </td>
                    <td>{{ $user->title }}</td>
                    <td>
                        <a href="{{ route('edit-user', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-user', $user->id) }}" method="post" style="display: inline-block;">
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



{{-- 65160231 พงศ์พิสูทธิ์ เคนชาติ --}}
