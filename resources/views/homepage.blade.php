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
            @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->avatar }}</td>
                    <td>
                        <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>

                        <form method="POST" action="{{ url('')}}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm("Confirm delete?")"><aria-hidden="true"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
