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
            <tr>
                <td>1</td>
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td>Title</td>
                <td>
                    <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            {{-- @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->title }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->avatar)
                        <img src="{{ asset($user->avatar) }}" width='50' height='50' class="img img-responsive" alt="">
                    @else
                        No Avatar
                    @endif
                </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection