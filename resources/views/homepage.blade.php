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
                <td>avata</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            {{-- //65160092 ธนภัทร - ไว้แสดงข้อมูลจากฐานข้อมูล --}}
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->title }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{-- //65160092 ธนภัทร - ไว้แสดงข้อมูลจากฐานข้อมูล --}}
                    @if ($user->avatar)
                        <img src="{{ asset($user->avatar) }}" class="img img-responsive" alt="">
                    @else
                        No Avatar
                    @endif
                </td>
            </tr>
            @endforeach
            <td>
                    <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
        </tbody>
    </table>
@endsection
