@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
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
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->title ? $user->title->tit_name : 'N/A' }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->avatar)
                        <img src="{{ asset('storage/avatar/' . $user->avatar) }}" width="100" alt="Avatar">
                    @else
                        <span>ไม่มีรูป</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
