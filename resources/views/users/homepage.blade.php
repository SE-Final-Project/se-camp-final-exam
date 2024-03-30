@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('http://127.0.0.1:8000/home/create') }}" class="btn btn-success"> Add User </a>


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
            <?php
            foreach ($users as $index => $user) { ?>
            <tr>
                <td>{{$index+1}}</td>
                <td>{{ $user->title }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <img src="{{ $user->avatar }}" height="30px" width="30px" />
                </td>
                <td>


                    <form class="delete-form" action="home/{{ $user->id }}" method="POST"><form class="delete-form" action="home/{{ $user->id }}" method="POST">
                        <a href="home/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="material-icons delete">Delete</i></button>
                    </form>

                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

@endsection
