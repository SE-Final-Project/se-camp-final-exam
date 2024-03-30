@extends('layouts.default')

@section('page_name', 'Users Data')

@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('/user') }}" class="btn btn-success"> Add User </a>
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
            @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        {{-- {{dd($data->avatar)}} --}}
                        <img src="{{ asset('storage' . Str::replace('public', '/', $data->avatar)) }}" alt="">
                    </td>
                    <td>{{ $data->title->tit_name }}</td>

                    <td>
                        <form action="{{ route('user.edit', [$data->id]) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="{{ url('/user' . '/' . $data->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
                        </form>
                        {{-- <button type="button" onclick="deleteUser({{ $data->id }})" class="btn btn-danger" id="deleteButton">Delete</button> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
