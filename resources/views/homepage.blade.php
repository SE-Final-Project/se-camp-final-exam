@extends('layouts.default')

@section('page_name', 'Users Data')

@section('content')

    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success">Add User</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Avatar</th>
                <th scope="col" width="150px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    @if($item->avatar)
                        <img src="{{ asset('storage/'.$item->avatar) }}" alt="Avatar" style="max-width: 100px; max-height: 100px;">
                    @else
                        <img src="{{ asset('images/default-avatar.jpg') }}" alt="Default Avatar" style="max-width: 100px; max-height: 100px;">
                    @endif
                </td>
                <td>
                    <a href="{{ url('/edit-user/'.$item->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('/delete-user/'.$item->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
