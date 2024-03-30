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
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td>Title</td>
                <td width="150px">Tools</td>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td>1</td>
                <td>name</td>
                <td>email</td>
                <td>avatar</td>
                <td>Title</td>
                <td>
                    <a href="{{ url('/edit-user') }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr> --}}

            @foreach ($users as $data => $key)
                <tr>
                    <td>{{ $data + 1 }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td>
                        @if ($key->avatar)
                            <img src="{{ asset('storage/' . $key->avatar) }}" width="100px">
                        @endif
                    </td>
                    <td>{{ $key->tit_name }}</td>
                    <td>
                        <a href="{{ url('/edit-user') }}/{{ $key->id }}" class="btn btn-warning">Edit</a>
                        {{-- <button class="btn btn-danger">Delete</button> --}}

                        <a href="{{ url('/delete-user') }}/{{ $key->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>
@endsection
