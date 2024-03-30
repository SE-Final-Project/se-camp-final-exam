@extends('layouts.default')

@section('page_name', 'Users Data')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CODE HERE -->
    <div class="float-right pb-4">
        <a href="{{ url('/add-user') }}" class="btn btn-success"> Add User </a>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

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
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->avatar)
                            <img src="{{asset($user->avatar)}}" width='50' height='50' class="img img-responsive" alt="">
                        @else
                            <p>ไม่มีรูป</p>
                        @endif

                    </td>

                    <td></td>
                    <td>
                        <form action="{{route('users.destroy' , $user->id )}}"  method="POST">
                            <a href="{{route('users.edit' , $user->id)}}" class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-danger" >Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

