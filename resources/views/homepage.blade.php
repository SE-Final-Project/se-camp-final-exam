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
            @foreach ($users as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$item->title->tit_name}}</td>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>avatar</td>

                    <td>
                        <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection